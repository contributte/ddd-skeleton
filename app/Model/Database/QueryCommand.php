<?php declare(strict_types = 1);

namespace App\Model\Database;

use Nettrine\Extra\Query\Queryable;

/**
 * @template T
 */
class QueryCommand
{

	/**
	 * @param Queryable<T> $query
	 */
	public function __construct(
		public Queryable $query,
		public QueryFetchMode $fetchMode = QueryFetchMode::ALL
	)
	{
	}

	/**
	 * @template X
	 * @param Queryable<X> $query
	 * @return self<X>
	 */
	public static function fetchAll(Queryable $query): self
	{
		return new self($query, QueryFetchMode::ALL);
	}

}
