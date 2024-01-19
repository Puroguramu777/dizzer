<?php

namespace App\Form;

use App\Entity\Music;
use App\Entity\Author;
use App\Repository\AuthorRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichFileType;


class MusicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('musicName')
            ->add('musicDateCreation')
            ->add('authors', EntityType::class, [
                'class' => Author::class,
                'query_builder' => function (AuthorRepository $ar){
                    return $ar->orderByName('asc');
                },
                'choice_label' => function ($author) {
                    return $author->getFullName();
                },
                'placeholder' =>"Choisir un ou des auteurs",
                'required' => true,
                'multiple' => true,
            ])
            ->add('imageFile', FileType::class, [
                "required" => false,
                "label" => "Couverture"
            ])
            ->add('save', SubmitType::class, ['label'=> "Enregistrer"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Music::class,
        ]);
    }
}
