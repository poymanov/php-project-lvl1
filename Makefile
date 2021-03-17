brain-games:
	docker-compose run --rm php-cli php bin/brain-games

install:
	docker-compose run --rm php-cli composer install

validate:
	docker-compose run --rm php-cli composer validate
