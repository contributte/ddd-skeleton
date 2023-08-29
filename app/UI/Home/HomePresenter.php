<?php declare(strict_types = 1);

namespace App\UI\Home;

use App\Domain\User\CreateUserCommand;
use App\Domain\User\Database\User;
use App\Domain\User\Database\UserQuery;
use App\Model\Bus\QueryBus;
use App\Model\Database\QueryCommand;
use App\UI\BasePresenter;
use Contributte\Messenger\Bus\CommandBus;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Nette\Application\UI\Form;
use Nette\DI\Attributes\Inject;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Tracy\Debugger;

class HomePresenter extends BasePresenter
{

	#[Inject]
	public CommandBus $commandBus;

	#[Inject]
	public QueryBus $queryBus;

	public function actionDefault(): void
	{
		/** @var array<User> $users */
		$users = $this->queryBus->typedQuery(
			QueryCommand::fetchAll(new UserQuery())
		);

		$this->template->users = $users;
	}

	protected function createComponentUserForm(): Form
	{
		$form = new Form();

		$form->addText('username', 'Username')
			->setRequired();

		$form->addPassword('password', 'Password')
			->setRequired();

		$form->addSelect('role', 'Role')
			->setItems([1 => 'Admin', 2 => 'User'])
			->setRequired()
			->setHtmlAttribute('class', 'block w-full');

		$form->addSubmit('send', 'Save')
			->setHtmlAttribute('class', 'bg-green-700 px-4 py-1 rounded text-white');

		$form->onSuccess[] = function (Form $form): void {
			try {
				$this->commandBus->handle(
					new CreateUserCommand(
						$form->values->username,
						$form->values->password,
						$form->values->role,
					)
				);

				$this->flashMessage('User created, thanks', 'sucess');
				$this->redirect('this');
			} catch (HandlerFailedException $e) {
				if ($e->getPrevious() instanceof UniqueConstraintViolationException) {
					$this->flashMessage('Username already registered', 'error');

					return;
				}

				Debugger::exceptionHandler($e);
				$this->flashMessage('Cannot create user', 'error');
			}
		};

		return $form;
	}

}
