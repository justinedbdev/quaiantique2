<?php

namespace App\EventSubscriber;

use App\Entity\Categorie;
use App\Entity\Horaire;
use App\Entity\Image;
use App\Entity\Menu;
use App\Entity\Plat;
use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AdminSubscriber implements EventSubscriberInterface
{
  public static function getSubscribedEvents()
  {
    return [
      BeforeEntityPersistedEvent::class => ['setCreation'],
      BeforeEntityUpdatedEvent::class => ['setModification']
    ];
  }

  public function setCreation(BeforeEntityPersistedEvent $event)
  {
    $entityInstance = $event->getEntityInstance();

    if (!$entityInstance instanceof Plat && !$entityInstance instanceof Categorie && !$entityInstance instanceof Menu && !$entityInstance instanceof Image && !$entityInstance instanceof Horaire && !$entityInstance instanceof Reservation) return;

    $entityInstance->setCreation(new \DateTime);
  }

  public function setModification(BeforeEntityUpdatedEvent $event)
  {
    $entityInstance = $event->getEntityInstance();

    if (!$entityInstance instanceof Plat && !$entityInstance instanceof Categorie && !$entityInstance instanceof Menu && !$entityInstance instanceof Image && !$entityInstance instanceof Horaire && !$entityInstance instanceof Reservation) return;

    $entityInstance->setModification(new \DateTime);
  }
}
