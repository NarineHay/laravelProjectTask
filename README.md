### Commands for docker
1. docker-compose up --build

###  other terminal
2. docker exec -it laravel_project_app bash


### Commands for start laravel project
1. copy .env.example and rename to .env
2. php artisan migrate --seed
3. php artisan l5-swagger:generate



### --------------------------------------------------------------------
- The documentation swagger file can be found at this link /api/documentation
- example. localhost:8877/api/documentation if opend via docker
- example. localhost:8000/api/documentation if oppend vithout docker

- Authorization token get from users table from api_token field.
