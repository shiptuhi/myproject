## How to Install and Run the Project

1. RUN ```docker-compose up --build```
2. Open phpmyadmin on ```http://localhost:8081/```
3. With username: root & password:
4. RUN ```docker-compose exec php php artisan migrate```
5. RUN ```php artisan db:seed --class=UserSeeder``` && ```php artisan db:seed --class=ProjectSeeder```
6. OR you can register user on ```127.0.0.1:8080/register```
7. You can see the project on ```127.0.0.1:8080/login or 127.0.0.1:8080/project/list```
