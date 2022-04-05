<?php

namespace App\Form;

use App\Entity\Inscription;
use App\Entity\Students;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('student', EntityType::class, [
                'label' => 'Eléve',
                'class' => Students::class,
                'choice_label' => 'fullname',
                'mapped' => false
            ])

            /*->add('event', EntityType::class, [
                'class' => Events::class,
                'choice_label' => 'name',
                'mapped' => false
            ])*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
