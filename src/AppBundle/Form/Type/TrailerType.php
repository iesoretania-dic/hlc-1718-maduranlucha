<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 5/03/18
 * Time: 3:07
 */

namespace AppBundle\Form\Type;


use AppBundle\Entity\Pelicula;
use AppBundle\Entity\Trailer;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TrailerType  extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', null,[
                'label' => 'Titulo',
                'required' => true
            ])
            ->add('duracion' ,null,[
                'label' => 'Duracion',
                'required' => true
            ])
            ->add('idioma',null,[
                'label' => 'Idioma',
                'required' => true
            ])
            ->add('peliculaTrailer', EntityType::class, [
                'class' => Pelicula::class,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.titulo', 'ASC');
                },
                'label' => 'Pelicula:'
            ]);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trailer::class,
        ]);
    }

}