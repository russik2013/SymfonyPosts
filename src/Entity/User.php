<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\MetaTags", mappedBy="user_id", cascade={"persist", "remove"})
     */
    private $meta_id;

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

    public function getMetaId(): ?MetaTags
    {
        return $this->meta_id;
    }

    public function setMetaId(MetaTags $meta_id): self
    {
        $this->meta_id = $meta_id;

        // set the owning side of the relation if necessary
        if ($this !== $meta_id->getUserId()) {
            $meta_id->setUserId($this);
        }

        return $this;
    }
}
