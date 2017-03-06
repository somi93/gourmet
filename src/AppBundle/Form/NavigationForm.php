<?php

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class NavigationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('link', null, [
                'label' => false,
                'attr' => array(
                    'class' => 'form-input',
                    'placeholder' => 'Link'
                )
            ])
            ->add('linkText', null, [
                'label' => false,
                'attr' => array(
                    'class' => 'form-input',
                    'placeholder' => 'Link Text'
                )
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Navigation'
        ]);
    }
}