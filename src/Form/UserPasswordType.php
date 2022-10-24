<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;

class UserPasswordType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'disabled' => true,
                'label' => 'Mon adresse email'
            ])

            ->add('old_password', PasswordType::class, [
                'label' => "Mon mot de passe actuel",
                'mapped' => false,
                'attr' => [
                    "placeholder" => "veuillez saisir votre mot de passe actuel",
                ]
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => "les deux mots de passes ne sont pas identiques",
                'mapped' => false,
                'label' => "Nouveau mot de passe",
                'required' => true,
                'first_options' => [
                    'label' => "Mot de passe",
                    'attr' => [
                        "placeholder" => "veuillez saisir votre nouveau mot de passe"
                    ]
                ],
                'second_options' => [
                    'label' => "Confirmer votre mot de passe",
                    'attr' => [
                        "placeholder" => "veuillez confirmer votre nouveau mot de passe"
                    ]
                ]
            ])
            ->add('Submit', SubmitType::class, [
                'label' => "Mettre à jour"
            ]);
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    // public function configureOptions(OptionsResolver $resolver): void
    // {
    //     $resolver->setDefaults([
    //         'data_class' => User::class,
    //     ]);
    // }
}
