<?php declare(strict_types = 1);

namespace App\Domain\User;

class CreateUserCommand
{

	public function __construct(
		public string $username,
		public string $password,
		public int $role,
	)
	{
	}

}
