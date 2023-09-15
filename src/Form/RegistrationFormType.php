<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class RegistrationFormType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('email', EmailType::class, [
        'label' => 'Votre email',
        'attr' => [
          'class' => 'mt-2',
          'placeholder' => 'Entrez votre email'
        ]
      ])
      ->add('agreeTerms', CheckboxType::class, [
        'label' => 'Accepter les conditions d\'utilisation',
        'mapped' => false,
        'constraints' => [
          new IsTrue([
            'message' => 'Vous devez accepter les conditions d\'utilisation pour pouvoir vous inscrire.',
          ]),
        ],
      ])
      ->add('plainPassword', RepeatedType::class, [
        'type' => PasswordType::class,
        'mapped' => false,
        'invalid_message' => 'Les mots de passe doivent être identiques',
        'options' => [
          'attr' => [
            'class' => 'password-field',
            'autocomplete' => 'new-password',
          ]
        ],
        'required' => true,
        'first_options'  => [
          'label' => 'Entrez votre mot de passe',
          'attr' => [
            'class' => 'form-control',
            'placeholder' => 'Entrez votre mot de passe'
          ],
          'constraints' => [
            new NotBlank(['message' => 'Veuillez saisir un mot de passe.']),
            new Regex('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{14,}$/', "Votre mot de passe doit contenir au moins 14 caractères avec une majuscule, une minuscule, un chiffre et un caractère spécial"),
          ]
        ],
        'second_options' => [
          'label' => 'Validez votre mot de passe',
          'attr' => [
            'class' => 'form-control',
            'placeholder' => 'Validez votre mot de passe'
          ],
          'constraints' => [
            new NotBlank(['message' => 'Veuillez saisir un mot de passe.']),
            new Regex('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{14,}$/', "Votre mot de passe doit contenir au moins 14 caractères avec une majuscule, une minuscule, un chiffre et un caractère spécial"),
          ]
        ],
      ]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => User::class,
    ]);
  }
}
