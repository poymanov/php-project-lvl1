brain-games:
	docker-compose run --rm php-cli php bin/brain-games

brain-even:
	docker-compose run --rm php-cli php bin/brain-even

install:
	docker-compose run --rm php-cli composer install

validate:
	docker-compose run --rm php-cli composer validate

lint:
	docker-compose run --rm php-cli composer run-script phpcs -- --standard=PSR12 src bin
