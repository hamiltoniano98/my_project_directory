<?php

namespace App\Entity;

use App\Repository\PreguntasRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreguntasRepository::class)]
class Preguntas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $preguntas = null;

    #[ORM\Column(length: 255)]
    private ?string $creado_usuario = null;

    #[ORM\Column]
    private ?int $categoria = null;

    #[ORM\OneToOne(mappedBy: 'respuesta', cascade: ['persist', 'remove'])]
    private ?Respuestas $respuestas = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPreguntas(): ?string
    {
        return $this->preguntas;
    }

    public function setPreguntas(string $preguntas): static
    {
        $this->preguntas = $preguntas;

        return $this;
    }

    public function getCreadoUsuario(): ?string
    {
        return $this->creado_usuario;
    }

    public function setCreadoUsuario(string $creado_usuario): static
    {
        $this->creado_usuario = $creado_usuario;

        return $this;
    }

    public function getCategoria(): ?int
    {
        return $this->categoria;
    }

    public function setCategoria(int $categoria): static
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getRespuestas(): ?Respuestas
    {
        return $this->respuestas;
    }

    public function setRespuestas(Respuestas $respuestas): static
    {
        // set the owning side of the relation if necessary
        if ($respuestas->getRespuesta() !== $this) {
            $respuestas->setRespuesta($this);
        }

        $this->respuestas = $respuestas;

        return $this;
    }
}
