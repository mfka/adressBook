<?php

namespace AdressBookBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="login", type="string", length=100, unique=true)
     */
    private $login;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="pass", type="string", length=255)
     */
    private $pass;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="Name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="surname", type="string", length=100)
     */
    private $surname;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="birth", type="date", nullable=true)
     */
    private $birth;

    /**
     * @ORM\ManyToMany(targetEntity="Groups", inversedBy="user")
     * @ORM\JoinTable(name="users_groups")
     */
    private $groups;


    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

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
     * Set login
     *
     * @param string $login
     *
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set pass
     *
     * @param string $pass
     *
     * @return User
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set birth
     *
     * @param string $birth
     *
     * @return User
     */
    public function setBirth($birth)
    {
        $this->birth = $birth;

        return $this;
    }

    /**
     * Get birth
     *
     * @return string
     */
    public function getBirth()
    {
        return $this->birth;
    }

    /**
     * Set groups
     *
     * @param string $groups
     *
     * @return User
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;

        return $this;
    }

    /**
     * Get groups
     *
     * @return string
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Add group
     *
     * @param \AdressBookBundle\Entity\Groups $group
     *
     * @return User
     */
    public function addGroup(\AdressBookBundle\Entity\Groups $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \AdressBookBundle\Entity\Groups $group
     */
    public function removeGroup(\AdressBookBundle\Entity\Groups $group)
    {
        $this->groups->removeElement($group);
    }

    public function __toString()
    {
        return $this->name . ' ' . $this->surname . ' - ' . $this->login;
    }
}
