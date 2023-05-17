<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Categorie::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            DateTimeField::new('creation')
                ->hideOnForm()
                ->setTimezone('Europe/Paris'),
            DateTimeField::new('modification')
                ->hideOnForm()
                ->setTimezone('Europe/Paris'),
        ];
    }

    public function deleteEntity(EntityManagerInterface $em, $entityInstance): void
    {
        if (!$entityInstance instanceof Categorie) return;

        foreach ($entityInstance->getPlats() as $plat) {
            $em->remove($plat);
        }

        parent::deleteEntity($em, $entityInstance);
    }
}
