<?php declare(strict_types = 1);

namespace App;

use Contributte\Bootstrap\ExtraConfigurator;
use Contributte\Nella\Boot\Bootloader;
use Contributte\Nella\Boot\Preset\NellaPreset;
use Nette\Application\Application as WebApplication;
use Symfony\Component\Console\Application as ConsoleApplication;

final class Bootstrap
{

	public static function boot(): ExtraConfigurator
	{
		return Bootloader::create()
			->use(NellaPreset::create(__DIR__))
			->boot();
	}

	public static function runWeb(): void
	{
		self::boot()
			->createContainer()
			->getByType(WebApplication::class)
			->run();
	}

	public static function runCli(): void
	{
		self::boot()
			->createContainer()
			->getByType(ConsoleApplication::class)
			->run();
	}

}
