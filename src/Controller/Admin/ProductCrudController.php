<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\PostCategoryRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\HeaderUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProductCrudController extends AbstractCrudController
{
    public function __construct(
        AdminUrlGenerator $adminUrlGenerator, 
        PostCategoryRepository $postCategoryRepository, 
        ProductRepository $productRepository, 
        UserRepository $userRepository,
        SluggerInterface $slugger,
        LoggerInterface $logger
    ) {
        $this->adminUrlGenerator = $adminUrlGenerator;
        $this->postCategoryRepository = $postCategoryRepository;
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
        $this->slugger = $slugger;
        $this->logger = $logger;
    }
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $uploadPath = $this->getParameter('posts');
        
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('product_thumbail')->setBasePath($uploadPath['uploads']['url_prefix'])->setUploadDir($uploadPath['uploads']['url_path'])->setLabel("Product thumbnail")->setRequired(false),
            TextField::new('name')->setLabel("Product Name")->setRequired(false),
            TextField::new('flavour')->setLabel("Product flavour")->setRequired(false),
            TextField::new('weight')->setLabel("Product Weight")->setRequired(false),
            MoneyField::new('Price')->setCurrency('USD')->setLabel('Product Price'),
            TextField::new('fat')->setLabel(" fat")->setRequired(false),
            TextField::new('Suger')->setLabel(" Suger")->setRequired(false),
            BooleanField::new('isCustom'),
            BooleanField::new('isReturnable'),
            ChoiceField::new('DeliveryType')->setChoices([
                'Home Delivery' => 'Home Delivery', 
                'Pick Up' => 'Pick Up'
            ])->setRequired(false),
            TextEditorField::new('description')->setLabel("Product description")->setRequired(false),
            AssociationField::new('managedBy')->setLabel('User')->hideOnForm(),
            AssociationField::new('roles')->hideOnForm()->setPermission('ROLE_MANAGER'),
            AssociationField::new('PostCategory')->setLabel("Product Category"),
            ChoiceField::new('product_type')->setChoices([
                'Egg' => 'egg', 
                'Eggless' => 'eggless'
            ])->setRequired(false),
            TextField::new('Product_slug')->hideOnForm()->hideOnIndex(),
            DateTimeField::new('CreatedAt')->hideOnForm()->hideOnIndex(),
            DateTimeField::new('UpdatedAt')->hideOnForm()->hideOnIndex(),
            ChoiceField::new('product_status')->setLabel("Product Status")->setChoices([
                'Draft' => 'draft', 
                'Pending' => 'pending', 
                'Active' => 'active', 
                'Inactive' => 'inactive'
            ])->setRequired(false)->setPermission('ROLE_ADMIN'),
        ]; }
       /*  public function configureCrud(Crud $crud): Crud
        {
            return $crud->setEntityPermission('ROLE_MANAGER');
        } */

        public function configureActions(Actions $actions): Actions
        {
            $importPostButton = Action::new('importPost', 'Import')->setCssClass('btn btn-default')->createAsGlobalAction()->linkToCrudAction('importPost');
            $exportPostButton = Action::new('exportPost', 'Export')->setCssClass('btn btn-default')->createAsGlobalAction()->linkToCrudAction('exportPost');
            
            return $actions
                ->add(Crud::PAGE_INDEX, $exportPostButton)
                ->add(Crud::PAGE_INDEX, $importPostButton)
            ;
        }
        
        public function importPost(Request $request)
        {
            $post = new Product();
            $form = $this->createForm(ProductType::class, $post);        
            $form->handleRequest($request);
    
            $importedFile = $form->get('import_file')->getData();
            if ($form->isSubmitted() && $importedFile) {
                $jsonData = file_get_contents($importedFile);
              
                $entityManager = $this->getDoctrine()->getManager();
                
             try{
                    $postData = json_decode($jsonData);
                   
                    foreach ($postData as $postItem) {
                        $newPost = new Product();
                        $category = $this->postCategoryRepository->find($postItem->post_category_id);
                        $newPost->setName($postItem->name);
                        $newPost->setFlavour($postItem->flavour); 
                        $newPost->setProductSlug($this->slugger->slug($postItem->name));
                        $newPost->setDescription($postItem->description);
                        $newPost->setProductType((!empty($postItem->product_type))?$postItem->product_type:'egg');
                        $newPost->setProductStatus('draft');
                        $newPost->setProductThumbail($postItem->product_thumbail);  
                        $newPost->setPrice($postItem->price); 
                        // $newPost->setQty($postItem->Qty);
                        $newPost->setFat($postItem->fat);
                        $newPost->setSuger($postItem->suger);
                        $newPost->setCreatedAt(new \DateTime());
                        $newPost->setUpdatedAt(new \DateTime());
                        $newPost->setWeight($postItem->weight);
                        $newPost->setIsReturnable($postItem->is_returnable); 
                        $newPost->setIsCustom($postItem->is_custom);  
                        $newPost->setDeliveryType((!empty($postItem->delivery_type))?$postItem->delivery_type:'Pick Up');
                        if(!empty($category)){
                            $newPost->setPostCategory($category);
                        }
                        
                        
                        $newPost->setManagedBy($this->getUser());
                        
                       
    
                        $entityManager->persist($newPost);
                        $entityManager->flush();
                    }
    
                    $this->addFlash('success', 'Product(s) data has been imported successfully');
                    $this->logger->info('Data imported', $postData);
               } catch (\Exception $e){
                    $this->addFlash('error', 'Unable to import data correctly.');
                    $this->logger->error('Unable to import data correctly.');
                } 
            }else{
                $this->logger->error('File was not uploaded');
            }
    
            return $this->render('admin/product/import.html.twig', [
                'page_title' => 'Import Product',
                'back_link' => $this->adminUrlGenerator->setController(ProductCrudController::class)->setAction(Action::INDEX)->generateUrl(),
                'form' => $form->createView()
            ]);
        }
    
        public function exportPost()
        {
            try {
                $posts = $this->productRepository->findDownloadableData();
                $filename = sprintf("%s_%s.json", 'EXPORT_FILE_POST',microtime(true));
                if(empty($posts)){
                    $this->addFlash('error', "There are no post(s) available in the list.");
                }else{
                    $response = new Response(json_encode($posts)); 
                    $disposition = HeaderUtils::makeDisposition(
                        HeaderUtils::DISPOSITION_ATTACHMENT,
                        $filename
                    );
                    $response->headers->set('Content-Disposition', $disposition);
    
                    return $response;
                }
            } catch (\Exception $e) {
                $this->addFlash('error', "Something wrong!! Try to find the perfect exception.");
            }
            
            return $this->redirect($this->adminUrlGenerator->setController(ProductCrudController::class)->setAction(Action::INDEX)->generateUrl());
        } 

    
}
