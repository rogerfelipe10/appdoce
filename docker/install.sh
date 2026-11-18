#!/usr/bin/env bash
set -e
cd "$(dirname "$0")/.."

[ -f .env ] || cp .env.example .env
docker compose build
docker compose run --rm app composer install
docker compose run --rm app php artisan key:generate
touch database/database.sqlite
docker compose run --rm app php artisan migrate:fresh --seed --force
echo "Instalado. Rode ./docker/start.sh"
