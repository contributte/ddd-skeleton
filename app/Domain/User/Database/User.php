<?php declare(strict_types = 1);

namespace App\Domain\User\Database;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Nettrine\Extra\Entity\AbstractEntity;
use Nettrine\Extra\Entity\TGeneratedId;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User extends AbstractEntity
{

	use TGeneratedId;

	#[ORM\Column(type: 'string', length: 255, nullable: false, unique: true)]
	private string $username;

	#[ORM\Column(type: 'string', length: 255, nullable: false)]
	private string $password;

	#[ORM\Column(type: 'integer', length: 255, nullable: false)]
	private int $role;

	#[ORM\Column(type: 'datetime', nullable: true)]
	private ?DateTime $lastLoggedAt = null;

	public function __construct(string $username, string $password, int $role)
	{
		$this->username = $username;
		$this->password = $password;
		$this->role = $role;
	}

	public function getUsername(): string
	{
		return $this->username;
	}

	public function setUsername(string $username): void
	{
		$this->username = $username;
	}

	public function getPassword(): string
	{
		return $this->password;
	}

	public function setPassword(string $password): void
	{
		$this->password = $password;
	}

	public function getRole(): int
	{
		return $this->role;
	}

	public function setRole(int $role): void
	{
		$this->role = $role;
	}

	public function getLastLoggedAt(): ?DateTime
	{
		return $this->lastLoggedAt;
	}

	public function changeLoggedAt(): void
	{
		$this->lastLoggedAt = new DateTime();
	}

}
