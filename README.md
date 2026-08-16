# DDD Skeleton

Domain-driven design example project built with Nette, Nettrine, and Contributte Messenger.

## Requirements

- PHP 8.4 or newer
- [Composer](https://getcomposer.org/)
- `make` for the provided development commands
- Docker Compose for the PostgreSQL stack

## Quick start with Docker Compose

The tracked Compose stack is the complete recommended development path: it provides the PostgreSQL service expected by the default configuration.

```bash
composer create-project contributte/ddd-skeleton acme
cd acme
make init
make docker-up
```

In another terminal, run the migrations after PostgreSQL is available:

```bash
docker compose exec app make migrate
```

Open <http://localhost:8080>, submit the user form, and the application reports `User created, thanks` when the synchronous command succeeds.

`make init` creates `config/local.neon` from `config/local.neon.example`. The Compose application is available at `http://localhost:8080`, PostgreSQL at `localhost:5432`, and Adminer at `http://localhost:8081`. PostgreSQL uses database `contributte`, user `postgres`, and password `contributte`.

## Native PHP server

For a native server, first configure a local PostgreSQL service in `config/local.neon`; the checked-in default uses the Compose hostname `database`. Then install and prepare the project, run migrations, and start the server:

```bash
make project
make migrate
make dev
```

The development server listens on <http://localhost:8000>.

## Database and messages

Run pending migrations with:

```bash
make migrate
```

`make build` drops the current schema and then runs migrations.

The default Messenger routes use the synchronous `sync://` transport, so creating a user is handled during the request and does not require a consumer. `make consume` is an optional advanced Redis consumer (`bin/console messenger:consume redis`): configure a Redis transport before using it. Redis is not part of `docker-compose.yml`.

## Development

```bash
make qa       # coding standard and static analysis
make tests    # Nette Tester suite
make cs       # coding standard check
make csf      # fix coding standard issues
make phpstan  # static analysis
make coverage # generate coverage.xml
```
