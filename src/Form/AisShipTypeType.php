<?php

namespace App\Form;

use App\Entity\AisShipType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use \Doctrine\DBAL\Types\TextType;

class AisShipTypeType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options): void {
        $builder
                ->add('aisShipType', TextType::class)
                ->add('libelle', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void {
        $resolver->setDefaults([
            'data_class' => AisShipType::class,
        ]);
    }
}
