<?php

namespace App\Form;

use App\Entity\Navire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\DBAL\Types\TextType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\AisShipType;

class NavireType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
                ->add('IMO', TextType::class)
                ->add('nom', TextType::class)
                ->add('MMSI', TextType::class)
                ->add('indicatifAppel', TextType::class)
                ->add('eta', DateTimeType::class, ['widget' => 'single_text'])
                ->add('longueur', IntegerType::class)
                ->add('largeur', IntegerType::class)
                ->add('tirantdeau', NumberType::class, array(
                    'scale' => 1,
                ))
                ->add('type', EntityType::class, [
                    'class' => AisShipType::class,
                    'choice_label' => 'libelle'
                ])
                ->add('pavillon', EntityType::class, [
                    'class' => Pays::class,
                    'choice_label' => 'nom'
                ])
                ->add('destination', EntityType::class, [
                    'class' => Port::class,
                    'choice_label' => 'nom'
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => Navire::class,
        ]);
    }
}
