nginx:
	docker exec -it pizza-city_nginx bash
php:
	docker exec -it pizza-city_php bash
mysql:
	docker exec -it pizza-city_mysql bash
phpmyadmin:
	docker exec -it pizza-city_myadmin bash
node:
	docker exec -it pizza-city_node bash
tinker:
	docker exec -it pizza-city_php php artisan tinker
