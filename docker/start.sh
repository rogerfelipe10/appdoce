#!/usr/bin/env bash
set -e
cd "$(dirname "$0")/.."

docker compose up -d
echo "Doce Gestão em http://localhost:8000"
