<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationFormType;
use App\Repository\PlaceDisponibleRepository;
use App\Repository\ReservationRepository;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation/{date_reservation}/{nb_couvert}', name: 'app_reservation')]
    public function reservation(
        Request $request,
        MailerService $mailerService,
        EntityManagerInterface $entityManager,

    ): Response {
        $reservation = new Reservation();
        $form = $this->createForm(ReservationFormType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($reservation);
            $entityManager->flush();

            //CONFIRMATION MAILER
            $mailerService->send(
                $reservation->getEmailReservation(),
                'Confirmation de votre réservation - Quai Antique',
                'reservation_confirmation.html.twig',
                [
                    'reservation' => $reservation,
                    'date_reservation' => $reservation->getDateReservation()->format('d/m/y'),
                    'creneau_horaire' => $reservation->getCreneauHoraire()->format('H\hi')
                ]
            );

            $this->addFlash('success', 'Votre réservation a bien été prise en compte.');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('reservation/index.html.twig', [
            'reservationForm' => $form->createView(),
        ]);
    }
}
