<?php

namespace App\EventSubscriber;

use App\Entity\Product;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Swift_Events_SendEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\String\Slugger\SluggerInterface;

    class ProductEntitySubscriber extends AbstractController implements EventSubscriberInterface {
        private $slugger;
        private $mailer;
        private $Product;
        private $evt;
        public function __construct(Security $security, \Swift_Mailer $mailer,UserRepository $Product , SluggerInterface $slugger) {
            $this->slugger = $slugger;
            $this->security = $security;
            $this->mailer = $mailer;
            $this->UserRepository= $Product;
       

        }

        public static function getSubscribedEvents(){
            return [
                BeforeEntityPersistedEvent::class => ['setProduct'],
               // AfterEntityPersistedEvent::class=>['setmail'],
                BeforeEntityUpdatedEvent::class => ['updateProduct'],
            ];
        }

        public function setProduct(BeforeEntityPersistedEvent $event){
            $entity = $event->getEntityInstance();
            if ($entity instanceof Product) {
                $entity->setManagedBy($this->security->getUser());
                $entity->setProductStatus('draft');
                $entity->setCreatedAt(new \DateTime());
                $entity->setUpdatedAt(new \DateTime());
                $entity->setProductSlug($this->slugger->slug($entity->getName()));
            }
            dump("created");
            return;
           
        }

        public function updateProduct(BeforeEntityUpdatedEvent $event){

            $entity = $event->getEntityInstance();
            if ($entity instanceof Product) {
                $entity->setProductSlug($this->slugger->slug($entity->getName()));
                $entity->setUpdatedAT(new \DateTime());
            }
            
            return;
           
        } 

    
        // public function setmail( AfterEntityPersistedEvent $event){
        //     $entity = $event->getEntityInstance();
        //     if ($entity instanceof Product) {
        //     $this->sendEmail();
        //     }

        // }
    
//     public function sendEmail()
//     {
//         $email = (new \Swift_Message('Web hints is awesome!'))
//             ->setFrom('dixitsarmistha7@gmail.com')
//             ->setTo('kajalkhanna803@gmail.com')
//             //->cc('cc@example.com')
//             //->bcc('bcc@example.com')
//             //->replyTo('fabien@example.com')
//             //->priority(Email::PRIORITY_HIGH)
//             ->setBody(
//                 '<p>See Twig integration for better HTML integration!</p>'
//             );
//             /* ->subject('Time for Symfony Mailer!')
//             ->text('Sending emails is fun again!')
//             ->html('<p>See Twig integration for better HTML integration!</p>');
//  */

//       $this->$mailer->send($email);

     
//    }
            
}
