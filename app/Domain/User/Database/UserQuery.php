<?php declare(strict_types = 1);

namespace App\Domain\User\Database;

use Doctrine\ORM\QueryBuilder;
use Nettrine\Extra\Query\AbstractQuery;

/**
 * @extends AbstractQuery<array<User>>
 */
class UserQuery extends AbstractQuery
{

	public static function ofEmail(string $email): self
	{
		$self = new self();
		$self->ons[] = function (QueryBuilder $qb) use ($email): QueryBuilder {
			$qb->andWhere('u.email = :email')
				->setParameter('email', $email);

			return $qb;
		};

		return $self;
	}

	public function setup(): void
	{
		$this->ons[] = function (QueryBuilder $qb): QueryBuilder {
			$qb->select('u')
				->from(User::class, 'u');

			return $qb;
		};
	}

}
