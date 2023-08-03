<?php declare(strict_types = 1);

namespace App\Model\Database;

use Nettrine\Extra\Query\AbstractQuery;

class QueryCommand
{

	public function __construct(
		public AbstractQuery $query,
		public QueryFetchMode $fetchMode = QueryFetchMode::ALL
	)
	{
	}

	public static function fetchAll(AbstractQuery $query): self
	{
		return new self($query, QueryFetchMode::ALL);
	}

}
