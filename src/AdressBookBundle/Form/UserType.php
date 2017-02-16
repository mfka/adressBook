<?php

namespace AdressBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', 'text', array('label' => 'Your login:'))
            ->add('pass', 'repeated', array(
                'type' => 'password',
                'first_options' => array('label' => 'Password:'),
                'second_options' => array('label' => 'Repeat Password:'),
            ))
            ->add('name', 'text', array('label' => 'Your name:'))
            ->add('surname', 'text', array('label' => 'Your surname:'))
            ->add('birth', 'date', array(
                'widget' => 'single_text',
                'label' => 'Your date of Birth:'
            ))
            ->add('groups', 'entity', array(
                'class' => 'AdressBookBundle:Groups',
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Groups:'
            ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdressBookBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adressbookbundle_user';
    }
}
