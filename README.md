# Docker permissão usuário local

docker exec -it -u $(id -u):$(id -g) laravel-banco-dados-php-fpm-1 bash