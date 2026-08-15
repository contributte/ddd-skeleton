# DDD Skeleton

Domain-driven design example project built with Nette, Nettrine, and Contributte Messenger.

## Requirements

- PHP 8.4 or newer
- [Composer](https://getcomposer.org/)
- `make` for the provided development commands
- Docker Compose for the PostgreSQL stack

## Create a project

```bash
composer create-project contributte/ddd-skeleton acme
cd acme
make init
make project
make migrate
make dev
```

`make init` creates `config/local.neon` from `config/local.neon.example`. The development server listens on `http://localhost:8000`.

## Docker Compose

Start the application and PostgreSQL with:

```bash
make docker-up
```

The application is available at `http://localhost:8080`, PostgreSQL at `localhost:5432`, and Adminer at `http://localhost:8081`. PostgreSQL uses database `contributte`, user `postgres`, and password `contributte`.

The default database configuration in `config/config.neon` uses host `database`, which matches the Compose service. Update the database parameters for a non-Compose installation.

## Database and messages

Run pending migrations with:

```bash
make migrate
```

`make build` drops the current schema and then runs migrations. The default Messenger routes use the synchronous transport. `make consume` runs `bin/console messenger:consume redis`; configure a Redis transport before using this consumer. Redis is not part of `docker-compose.yml`.

## Development

```bash
make qa       # coding standard and static analysis
make tests    # Nette Tester suite
make cs       # coding standard check
make csf      # fix coding standard issues
make phpstan  # static analysis
make coverage # generate coverage.xml
```
