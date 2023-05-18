<?php

namespace App\Controller;

use App\Entity\Horaire;
use App\Entity\Image;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  public function __construct(private readonly EntityManagerInterface $em)
  {
  }

  #[Route('/', name: 'homepage')]
  public function index(): Response
  {

    $repository = $this->em->getRepository(Image::class);
    $images = $repository->findAll(Image::class);

    $repository = $this->em->getRepository(Horaire::class);
    $horaires = $repository->findAll(Horaire::class);

    return $this->render('home/index.html.twig', [
      'images' => $images,
      'horaires' => $horaires,
    ]);
  }
}
