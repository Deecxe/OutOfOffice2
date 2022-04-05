<?php

namespace App\Form;

use App\Entity\EspaceDeCoworking;
use App\Form\EspaceDecoworking1Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchEspaceType extends AbstractType
{
    const PRICE = [15,20,50];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prix', IntegerType::class)
            ->add('ville', TextType::class)
            ->add('Recherche',SubmitType::class)
            ;
        }
}

?>