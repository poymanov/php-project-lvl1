brain-games:
	docker-compose run --rm php-cli php bin/brain-games

install:
	docker-compose run --rm php-cli composer install

validate:
	docker-compose run --rm php-cli composer validate

lint2:
	docker-compose run --rm php-cli composer run-script phpcs -- --standard=PSR12 src bin

lint:
	composer run-script phpcs -- --standard=PSR12 src bin
