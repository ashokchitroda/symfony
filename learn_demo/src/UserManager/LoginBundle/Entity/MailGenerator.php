<?php

namespace UserManager\LoginBundle\Entity;


/**
* This class is used to send mail
*/
class MailGenerator
{
    protected $mailer;


    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail($from = "", $to = "", $body = "", $subject = '')
    {
        $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom($from)
                ->setTo($to)
                ->setContentType('text/html')
                ->setCharset('UTF-8')
                ->setBody($body);

        $this->mailer->send($message);
    }
}