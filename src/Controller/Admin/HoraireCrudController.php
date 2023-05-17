<?php

namespace App\Controller\Admin;

use App\Entity\Horaire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class HoraireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horaire::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('jour'),
            TimeField::new('ouverture_midi'),
            TimeField::new('fermeture_midi'),
            TimeField::new('ouverture_soir'),
            TimeField::new('fermeture_soir'),
            DateTimeField::new('creation')
                ->hideOnForm()
                ->setTimezone('Europe/Paris'),
            DateTimeField::new('modification')
                ->hideOnForm()
                ->setTimezone('Europe/Paris'),
        ];
    }
}
