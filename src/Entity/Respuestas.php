<?php

namespace App\Entity;

use App\Repository\RespuestasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RespuestasRepository::class)]
class Respuestas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'respuestas', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Preguntas $respuesta = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRespuesta(): ?Preguntas
    {
        return $this->respuesta;
    }

    public function setRespuesta(Preguntas $respuesta): static
    {
        $this->respuesta = $respuesta;

        return $this;
    }
}
