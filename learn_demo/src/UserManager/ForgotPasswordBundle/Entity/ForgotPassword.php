<?php

namespace UserManager\ForgotPasswordBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ForgotPassword
 */
class ForgotPassword
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $fp_key;

    /**
     * @var integer
     */
    private $id_login;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \UserManager\LoginBundle\Entity\Login
     */
    private $Login;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fp_key
     *
     * @param string $fpKey
     * @return ForgotPassword
     */
    public function setFpKey($fpKey)
    {
        $this->fp_key = $fpKey;

        return $this;
    }

    /**
     * Get fp_key
     *
     * @return string 
     */
    public function getFpKey()
    {
        return $this->fp_key;
    }

    /**
     * Set id_login
     *
     * @param integer $idLogin
     * @return ForgotPassword
     */
    public function setIdLogin($idLogin)
    {
        $this->id_login = $idLogin;

        return $this;
    }

    /**
     * Get id_login
     *
     * @return integer 
     */
    public function getIdLogin()
    {
        return $this->id_login;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return ForgotPassword
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return ForgotPassword
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set Login
     *
     * @param \UserManager\LoginBundle\Entity\Login $login
     * @return ForgotPassword
     */
    public function setLogin(\UserManager\LoginBundle\Entity\Login $login = null)
    {
        $this->Login = $login;

        return $this;
    }

    /**
     * Get Login
     *
     * @return \UserManager\LoginBundle\Entity\Login 
     */
    public function getLogin()
    {
        return $this->Login;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }
}
