<?php

namespace App\Entity;

use App\Repository\AttributeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttributeRepository::class)]
class Attribute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'text')]
    private $type;

    #[ORM\ManyToOne(targetEntity: Products::class, inversedBy: 'attributes')]
    private $Products;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getProducts(): ?Products
    {
        return $this->Products;
    }

    public function setProducts(?Products $Products): self
    {
        $this->Products = $Products;

        return $this;
    }
}
