<?php declare(strict_types = 1);

namespace App\Model\Database;

use Nettrine\Extra\EntityManager;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class QueryHandler
{

	public function __construct(
		private EntityManager $em
	)
	{
	}

	public function __invoke(QueryCommand $command): mixed
	{
		$qb = $command->query->doQuery($this->em);

		if ($command->fetchMode === QueryFetchMode::ONE) {
			return $qb->getSingleResult();
		}

		return $qb->getResult();
	}

}
