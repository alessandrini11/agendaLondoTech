<?php

namespace App\Form;

use App\Entity\Invite;
use App\Entity\Priority;
use App\Entity\Evenement;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',TextType::class,[
                'label' => false
            ])
            ->add('date',DateType::class,[
                'widget' => 'single_text'
            ])
            ->add('priority',EntityType::class,[
                'class' => Priority::class,
                'label' => false,
                'choice_label' => 'name'
            ])
            ->add('invites',EntityType::class,[
                'class' => Invite::class,
                'multiple' => true,
                'label' => false,
                'choice_label' => 'name',
                'expanded'=>true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
