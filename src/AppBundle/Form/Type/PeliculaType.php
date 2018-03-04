<?php
/**
 * Created by PhpStorm.
 * User: miguel
 * Date: 4/03/18
 * Time: 4:32
 */

namespace AppBundle\Form\Type;

use AppBundle\Entity\Pelicula;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeliculaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo', null,[
                'label' => 'Titulo',
                'required' => true
            ])
            ->add('director' ,null,[
                'label' => 'Director',
                'required' => true
            ])
            ->add('resumen',null,[
                'label' => 'Resumen',
                'required' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pelicula::class,
        ]);
    }

}