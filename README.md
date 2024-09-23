# Pizza City
Интернет-магазин на основе фреймворка Laravel 11

## Установка через Docker

Перейдите в папку, в которой хотите поместить проект, и клонируйте репозиторий:

```sh
$ git clone https://github.com/olegeliseev/pizza-city.git
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

Переименовать файл .env.example в корневой папке в .env
После этого приложение будет доступно по адресу http://localhost:8080

Авторизоваться можно под тестовым пользователем (для доступа к административному разделу, а также страныц корзины и личного кабинета с заказами)
<br />
логин: admin@example.com
<br />
пароль: password

## Функциональность проекта

* Регистрация и авторизация пользователей, реализованные с помощью библиотеки Laravel Breeze
* Возможность создавать, редактировать и удалять элементы меню через панель административного раздела
* Добавление товаров в корзину и оформление заказа

## Скриншоты
![main](https://github.com/user-attachments/assets/5b137be0-01fa-44e0-8df9-c282d2bb2399)
<br />
![product_page](https://github.com/user-attachments/assets/9c20a521-733c-4b31-bbee-c0c73d413710)
<br />
![cart](https://github.com/user-attachments/assets/77342864-9a05-49dd-a86c-c3b3b035b650)
<br />
![orders](https://github.com/user-attachments/assets/e3e2b276-5b69-4b94-b887-a8df679d03d0)
<br />
![admin_page](https://github.com/user-attachments/assets/19081cf6-f1a8-4556-afa1-e3f92bebef21)
<br />
![create_page](https://github.com/user-attachments/assets/01455ce6-5448-444c-88a5-88cb3bf8412f)
