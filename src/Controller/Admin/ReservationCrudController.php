<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class ReservationCrudController extends AbstractCrudController
{
    public const ACTION_DUPLICATE  = 'dupliquer';

    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $duplicate = Action::new(self::ACTION_DUPLICATE)
            ->linkToCrudAction('duplicateReservation')
            ->setCssClass('btn btn-info');

        return $actions
            ->add(Crud::PAGE_EDIT, $duplicate)
            ->reorder(Crud::PAGE_EDIT, [self::ACTION_DUPLICATE, Action::SAVE_AND_RETURN]);
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')->hideOnForm();
        yield DateField::new('date_reservation', 'Date résa');
        yield TimeField::new('creneau_horaire', 'Horaire');
        yield IntegerField::new('nb_couvert', 'Nb de convive');
        yield TextField::new('nom_reservation', 'Nom');
        yield TextField::new('prenom_reservation', 'Prénom');
        yield EmailField::new('email_reservation', 'E-mail');
        yield TelephoneField::new('telephone_reservation', 'Téléphone');
        yield TextareaField::new('allergie_reservation', 'Allergie');
    }

    public function duplicateReservation(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $em
    ): Response {
        /**
         * @var Reservation $reservation
         */
        $reservation = $context->getEntity()->getInstance();

        $duplicatedReservation = clone $reservation;

        parent::persistEntity($em, $duplicatedReservation);

        $url = $adminUrlGenerator->setController(self::class)
            ->setAction(Action::DETAIL)
            ->setEntityId($duplicatedReservation->getId())
            ->generateUrl();

        return $this->redirect($url);
    }
}
