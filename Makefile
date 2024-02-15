# Laravel9環境のディレクトリから作成する用（"src/"に作成）
# "src/"が削除されるので注意！（初期環境構築したらコメントアウトすること）
.PHONY: init
init:
	@rm -rf ./db
	@rm -rf ./src
	@docker-compose build
	@docker-compose up -d
	@docker-compose exec laravel composer create-project --prefer-dist laravel/laravel . "9.*"
	@cp ./src/.env.example ./src/.env
	@docker-compose exec laravel composer install
	@docker-compose exec laravel php artisan key:generate
	@docker-compose exec laravel npm install
	@docker-compose down

.PHONY: up
up:
	@docker-compose up

.PHONY: down
down:
	@docker-compose down

.PHONY: laravel
laravel:
	@docker-compose exec laravel bash

.PHONY: db_fresh
db_fresh:
	@docker-compose exec laravel php artisan migrate:fresh --seed
