<?php

namespace App\Entity;

use App\Repository\EscaleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EscaleRepository::class)]
class Escale {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'dateHeureArrivee', type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateHeureArrivee = null;

    #[ORM\Column(name: 'dateHeureDepart', type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateHeureDepart = null;

    #[ORM\ManyToOne(inversedBy: 'escales')]
    #[ORM\JoinColumn(name: 'idport', referencedColumnName: 'id', nullable: false)]
    private ?Port $port = null;

    #[ORM\ManyToOne(inversedBy: 'escales')]
    #[ORM\JoinColumn(name: 'idnavire', referencedColumnName: 'id', nullable: false)]
    private ?Navire $navire = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getDateHeureArrivee(): ?\DateTimeInterface {
        return $this->dateHeureArrivee;
    }

    public function setDateHeureArrivee(\DateTimeInterface $dateHeureArrivee): static {
        $this->dateHeureArrivee = $dateHeureArrivee;

        return $this;
    }

    public function getDateHeureDepart(): ?\DateTimeInterface {
        return $this->dateHeureDepart;
    }

    public function setDateHeureDepart(?\DateTimeInterface $dateHeureDepart): static {
        $this->dateHeureDepart = $dateHeureDepart;

        return $this;
    }

    public function getPort(): ?Port {
        return $this->port;
    }

    public function setPort(?Port $port): static {
        $this->port = $port;

        return $this;
    }

    public function getNavire(): ?Navire {
        return $this->navire;
    }

    public function setNavire(?Navire $navire): static {
        $this->navire = $navire;

        return $this;
    }
}
