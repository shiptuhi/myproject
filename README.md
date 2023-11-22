## How to Install and Run the Project

1. RUN ```docker-compose up --build```
2. Open phpmyadmin on ```http://localhost:8081/```
3. RUN ```docker-compose exec php php artisan migrate```
4. RUN ```php artisan db:seed --class=UserSeeder``` 
    && ```php artisan db:seed --class=PermissionsSeeder```
    && ```php artisan db:seed --class=CustomerSeeder```
    && ```php artisan db:seed --class=CustomerSeeder ```
    && ```php artisan db:seed --class=ProjectSeeder```
    && ```php artisan db:seed --class=ModuleSeeder```
    && ```php artisan db:seed --class=WorkItemSeeder```
    && ```php artisan db:seed --class=WorkDoSeeder```

5. You can see the project on ```127.0.0.1:8080/login ``` and the admin login: username: khanh.nguyen & password: 123456
