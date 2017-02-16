<?php

namespace AdressBookBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GroupsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('users', 'entity', array(
                'class' => 'AdressBookBundle:User',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Users:'
            ))
            ->add('submit', 'submit', array('label' => 'Confirm', 'attr' => array('class' => 'btn btn-primary')));


    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AdressBookBundle\Entity\Groups'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'adressbookbundle_groups';
    }
}
