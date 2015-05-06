<?php

namespace UserManager\UserProfileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserProfileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('address')
            ->add('city')
            ->add('state')
            ->add('contry')
            ->add('zip_code')
            ->add('phone')
            ->add('mobile')
            ->add('fax')
            ->add('created_at')
            ->add('updated_at')
            ->add('Login')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserManager\UserProfileBundle\Entity\UserProfile'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'usermanager_userprofilebundle_userprofile';
    }
}
