<?php

namespace UserManager\LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * Login
 */
class Login implements AdvancedUserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var string
     */
    private $password;

    /**
     * @var boolean
     */
    private $is_active;

    /**
     * @var boolean
     */
    private $is_account_expired;

    /**
     * @var boolean
     */
    private $is_account_locked;

    /**
     * @var boolean
     */
    private $is_credentials_expired;

    /**
     * @var integer
     */
    private $id_role;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \UserManager\ForgotPasswordBundle\Entity\ForgotPassword
     */
    private $ForgotPassword;

    /**
     * @var \UserManager\UserProfileBundle\Entity\UserProfile
     */
    private $UserProfile;

    /**
     * @var \UserManager\LoginBundle\Entity\Role
     */
    private $Role;


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
     * Set username
     *
     * @param string $username
     * @return Login
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Login
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Login
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Login
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set is_active
     *
     * @param boolean $isActive
     * @return Login
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get is_active
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set is_account_expired
     *
     * @param boolean $isAccountExpired
     * @return Login
     */
    public function setIsAccountExpired($isAccountExpired)
    {
        $this->is_account_expired = $isAccountExpired;

        return $this;
    }

    /**
     * Get is_account_expired
     *
     * @return boolean 
     */
    public function getIsAccountExpired()
    {
        return $this->is_account_expired;
    }

    /**
     * Set is_account_locked
     *
     * @param boolean $isAccountLocked
     * @return Login
     */
    public function setIsAccountLocked($isAccountLocked)
    {
        $this->is_account_locked = $isAccountLocked;

        return $this;
    }

    /**
     * Get is_account_locked
     *
     * @return boolean 
     */
    public function getIsAccountLocked()
    {
        return $this->is_account_locked;
    }

    /**
     * Set is_credentials_expired
     *
     * @param boolean $isCredentialsExpired
     * @return Login
     */
    public function setIsCredentialsExpired($isCredentialsExpired)
    {
        $this->is_credentials_expired = $isCredentialsExpired;

        return $this;
    }

    /**
     * Get is_credentials_expired
     *
     * @return boolean 
     */
    public function getIsCredentialsExpired()
    {
        return $this->is_credentials_expired;
    }

    /**
     * Set id_role
     *
     * @param integer $idRole
     * @return Login
     */
    public function setIdRole($idRole)
    {
        $this->id_role = $idRole;

        return $this;
    }

    /**
     * Get id_role
     *
     * @return integer 
     */
    public function getIdRole()
    {
        return $this->id_role;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Login
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
     * @return Login
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
     * Set ForgotPassword
     *
     * @param \UserManager\ForgotPasswordBundle\Entity\ForgotPassword $forgotPassword
     * @return Login
     */
    public function setForgotPassword(\UserManager\ForgotPasswordBundle\Entity\ForgotPassword $forgotPassword = null)
    {
        $this->ForgotPassword = $forgotPassword;

        return $this;
    }

    /**
     * Get ForgotPassword
     *
     * @return \UserManager\ForgotPasswordBundle\Entity\ForgotPassword 
     */
    public function getForgotPassword()
    {
        return $this->ForgotPassword;
    }

    /**
     * Set UserProfile
     *
     * @param \UserManager\UserProfileBundle\Entity\UserProfile $userProfile
     * @return Login
     */
    public function setUserProfile(\UserManager\UserProfileBundle\Entity\UserProfile $userProfile = null)
    {
        $this->UserProfile = $userProfile;

        return $this;
    }

    /**
     * Get UserProfile
     *
     * @return \UserManager\UserProfileBundle\Entity\UserProfile 
     */
    public function getUserProfile()
    {
        return $this->UserProfile;
    }

    /**
     * Set Role
     *
     * @param \UserManager\LoginBundle\Entity\Role $role
     * @return Login
     */
    public function setRole(\UserManager\LoginBundle\Entity\Role $role = null)
    {
        $this->Role = $role;

        return $this;
    }

    /**
     * Get Role
     *
     * @return \UserManager\LoginBundle\Entity\Role 
     */
    public function getRole()
    {
        return $this->Role;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
		if(!$this->getCreatedAt())
        {
          $this->created_at = new \DateTime();
        }
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
		$this->updated_at = new \DateTime();
    }
	
	    /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array('ROLE_'.$this->Role->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
    }

    public function isAccountNonExpired()
    {
        return (!$this->is_account_expired);
    }

    public function isAccountNonLocked()
    {
        return (!$this->is_account_locked);
    }

    public function isCredentialsNonExpired()
    {
        return (!$this->is_credentials_expired);
    }

    public function isEnabled()
    {
        return $this->is_active;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
        ) = unserialize($serialized);
    }
        
    public function __toString()
    {
        return (string) $this->id_role;
    }
    /**
     * @var string
     */
    private $activte_key;


    /**
     * Set activte_key
     *
     * @param string $activteKey
     * @return Login
     */
    public function setActivteKey($activteKey)
    {
        $this->activte_key = $activteKey;

        return $this;
    }

    /**
     * Get activte_key
     *
     * @return string 
     */
    public function getActivteKey()
    {
        return $this->activte_key;
    }
}
