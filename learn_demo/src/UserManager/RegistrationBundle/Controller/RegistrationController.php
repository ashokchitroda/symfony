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
        	$role = $this->getDoctrine()->getRepository('UserManagerLoginBundle:Role')->findOneByRole('ADMIN');
        	
        	$activateKey = \sha1(\md5($email.date('Y-m-d h:i:s')));
        	
        	//set temporary
        	$username = explode("@", $email);
        	
        	$login = new Login();
        	$login->setUsername($username[0]);
        	$login->setEmail($email);
        	$login->setPassword($password);
        	$login->setIsActive(0);
        	$login->setIsAccountExpired(0);
        	$login->setIsAccountLocked(0);
        	$login->setIsCredentialsExpired(0);
        	$login->setActivteKey($activateKey); 
        	$login->setRole($role);
        	$login->setUpdatedAt(new \DateTime());
        	$login->setCreatedAt(new \DateTime());
        	
        	$em = $this->getDoctrine()->getEntityManager();
        	$em->persist($login);
        	$em->flush();
        	
        	$sender = $this->container->getParameter('sender_email');
        	$subject = "Activate your account of metronic";
        	$emailBody = $this->renderView('UserManagerRegistrationBundle:registration:registrationActiveMailContent.html.twig',
        		array('activateKey' => $activateKey)
        	);
        	$mail = new MailGenerator($this->get('mailer'));
        	$mail->sendEmail($sender, $email, $emailBody,$subject);
        	unset($mail);
        	return $this->render('UserManagerRegistrationBundle:registration:registrationSuccess.html.twig');
        }
        return $this->render('UserManagerRegistrationBundle:registration:registration.html.twig');
    }
    
    public function registrationActivateAction(Request $request)
    {
    	$login = $this->getDoctrine()->getRepository('UserManagerLoginBundle:Login')
    		->findOneBy(array('activte_key' => $request->get('key')));
    	
    	if ($login) {
    		
    		$login->setIsActive(1);
    		$login->setActivteKey(NULL);
    		$em = $this->getDoctrine()->getEntityManager();
    		$em->persist($login);
    		$em->flush();
    		
    		return $this->render('UserManagerRegistrationBundle:registrationActivate:registrationActivateSuccess.html.twig');
    	}	
    	return $this->render('UserManagerRegistrationBundle:registrationActivate:registrationActivatekeyNotMatch.html.twig');
    }
}
