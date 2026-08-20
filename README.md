# Contributte DDD Skeleton

A PHP 8.4+ starter project for experimenting with domain-driven design using Nette, Doctrine/Nettrine, and Contributte libraries.

<p align="center">
  <a href="https://github.com/contributte/ddd-skeleton/actions"><img src="https://badgen.net/github/checks/contributte/ddd-skeleton/master" alt="GitHub checks"></a>
  <a href="https://coveralls.io/r/contributte/ddd-skeleton"><img src="https://badgen.net/coveralls/c/github/contributte/ddd-skeleton" alt="Coverage"></a>
  <a href="https://packagist.org/packages/contributte/ddd-skeleton"><img src="https://badgen.net/packagist/v/contributte/ddd-skeleton" alt="Packagist version"></a>
  <a href="https://github.com/contributte/ddd-skeleton"><img src="https://badgen.net/github/license/contributte/ddd-skeleton" alt="MIT license"></a>
</p>

<p align="center">
  <img src="https://api.microlink.io?url=https%3A%2F%2Fexamples.contributte.org%2Fddd-skeleton%2F&overlay.browser=light&screenshot=true&meta=false&embed=screenshot.url" alt="DDD Skeleton screenshot">
</p>

## Quick Start

**Requirements:** PHP 8.4+, [Composer](https://getcomposer.org/), Docker Compose, and a free local port `8080`.

Create the project. This installs its Composer dependencies; do not run `composer install` afterward.

```bash
composer create-project -s dev contributte/ddd-skeleton acme
cd acme
```

Create the ignored local configuration file and writable Nette directories:

```bash
make init
make setup
```

Start the application and PostgreSQL 15. Keep this process running:

```bash
make docker-up
```

In another terminal, apply the tracked migration from inside the `app` container. The default configuration connects to the Compose service hostname `database` and database `contributte`.

```bash
docker compose exec app env NETTE_DEBUG=1 php bin/console migrations:migrate --no-interaction
```

Open <http://localhost:8080>. The repository-backed, unexecuted first-success flow is to submit the **Create user** form, then see the new username in **List users**.

## Security Note

This is a development skeleton. User passwords are hashed before persistence, but the demonstration page renders the stored password hash in its user table. Do not enter real passwords or expose this application publicly without changing that behavior. The Compose PostgreSQL password (`contributte`) is a tracked development value, not a production credential.

## Quality Checks

Run the test suite with:

```bash
make tests
```

## Project

- Organization and source: [Contributte / ddd-skeleton](https://github.com/contributte/ddd-skeleton)
- Website: [contributte.org](https://contributte.org)
- Support: [Gitter](https://bit.ly/ctteg) and [forum](https://bit.ly/cttfo)
- Contributions: [Contributte contribution guide](https://contributte.org/contributing.html)

## License

MIT. See [LICENSE](LICENSE).
