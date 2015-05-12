<?php

namespace UserManager\RegistrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
Use UserManager\LoginBundle\Entity\MailGenerator;
use Proxies\__CG__\UserManager\LoginBundle\Entity\Login;

class RegistrationController extends Controller
{
    public function registrationAction(Request $request)
    {
    	$session = new Session();
    	$session->start();
    	
    	$email = $request->get('email'); 
    	$password = $request->get('password');
    	
    	$login = $this->getDoctrine()->getRepository('UserManagerLoginBundle:Login')->findOneByEmail($email);
        if ($login) {
        	$session->getFlashBag()->add('register_error', 'Email address is already registered');
        	$session->getFlashBag()->add('form_name', 'register');
        	
        	return $this->redirectToRoute('user_manager_login');
        }else{
        	$role = $this->getDoctrine()->getRepository('UserManagerLoginBundle:Role')->find(1);
        	
        	$login = new Login();
        	$login->setUsername("");
        	$login->setEmail($email);
        	$login->setPassword($password);
        	$login->setIsActive(0);
        	$login->setIsAccountExpired(0);
        	$login->setIsAccountLocked(0);
        	$login->setIsCredentialsExpired(0);
        	$login->setRole($role);
        	$login->setUpdatedAt(new \DateTime());
        	$login->setCreatedAt(new \DateTime());
        	
        	$em = $this->getDoctrine()->getEntityManager();
        	$em->persist($login);
        	$em->flush();
        	
        	$sender = $this->container->getParameter('sender_email');
        	$subject = "Activate your account of metronic";
        	$emailBody = $this->render('UserManagerRegistrationBundle:Registration:registrationActiveMailContent.html.twig');
        	$mail = new MailGenerator($this->get('mailer'));
        	$mail->sendEmail($sender, $email, $emailBody,$subject);
        	unset($mail);
        	return $this->render('UserManagerRegistrationBundle:Registration:registrationSuccess.html.twig');
        }
        return $this->render('UserManagerRegistrationBundle:Registration:registration.html.twig');
    }
}
