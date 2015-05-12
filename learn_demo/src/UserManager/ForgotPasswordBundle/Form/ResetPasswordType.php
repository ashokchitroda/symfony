<?php

namespace UserManager\ForgotPasswordBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface; 
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints as Assert;

class ResetPasswordType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'The password fields must match.',
                'options' => array('attr' => array('class' => 'password-field')),
                'required' => true,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
            	'constraints' => array(
					new Assert\NotBlank(array('message' => 'Password should not be blank.')),
            		new Assert\Length(array(
            			'min' => 8,
            			'max' => 40,
            			'minMessage' => "Password must be at least {{ limit }} characters long.",
            			'maxMessage' => "Password cannot be longer than {{ limit }} characters.",
            		)),
                )
           ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'UserManager\LoginBundle\Entity\Login'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'usersmanager_loginbundle_forgotpassword';
    }
}
