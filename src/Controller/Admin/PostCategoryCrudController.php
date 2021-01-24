<?php

namespace App\Controller\Admin;

use App\Entity\PostCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PostCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PostCategory::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        $uploadPath = $this->getParameter('posts');
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('category_name'),
            ImageField::new('CategoryThumbnail')->setBasePath($uploadPath['uploads']['url_prefix'])->setUploadDir($uploadPath['uploads']['url_path'])->setLabel("Category thumbnail")->setRequired(false),
            TextEditorField::new('description'),
          
            BooleanField::new('status'),
            DateTimeField::new('created')->hideOnForm()->hideOnIndex(),
            DateTimeField::new('updated')->hideOnForm()->hideOnIndex(),
        ];
    }
   
}
