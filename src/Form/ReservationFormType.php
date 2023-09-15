<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_reservation', DateType::class, [
                'widget' => 'single_text',
                'label' => 'Date de réservation*',
                'input'  => 'datetime_immutable',
                'attr'  => ['min' => date('Y-m-d')],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Choisissez une date de réservation',
                    ])
                ]
            ])
            ->add('creneau_horaire', TimeType::class, [
                'label' => 'Créneau horaire*',
                'input' => 'datetime',
                'widget'  => 'choice',
                'hours'   => [19, 20, 21],
                'minutes' => [00, 15, 30, 45],
                "required" => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Choisissez un créneau horaire',
                    ])
                ]
            ])
            ->add('nb_couvert', IntegerType::class, [
                'label' => 'Nombre de convive*',
                'attr' => [
                    'placeholder' => 'Nombre de convive'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez un nombre de convive',
                    ])
                ]
            ])
            ->add('nom_reservation', TextType::class, [
                'label' => 'Nom*',
                'attr' => [
                    'placeholder' => 'Nom'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre nom',
                    ])
                ]
            ])
            ->add('prenom_reservation', TextType::class, [
                'label' => 'Prénom*',
                'attr' => [
                    'placeholder' => 'Prénom'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre prénom',
                    ])
                ]
            ])
            ->add('email_reservation', EmailType::class, [
                'label' => 'Email*',
                'attr' => [
                    'placeholder' => 'Email'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre email',
                    ])
                ]
            ])
            ->add('telephone_reservation', TelType::class, [
                'label' => 'Numéro de téléphone*',
                'attr' => [
                    'placeholder' => 'Numéro de téléphone'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Entrez votre numéro de téléphone',
                    ])
                ]
            ])
            ->add('allergie_reservation', TextareaType::class, [
                'label' => 'Avez-vous des allergies à signaler au cuisinier ?',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Allergies ou informations complémentaires à déclarer'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
