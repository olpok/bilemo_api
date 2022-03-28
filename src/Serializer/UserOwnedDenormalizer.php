<?php

namespace App\Serializer;

use App\Entity\UserOwnedInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;

class UserOwnedDenormalizer implements ContextAwareDenormalizerInterface, DenormalizerAwareInterface

{
    use DenormalizerAwareTrait;

    private const ALLREADY_CALLED_DENORMALIZER = 'UserOwnedDenormalizerCalled';

    private $security;

    public function __construct(Security $security)
    {
        // Avoid calling getUser() in the constructor: auth may not
        // be complete yet. Instead, store the entire Security object.
        $this->security = $security;
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        $reflectionClass = new \ReflectionClass($type);
        $allreadyCalled = $context[self::ALLREADY_CALLED_DENORMALIZER] ?? false;
        return $reflectionClass->implementsInterface(UserOwnedInterface::class) && $allreadyCalled === false;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = [])
    {
        $context[self::ALLREADY_CALLED_DENORMALIZER] = true;
        /**
         * @var UserOwnedInterface $obj
         */
        $obj = $this->denormalizer->denormalize($data, $type, $format, $context);
        $obj->setClient($this->security->getUser());

        return $obj;
    }
}
