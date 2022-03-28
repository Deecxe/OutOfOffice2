<?php

namespace App\Form;

use App\Entity\EspaceDeCoworking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EspaceDeCoworkingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('url')
            ->add('titre')
            ->add('prix')
            ->add('adresse')
            ->add('descriptif')
            ->add('imprimante')
            ->add('parking')
            ->add('cafe')
            ->add('heureOuverture')
            ->add('heureFermeture')
            ->add('nombrePlace')
            ->add('nombrePlaceLibre')
            ->add('lat')
            ->add('longitude')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EspaceDeCoworking::class,
        ]);
    }
}
