<?php

namespace App\Form;

use App\Entity\Equipe;
use App\Entity\Joueur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class JoueurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                "label"=>"Nom du joueur"
            ])
            ->add('photo',  ChoiceType::class,[
                'choices' => [
                    'Attaquant' => '1.jpg',
                    'Défenseur' => '2.jpg',
                    'Gardien' => '3.jpg'

            ]])
            ->add('pays', TextType::class,[
                "label"=>"Pays du joueur"
            ])
            ->add('presentation',  TextareaType::class,[
                "label"=>"Présentation du joueur"
            ])
            ->add('relation', EntityType::class,[
                "class"=>Equipe::class,
                "choice_label"=> "nom",
                "label"=> "Equipe du joueur"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Joueur::class,
        ]);
    }
}
