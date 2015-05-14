<?php

namespace UserManager\ForgotPasswordBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserManager\ForgotPasswordBundle\Entity\ForgotPassword;
use UserManager\ForgotPasswordBundle\Form\ResetPasswordType;
Use UserManager\LoginBundle\Entity\MailGenerator;

class ForgotPasswordController extends Controller
{
    public function forgotPasswordAction(Request $request)
    {
    	$session = new Session();
    	$session->start();
    	
        $email = $request->get('email'); 

        $login = $this->getDoctrine()
        	->getRepository('UserManagerLoginBundle:Login')
        	->findOneByEmail($email);
        
        if (!$login) {
        	$session->getFlashBag()->add('forget_error', 'Email address is not registered');
        	$session->getFlashBag()->add('form_name', 'forget');
        	
        	return $this->redirectToRoute('user_manager_login');
        }else{
            $fpKey = \sha1(\md5($email.date('Y-m-d h:i:s')));
            
            $forgotpassword = $this->getDoctrine()
            	->getRepository('UserManagerForgotPasswordBundle:ForgotPassword')
            	->findOneBy(array('id_login' => $login->getId()));
            
            if(!$forgotpassword){
            	$forgotpassword = new ForgotPassword();
            }
            
            $forgotpassword->setFpKey($fpKey);
            $forgotpassword->setLogin($login);
            $forgotpassword->setUpdatedAt(new \DateTime());
            $forgotpassword->setCreatedAt(new \DateTime());

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($forgotpassword);
            $em->flush();

            $sender = $this->container->getParameter('sender_email');
            $subject = "Reset your passowrd of metronic";
            $emailBody = $this->renderView('UserManagerForgotPasswordBundle:forgotPassword:forgotPasswordMailContent.html.twig',
            	array('fpkey' => $fpKey)
            );

            // Send mail
            $mail = new MailGenerator($this->get('mailer'));
            $mail->sendEmail($sender, $email, $emailBody,$subject);
            unset($mail);

            return $this->redirectToRoute('user_manager_forgot_password_success');
        }
    }
    
    public function forgotPasswordSuccessAction(Request $request)
    {
    	return $this->render('UserManagerForgotPasswordBundle:forgotPassword:forgotPassword.html.twig');
    }
    
    public function resetPasswordAction(Request $request)
    {
	    $forgotpassword = $this->getDoctrine()
	    	->getRepository('UserManagerForgotPasswordBundle:ForgotPassword')
	    	->findOneBy(array('fp_key' => $request->get('key')));
	    
	    if ($forgotpassword) {
	    	$form = $this->createForm(new ResetPasswordType(), $forgotpassword->getLogin());
	    	$form->handleRequest($request);
	    	if ($form->isValid()) { 
	    		$em = $this->getDoctrine()->getManager();
	    		$em->remove($forgotpassword);
	    		$em->flush();
	    		return $this->redirectToRoute('user_manager_reset_password_success');
	    	}
	    	return $this->render('UserManagerForgotPasswordBundle:resetPassword:resetPassword.html.twig',
	    		array('form' => $form->createView())
	    	);
	    }else{
	    	return $this->render('UserManagerForgotPasswordBundle:resetPassword:keyNotMatch.html.twig');
	    }
    }
    
    public function resetPasswordSuccessAction(Request $request)
    {
    	return $this->render('UserManagerForgotPasswordBundle:resetPassword:resetPasswordSuccess.html.twig');
    }
}
