# JWT package

tymon/jwt-auth

```shell
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
php artisan make:middleware JwtMiddleware
```
## Router

### Register API

URL: api/register

Method: POST
```json
{
    "name":"Rasim Aghyev",
    "email":"rasim@gmail.com",
    "password":"12345678",
    "c_password":"12345678"
}
```

### Login API
URL: api/login

Method: GET
```json
{
    "email":"rasim@gmail.com",
    "password":"12345678"
}
```

