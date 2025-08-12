.PHONY: build
build:
	-mkdir -p src/build
	-mkdir -p src/public/css
	-mkdir -p src/public/fonts
	-mkdir -p src/public/js
	-cp -n src/.env.example src/.env
	-chmod 0777 src/bootstrap/cache
	-chmod 0777 src/storage
	-chmod 0777 src/storage/app
	-chmod 0777 src/storage/app/public
	-chmod 0777 src/storage/framework
	-chmod 0777 src/storage/framework/cache
	-chmod 0777 src/storage/framework/cache/data
	-chmod 0777 src/storage/framework/sessions
	-chmod 0777 src/storage/framework/testing
	-chmod 0777 src/storage/framework/views
	-chmod 0777 src/storage/logs/
	-rm -f src/bootstrap/cache/packages.php
	-rm -f src/bootstrap/cache/services.php
	docker compose build

.PHONY: up
up:
	docker compose up -d --remove-orphans
	@sleep 10s
	docker compose exec php-cli composer selfupdate
	docker compose exec php-cli composer install
	@sleep 1s
	docker compose exec php-cli php artisan --version
	docker compose exec php-cli php artisan key:generate
	docker compose exec php-cli php artisan migrate --no-interaction
	docker compose exec php-cli php artisan db:seed --no-interaction

.PHONY: down
down:
	docker compose down --rmi all --volumes --remove-orphans

.PHONY: clean
clean:
	docker compose down --rmi all
	-rm -rf src/build
	-rm -rf src/public/css
	-rm -rf src/public/fonts
	-rm -rf src/public/js
	-rm -rf src/storage/framework/cache/data/*
	-rm -f src/storage/framework/sessions/*
	-rm -rf src/storage/framework/testing/disks
	-rm -f src/storage/framework/testing/*
	-rm -f src/storage/framework/views/*
	-rm -f src/storage/framework/logs/log.*
	-rm -f src/bootstrap/cache/packages.php
	-rm -f src/bootstrap/cache/services.php

.PHONY: test
test: phpunit

.PHONY: lint
lint: phpcs phpmd phpstan

.PHONY: schema
schema: tbls

.PHONY: ide
ide: laravel-ide-helper

.PHONY: phpunit
phpunit:
	@docker compose exec php-cli php artisan test --parallel --recreate-databases --drop-databases

.PHONY: phpstan
phpstan:
	@docker compose exec php-cli php vendor/bin/phpstan analyse --ansi

.PHONY: phpcs
phpcs:
	@docker compose exec php-cli php vendor/bin/phpcs --colors -s

.PHONY: phpmd
phpmd:
	@docker compose exec php-cli php -d "error_reporting=22527" vendor/bin//phpmd app,config,routes,database/factories,database/migrations,database/seeders,bootstrap/app.php,bootstrap/providers.php text phpmd.xml.dist && echo "PHPMD: App Successful"

.PHONY: php-fix-cs
php-fix-cs:
	@docker compose exec php-cli php vendor/bin/php-cs-fixer fix --ansi --allow-risky=yes

.PHONY: laravel-ide-helper
laravel-ide-helper:
	@docker compose exec php-cli php artisan ide-helper:generate --ansi
	@docker compose exec php-cli php artisan ide-helper:meta --ansi
	@docker compose exec php-cli php artisan ide-helper:models --write --ansi

.PHONY: tbls
tbls:
	-rm -rf src/build/schema
	-mkdir -p src/build/schema
	@docker run --rm -it \
		-u "$(shell id -u):$(shell id -g)" \
		--net="`docker network ls -q --filter name=l12dock_internal`" \
		-v "${PWD}/src:/src" -w "/src" \
		ghcr.io/k1low/tbls \
		doc --rm-dist
	-open src/build/schema/README.md

.PHONY: front-build
front-build:
	@docker run --rm -it \
		-u "$(shell id -u):$(shell id -g)" \
		-v "${PWD}/src:/src" -w "/src" \
		node:24-alpine3.21 \
		npm install
	@docker run --rm -it \
		-u "node:node" \
		-v "${PWD}/src:/src" -w "/src" \
		node:24-alpine3.21 \
		npm run build

.PHONY: front-audit
front-audit:
	@docker run --rm -it \
		-u "$(shell id -u):$(shell id -g)" \
		-v "${PWD}/src:/src" -w "/src" \
		node:24-alpine3.21 \
		npm audit

.PHONY: front-security-fix
front-security-fix:
	@docker run --rm -it \
		-u "$(shell id -u):$(shell id -g)" \
		-v "${PWD}/src:/src" -w "/src" \
		node:24-alpine3.21 \
		npm audit fix
