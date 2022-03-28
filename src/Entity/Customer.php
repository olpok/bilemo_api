<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\UserOwnedInterface;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Customer
 *
 * @ORM\Table(name="customer", indexes={@ORM\Index(name="IDX_81398E0919EB6921", columns={"client_id"})})
 * @ORM\Entity
 */
#[UniqueEntity(
    fields: ['email'],
    message: 'Cette adresse email existe déjà!'
)]
#[ApiResource(
    collectionOperations: [
        'post',
    ],
    normalizationContext: ['groups' => ['read:collection']],
    itemOperations: [
        'get' => [
            'normalization_context' => [
                'groups' => ['read:Customer:item'],
                'cache_headers' => ['expires' => '+1 month', 'public' => true],
            ],
        ],
        'delete',
    ],
)]
class Customer implements UserOwnedInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    #[Groups(['read:collection', 'read:Customer:item'])]
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank(message: 'Le prénom est obligatoire.')]
    #[Groups(['read:collection', 'read:Customer:item'])]
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank(message: 'Le nom est obligatoire.')]
    #[Groups('read:Customer:item')]
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank]
    #[Assert\Email(
        // message: '{{ value }} n\'est pas un email valide.',
    )]
    #[Groups('read:Customer:item')]
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=false)
     */
    #[Assert\NotBlank(message: 'Le numéro de téléphone est obligatoire.')]
    #[Groups('read:Customer:item')]
    private $phone;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="customers")
     */
    #[Groups('read:Customer:item')]
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /* public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }*/

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }
}
