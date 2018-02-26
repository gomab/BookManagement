<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;
    /**
     * @var
     *
     * @ORM\Column(type="date")
     */
    private $bDate;

    /**
     * @var
     *
     * @ORM\Column(type="string", length=255)
     */
    private $nationality;

    /**
     * @var
     *
     * @ORM\Column(type="text")
     */
    private $biography;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getNDate()
    {
        return $this->nDate;
    }

    /**
     * @param mixed $nDate
     */
    public function setNDate($nDate): void
    {
        $this->nDate = $nDate;
    }

    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality
     */
    public function setNationality($nationality): void
    {
        $this->nationality = $nationality;
    }

    /**
     * @return mixed
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * @param mixed $biography
     */
    public function setBiography($biography): void
    {
        $this->biography = $biography;
    }






    // add your own fields
}
