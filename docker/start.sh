#!/bin/sh
# Arranque de la demo: prepara .env, crea la base de datos SQLite
# desde cero (migraciones + seeders) y lanza Apache.
set -e
cd /var/www/html

# Render indica el puerto en $PORT; Apache escucha en él
PORT="${PORT:-10000}"
sed -ri "s/Listen [0-9]+/Listen ${PORT}/" /etc/apache2/ports.conf
sed -ri "s/<VirtualHost \*:[0-9]+>/<VirtualHost *:${PORT}>/" /etc/apache2/sites-available/000-default.conf

# .env mínimo: el resto de valores llegan como variables de entorno
[ -f .env ] || touch .env

# Si no se ha configurado APP_KEY, se genera una al arrancar
if [ -z "$APP_KEY" ]; then
    export APP_KEY="base64:$(head -c 32 /dev/urandom | base64)"
fi

# Base de datos nueva en cada arranque: la demo siempre está limpia
DB_FILE="${DB_DATABASE:-/var/www/html/database/demo.sqlite}"
rm -f "$DB_FILE"
touch "$DB_FILE"
php artisan migrate:fresh --seed --force

chown -R www-data:www-data storage bootstrap/cache database

exec apache2-foreground
