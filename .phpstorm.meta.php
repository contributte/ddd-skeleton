<?php

namespace PHPSTORM_META {
	override(\src\EntityManager::getRepository(0), map([
		'\App\Domain\User\User' => App\Domain\User\UserRepository::class,
	]));
}
