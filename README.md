# JWT package

tymon/jwt-auth

```shell
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
php artisan jwt:secret
php artisan make:middleware JwtMiddleware
```
## Router

### Register API

CodePath: \App\Http\Controllers\API\ApiUserController::authenticate

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

### Response

```json
{
    "data": {
        "name": "Rasim Aghyev",
        "email": "rasima@gmail.com",
        "updated_at": "2022-11-20T20:26:00.000000Z",
        "created_at": "2022-11-20T20:26:00.000000Z",
        "id": 1
    },
    "message": "User created successfully"
}
```

### Login API

CodePath: \App\Http\Controllers\API\ApiUserController::register

URL: api/login

Method: GET
```json
{
    "email":"rasim@gmail.com",
    "password":"12345678"
}
```

### Response

```json
{
    "data": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
    "message": "User has been logged in."
}
```
### getUser API

CodePath: \App\Http\Controllers\API\ApiUserController::getUser

URL: api/v1/getUser

Method: GET
```json
{
    "data": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
}
```

### Response

```json
{
    "data": {
        "id": 175,
        "name": "Rasim Aghyev",
        "email": "rasima@gmail.com",
        "email_verified_at": null,
        "created_at": "2022-11-20T20:26:00.000000Z",
        "updated_at": "2022-11-20T20:26:00.000000Z"
    },
    "message": "User has been data retrieved."
}
```

### Logout API

CodePath: \App\Http\Controllers\API\ApiUserController::logout

URL: api/v1/logout

Method: GET
```json
{
    "data": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
}
```

### Response

```json
{
    "data": [],
    "message": "User has been logged out."
}
```

# Proxy controller

### Create Proxy API

CodePath: \App\Http\Controllers\API\ApiUserController::register

URL: api/v1/proxies

Method: POST
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
    "proxyIP": "205.3.70.72",
    "proxyPort": 47893,
    "proxyLogin": "ole03",
    "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<"
}
```

