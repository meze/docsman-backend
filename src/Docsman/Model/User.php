<?php
declare(strict_types = 1);
namespace Docsman\Model;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface, \Serializable
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $email;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var array
     */
    private $roles;

    /**
     * User constructor.
     *
     * @param string $email
     * @param string $password
     */
    public function __construct(string $email, string $password)
    {
        $this->creationDate = new \DateTime('now', new \DateTimeZone('UTC'));
        $this->email = $email;
        $this->password = $password;
        $this->isActive = true;
        $this->roles = ['ROLE_USER'];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * String representation of object
     *
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize(): string
    {
        return serialize([
            $this->id,
            $this->email,
            $this->password,
        ]);
    }

    /**
     * Constructs the object
     *
     * @link http://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     *
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized): void
    {
        [
            $this->id,
            $this->email,
            $this->password,
        ] = unserialize($serialized, [
            'allowed_classes' => [
                User::class
            ]
        ]);
    }

    /**
     * Returns the roles granted to the user.
     *
     * @return array The user roles
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * @return string|null The salt
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername(): string
    {
        return $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials(): void
    {
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function IsActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }
}
