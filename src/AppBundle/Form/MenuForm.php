<?php

namespace AppBundle\Form;
use AppBundle\Entity\Menu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class MenuForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ...
            ->add('name', null, array('label' => false, 'attr' => array('class' => 'form-input')))
            ->add('description', null, array('label' => false, 'attr' => array('class' => 'form-input')))
            ->add('price', null, array('label' => false, 'attr' => array('class' => 'form-input', 'type' => 'number')))
            ->add('photo', null, array('label' => false, 'attr' => array('class' => 'form-input')))
            // ...
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Menu::class,
        ));
    }
}