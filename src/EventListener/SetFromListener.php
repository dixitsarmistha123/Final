<?php

namespace App\EventListener;

use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Mailer\Event\MessageEvent;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mime\NamedAddress;
use App\Entity\Product;




class SetFromListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            MessageEvent::class => 'onMessage',
            AfterEntityPersistedEvent::class => ['setmail'],
        ];
    }
    public function setmail( AfterEntityPersistedEvent $event){
        $entity = $event->getEntityInstance();
        if ($entity instanceof Product) {
            $entity->setProductStatus('active');
        }

    }
    public function onMessage(MessageEvent $event)
    {
        $email = $event->getMessage();
        if (!$email instanceof Email) {
            return;
        }
        $email->from(new Address('dixitsarmistha7@gmail.com', 'The Space Bar'));
    }
    
}

