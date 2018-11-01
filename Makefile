.PHONY: up down clean

.env:
	@cp .env.example .env

up: .env
	docker-compose up --build --force-recreate -d

down:
	docker-compose down


clean:
	docker-compose system prune

deploy/prod:
	#git pull origin master
	docker-compose -f docker-compose.yml -f docker-compose.prod.yml up -d --force-recreate --build
