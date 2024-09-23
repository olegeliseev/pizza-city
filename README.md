# Pizza City
Интернет-магазин на основе фреймворка Laravel 11

## Установка через Docker

Перейдите в папку, в которой хотите поместить проект, и клонируйте репозиторий:

```sh
$ git clone https://github.com/olegeliseev/students.git
```

Перейдите в корневую папку проекта и выполните команду:

```
docker compose up -d
```

Перейдите в контейнер приложения и выполните команду для установки зависимостей:
```
docker exec -it pizza-city_php bash

cd ../

composer install
```

После чего запустите миграции и сидеры:
```
php artisan migrate:fresh --seed
```

Перейдите в контейнер node и выполните команду для сборки фронтенда:
```
docker exec -it pizza-city_node bash

npm run build
```
