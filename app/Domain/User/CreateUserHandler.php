<?php declare(strict_types = 1);

namespace App\Domain\User;

use App\Domain\User\Database\User;
use Nette\Security\Passwords;
use Nettrine\Extra\EntityManager;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateUserHandler
{

	public function __construct(
		private EntityManager $em,
		private Passwords $passwords,
	)
	{
	}

	public function __invoke(CreateUserCommand $command): User
	{
		$user = new User(
			$command->username,
			$this->passwords->hash(strval($command->password ?? md5(microtime()))),
			$command->role,
		);

		$this->em->persist($user);
		$this->em->flush();

		return $user;
	}

}
