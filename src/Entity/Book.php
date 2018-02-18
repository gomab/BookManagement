<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * The book title
     *
     * @var
     *
     * @ORM\Column(type="string", length=255)
     *
     * @ Assert\NotBlank(message="Le titre est obligatoire")
     */
    private $title;

    /**
     * The book author
     *
     * @var
     *
     *  @ORM\Column(type="string", length=255)
     *
     *  @ Assert\NotBlank(message="Le nom de l'auteur est obligatoire")
     */
    private $author;


    /**
     * @var
     *
     *  @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="decimal", nullable=true, precision=10, scale=2)
     *
     * @ Assert\GreaterThan(
     *      value =0,
     *     message="Le prix doit etre superieur à 0"
     * )
     *
     * @ Assert\NotBlank(message="Le prix est obligatoire")
     */
    private $price;

    /**
     * @var
     *
     *  @ORM\Column(type="date")
     *
     * @ Assert\Type("\DateTime")
     */
    private $dateEdit;

    /**
     * @var
     *
     * @ORM\Column(type="datetimetz")
     *
     * @ Assert\Type("\DateTime")
     */
    private $dateAdd;


    public function __construct()
    {
        $this->dateAdd = new \DateTime('NOW');
    }


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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getDateEdit()
    {
        return $this->dateEdit;
    }

    /**
     * @param mixed $dateEdit
     */
    public function setDateEdit($dateEdit): void
    {
        $this->dateEdit = $dateEdit;
    }

    /**
     * @return mixed
     */
    public function getDateAdd()
    {
        return $this->dateAdd;
    }

    /**
     * @param mixed $dateAdd
     */
    public function setDateAdd($dateAdd): void
    {
        $this->dateAdd = $dateAdd;
    }




}
