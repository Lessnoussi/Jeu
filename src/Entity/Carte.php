<?php

namespace App\Entity;

use App\Repository\CarteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CarteRepository::class)
 *  @UniqueEntity(fields = {"couleur", "valeur"})
 */
class Carte
{
    //Carreaux, Coeur, Pique, Trèfle

    const COLOR = [
        0 => 'Carreaux',
        1 => 'Coeur',
        2 => 'Pique',
        3 => 'Trèfle',
    ];
    //AS, 2, 3, 4, 5, 6, 7, 8, 9, 10, Valet, Dame, Roi
    const VALEUR = [
        0 => 'As',
        1 => '2',
        2 => '3',
        3 => '4',
        4 => '5',
        5 => '6',
        6 => '7',
        7 => '8',
        8 => '9',
        9 => '10',
        10 => 'Valet',
        11 => 'Dame',
        12 => 'Roi',
    ];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $couleur;

    /**
     * @ORM\Column(type="integer")
     */
    private $valeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleur(): ?int
    {
        return $this->couleur;
    }

    public function getCouleurType(): ?string
    {
        return self::COLOR[$this->couleur];
    }

    public function setCouleur(int $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function getValeurType(): ?string
    {
        return self::VALEUR[$this->valeur];
    }

    public function setValeur(int $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }
}
