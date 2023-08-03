![](https://heatbadger.now.sh/github/readme/contributte/ddd-skeleton/)

<p align=center>
  <a href="https://github.com/contributte/ddd-skeleton/actions"><img src="https://badgen.net/github/checks/contributte/ddd-skeleton/master"></a>
  <a href="https://coveralls.io/r/contributte/ddd-skeleton"><img src="https://badgen.net/coveralls/c/github/contributte/ddd-skeleton"></a>
  <a href="https://packagist.org/packages/contributte/ddd-skeleton"><img src="https://badgen.net/packagist/dm/contributte/ddd-skeleton"></a>
  <a href="https://packagist.org/packages/contributte/ddd-skeleton"><img src="https://badgen.net/packagist/v/contributte/ddd-skeleton"></a>
</p>
<p align=center>
  <a href="https://packagist.org/packages/contributte/ddd-skeleton"><img src="https://badgen.net/packagist/php/contributte/ddd-skeleton"></a>
  <a href="https://github.com/contributte/ddd-skeleton"><img src="https://badgen.net/github/license/contributte/ddd-skeleton"></a>
  <a href="https://bit.ly/ctteg"><img src="https://badgen.net/badge/support/gitter/cyan"></a>
  <a href="https://bit.ly/cttfo"><img src="https://badgen.net/badge/support/forum/yellow"></a>
  <a href="https://contributte.org/partners.html"><img src="https://badgen.net/badge/sponsor/donations/F96854"></a>
</p>

<p align=center>
Website 🚀 <a href="https://contributte.org">contributte.org</a> | Contact 👨🏻‍💻 <a href="https://f3l1x.io">f3l1x.io</a> | Twitter 🐦 <a href="https://twitter.com/contributte">@contributte</a>
</p>

-----

## Goal

Main goal is to try DDD with [Nette](https://nette.org).

## Installation

You will need `PHP 8.2+` and [Composer](https://getcomposer.org/).

Create project using composer.

```bash
composer create-project -s dev contributte/ddd-skeleton acme
```

Now you have application installed. It's time to run it.

## Startup

### HTTP

You need to spin webserver to display your application.

```bash
make dev
# php -S 0.0.0.0:8000 -t www
```

Then visit [http://localhost:8000](http://localhost:8000) in your browser.

### Database

You need to execute migrations.

```bash
make migrate
# NETTE_DEBUG=1 bin/console migrations:migrate --no-interaction
```

### Docker

You need to spin docker containers with redis and postgres to store & read messages according to your transports.

```bash
make docker-up
# docker compose up
```

## Development

See [how to contribute](https://contributte.org/contributing.html) to this package.

This package is currently maintaining by these authors.

<a href="https://github.com/f3l1x">
    <img width="80" height="80" src="https://avatars2.githubusercontent.com/u/538058?v=3&s=80">
</a>

-----

Consider to [support](https://contributte.org/partners.html) **contributte** development team. Also thank you for using this project.
