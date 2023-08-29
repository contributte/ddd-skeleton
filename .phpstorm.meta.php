<?php

namespace PHPSTORM_META {
	override(\Nettrine\Extra\EntityManager::getRepository(0), map([
		'\App\Domain\User\User' => \App\Domain\User\Database\UserRepository::class,
	]));
}
