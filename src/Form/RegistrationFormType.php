<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class,[
                'label' => 'Prénom',
            ])

            ->add('firstname', TextType::class,[
                'label' => 'Nom',
            ])

            ->add('email', EmailType::class,[
                'label' => 'Email',
            ])

            ->add('address', TextType::class,[
                'label' => 'Adresse',
            ])

            ->add('zip', TextType::class,[
                'label' => 'Code Postal',
            ])

            ->add('town', TextType::class,[
                'label' => 'Ville',
            ])
//            ->add('agreeTerms', CheckboxType::class, [
//                'mapped' => false,
//                'constraints' => [
//                    new IsTrue([
//                        'message' => 'You should agree to our terms.',
//                    ]),
//                ],
//            ])
            /*->add('plainPassword', PasswordType::class, [
                'label' => 'Mot de passe',
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])*/

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,

                'invalid_message'    => 'Les mots de passe ne correspondent pas.',
                'options'            => ['attr' => ['class' => 'password-field']],
                'first_options'      => [ 'label' => 'Mot de passe' ],
                'second_options'     => [ 'label' => 'Confirmation du mot de passe'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
