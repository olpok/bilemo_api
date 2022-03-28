<?php

namespace App\Entity;

interface UserOwnedInterface
{
    public function getClient(): ?User;
    public function setClient(?User $client): self;
}
