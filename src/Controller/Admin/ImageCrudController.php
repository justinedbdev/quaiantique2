<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImageCrudController extends AbstractCrudController
{
    public const IMAGES_BASE_PATH = 'upload/images';
    public const IMAGES_UPLOAD_DIR = 'public/upload/images';

    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre'),
            ImageField::new('lien', 'Image')
                ->setBasePath(self::IMAGES_BASE_PATH)
                ->setUploadDir(self::IMAGES_UPLOAD_DIR)
                ->setSortable(false),
            DateTimeField::new('creation')
                ->hideOnForm()
                ->setTimezone('Europe/Paris'),
            DateTimeField::new('modification')
                ->hideOnForm()
                ->setTimezone('Europe/Paris'),
        ];
    }
}
