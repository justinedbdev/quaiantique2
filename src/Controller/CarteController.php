<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Plat;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
  public function __construct(private readonly EntityManagerInterface $em)
  {
  }

  #[Route('/carte', name: 'carte')]
  public function index(): Response
  {

    $repository = $this->em->getRepository(Plat::class);
    $plats = $repository->findBy([], ['categorie' => 'ASC']);

    $categories = [];
    foreach ($plats as $plat) {
      $categories[$plat->getCategorie()->getNom()][] = $plat;
    }

    return $this->render('carte/index.html.twig', [
      'plats' => $categories,
      'categories' => $this->em->getRepository(Categorie::class)->findAll(),
    ]);
  }
}
