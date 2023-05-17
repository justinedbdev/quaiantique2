<?php

namespace App\Controller\Admin;

use App\Entity\Plat;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class PlatCrudController extends AbstractCrudController
{
    public const ACTION_DUPLICATE  = 'dupliquer';

    public static function getEntityFqcn(): string
    {
        return Plat::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $duplicate = Action::new(self::ACTION_DUPLICATE)
            ->linkToCrudAction('duplicatePlat')
            ->setCssClass('btn btn-info');

        return $actions
            ->add(Crud::PAGE_EDIT, $duplicate)
            ->reorder(Crud::PAGE_EDIT, [self::ACTION_DUPLICATE, Action::SAVE_AND_RETURN]);
    }

    public function configureFields(string $pageName): iterable
    {

        yield IdField::new('id')->hideOnForm();
        yield TextField::new('titre');
        yield TextEditorField::new('description');
        yield MoneyField::new('prix')->setCurrency('EUR');
        yield AssociationField::new('categorie');
        yield DateTimeField::new('creation')
            ->hideOnForm()
            ->setTimezone('Europe/Paris');
        yield DateTimeField::new('modification')
            ->hideOnForm()
            ->setTimezone('Europe/Paris');;
    }

    public function duplicatePlat(
        AdminContext $context,
        AdminUrlGenerator $adminUrlGenerator,
        EntityManagerInterface $em
    ): Response {
        /**
         * @var Plat $plat
         */
        $plat = $context->getEntity()->getInstance();

        $duplicatedPlat = clone $plat;

        parent::persistEntity($em, $duplicatedPlat);

        $url = $adminUrlGenerator->setController(self::class)
            ->setAction(Action::DETAIL)
            ->setEntityId($duplicatedPlat->getId())
            ->generateUrl();

        return $this->redirect($url);
    }
}
