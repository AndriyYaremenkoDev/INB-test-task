# INB-test-task
Laravel v10.48.12 (PHP v8.1.0) 

## API
### generate
```http
GET /api/v1/generate
```
#### response
```
{
    "data": {
        "id": int
    }
}
```
### retrieve
```http
POST /api/v1/retrieve/{id}
```
#### response
```
{
    "data": {
        "number": int
    }
}
```

## Встановлення за допомогою Docker

- Завантажте репозиторій ```git clone https://github.com/AndriyYaremenkoDev/INB-test-task```
- Перейдіть до каталогу проекту: ```cd INB-test-task```
- Встановіть необхідні PHP бібліотеки: ```composer install```
- Скопіюйте файл ```.env.docker```та перейменуйте його в ```.env```
- Запустіть додаток: ```docker-compose up -d```
- Відкрийте термінал контейнера: ```docker exec -it project_app bash```
- Виконайте міграцію таблиць у БД: ```php artisan migrate```
- Згенеруйте ключ додатку: ```php artisan key:generate```
