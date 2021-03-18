brain-games:
	docker-compose run --rm php-cli chmod +x bin/brain-games && bin/brain-games

brain-even:
	docker-compose run --rm php-cli chmod +x bin/brain-even && bin/brain-even

brain-calc:
	docker-compose run --rm php-cli chmod +x bin/brain-calc && bin/brain-calc

brain-gcd:
	docker-compose run --rm php-cli chmod +x bin/brain-gcd && bin/brain-gcd

brain-progression:
	docker-compose run --rm php-cli chmod +x bin/brain-progression && bin/brain-progression

brain-prime:
	docker-compose run --rm php-cli chmod +x bin/brain-prime && bin/brain-prime

install:
	docker-compose run --rm php-cli composer install

validate:
	docker-compose run --rm php-cli composer validate

lint:
	docker-compose run --rm php-cli composer run-script phpcs -- --standard=PSR12 src bin
