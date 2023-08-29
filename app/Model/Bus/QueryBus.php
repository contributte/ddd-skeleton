<?php declare(strict_types = 1);

namespace App\Model\Bus;

use App\Model\Database\QueryCommand;
use Contributte\Messenger\Bus\QueryBus as ContributteQueryBus;

class QueryBus extends ContributteQueryBus
{

	/**
	 * @template T
	 * @param QueryCommand<T> $query
	 * @return T
	 */
	public function typedQuery(QueryCommand $query): mixed
	{
		return $this->query($query);
	}

}
