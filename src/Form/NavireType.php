<?php

namespace App\Form;

use App\Entity\Navire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\TextType;

class NavireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('IMO', TextType::class)
            ->add('nom', TextType::class)
            ->add('MMSI', TextType::class)
            ->add('indicatifAppel', TextType::class)
            ->add('eta', TextType::class)
            ->add('longueur', TextType::class)
            ->add('largeur', TextType::class)
            ->add('tirantdeau', TextType::class)
            ->add('type', TextType::class)
            ->add('pavillon', TextType::class)
            ->add('destination', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Navire::class,
        ]);
    }
}
