<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 255, unique: true)]
    private ?string $userioname = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $foto = null;

    #[ORM\Column(length: 50, unique: true)]
    private ?string $pais = null;

    #[ORM\Column]
    private ?int $puntuacion = null;

    #[ORM\Column]
    private ?DateTime $fecha_creacion = null;

    #[ORM\Column]
    private ?int $age = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserioname():?string
    {
        return $this->userioname;
    }

    public function setUserioname($userioname) :static
    {
        $this->userioname = $userioname;

        return $this;
    }

    public function getFoto():?string
    {
        return $this->foto;
    }

    public function setFoto($foto):static
    {
        $this->foto = $foto;

        return $this;
    }

    public function getPais():string
    {
        return $this->pais;
    }

    public function setPais($pais):static
    {
        $this->pais = $pais;

        return $this;
    }


    public function getPuntuacion():?int
    {
        return $this->puntuacion;
    }

    public function setPuntuacion($puntuacion):static
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    public function getFecha_creacion():DateTime
    {
        return $this->fecha_creacion;
    }


    public function setFecha_creacion($fecha_creacion):static
    {
        $this->fecha_creacion = $fecha_creacion;

        return $this;
    }


    public function getAge():?int
    {
        return $this->age;
    }

    public function setAge($age):static
    {
        $this->age = $age;

        return $this;
    }
}
