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

## getUser API

CodePath: \App\Http\Controllers\API\ApiUserController::getUser

URL: api/v1/getUser

Method: GET
```json
{
    "data": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
}
```

## Response

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

## Logout API

CodePath: \App\Http\Controllers\API\ApiUserController::logout

URL: api/v1/logout

Method: GET
```json
{
    "data": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
}
```

## Response

```json
{
    "data": [],
    "message": "User has been logged out."
}
```



# Proxy controller

## Create Proxy API

CodePath: \App\Http\Controllers\API\ProxyController::store

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

## Response

```json
{
    "data": {
        "id": 1013,
        "proxyIP": "205.3.70.72",
        "proxyPort": 47893,
        "proxyLogin": "ole03",
        "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<",
        "categoryCreatedAt": "20.11.2022 21:12:36",
        "categoryUpdatedAt": "20.11.2022 21:12:36"
    }
}
```



## Show data Proxy API

### All

CodePath: \App\Http\Controllers\API\ProxyController::index

URL: api/v1/proxies

Method: GET
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
}
```

## Response

```json
{
    "data": [
        {
            "id": 1013,
            "proxyIP": "205.3.70.72",
            "proxyPort": 47893,
            "proxyLogin": "ole03",
            "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<",
            "categoryCreatedAt": "20.11.2022 21:12:36",
            "categoryUpdatedAt": "20.11.2022 21:12:36"
        },
        {
            "id": 1012,
            "proxyIP": "205.3.70.72",
            "proxyPort": 47893,
            "proxyLogin": "ole03",
            "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<",
            "categoryCreatedAt": "20.11.2022 20:28:44",
            "categoryUpdatedAt": "20.11.2022 20:28:44"
        },
        {
            "id": 1011,
            "proxyIP": "205.3.70.72",
            "proxyPort": 47893,
            "proxyLogin": "ole03",
            "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<",
            "categoryCreatedAt": "20.11.2022 19:32:30",
            "categoryUpdatedAt": "20.11.2022 19:32:30"
        },
        {
            "id": 1010,
            "proxyIP": "205.3.70.72",
            "proxyPort": 47893,
            "proxyLogin": "ole03",
            "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<",
            "categoryCreatedAt": "20.11.2022 19:31:43",
            "categoryUpdatedAt": "20.11.2022 19:31:43"
        },
        {
            "id": 1009,
            "proxyIP": "205.3.70.72",
            "proxyPort": 47893,
            "proxyLogin": "ole03",
            "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<",
            "categoryCreatedAt": "20.11.2022 19:30:32",
            "categoryUpdatedAt": "20.11.2022 19:30:32"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=1",
        "last": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=203",
        "prev": null,
        "next": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 203,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=1",
                "label": "1",
                "active": true
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=2",
                "label": "2",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=3",
                "label": "3",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=4",
                "label": "4",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=5",
                "label": "5",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=6",
                "label": "6",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=7",
                "label": "7",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=8",
                "label": "8",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=9",
                "label": "9",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=10",
                "label": "10",
                "active": false
            },
            {
                "url": null,
                "label": "...",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=202",
                "label": "202",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=203",
                "label": "203",
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/v1/proxies?paginate=5&page=2",
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/v1/proxies",
        "per_page": 5,
        "to": 5,
        "total": 1013
    }
}
```

## Filter data

CodePath: \App\Filters\API\ProxyFilters & \App\Http\Controllers\API\ProxyController::index

Method: GET
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
    "proxyIP": "205.3.70.72",
    "proxyPort": 47893,
    "proxyLogin": "ole03",
    "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<",
    "paginate": 5
}
```

Note: paginate =[5,10,15,25,50,'All']

## List data

CodePath: \App\Filters\API\ProxyFilters & \App\Http\Controllers\API\ProxyController::list

Method: GET
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
    "proxyIP": "205.3.70.72",
    "proxyPort": 47893,
    "proxyLogin": "ole03",
    "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<",
    "paginate": 5
}
```

## export data

CodePath: \App\Filters\API\ProxyFilters & \App\Http\Controllers\API\ProxyController::export

Method: GET
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjY4OTc2MDIxLCJleHAiOjE2Njg5Nzk2MjEsIm5iZiI6MTY2ODk3NjAyMSwianRpIjoiek5EdXdPdkxIdVgzVUluTiIsInN1YiI6IjE3NSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IvtMGEBbNpLYen2cQTFvvs5yNEH5cI9grHQXyFmiIio",
    "proxyIP": "205.3.70.72",
    "proxyPort": 47893,
    "proxyLogin": "ole03",
    "proxyPassword": "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<",
    "paginate": 5,
    "format": 'ip:port'
}
```

Note: format =['ip','ip:port','ip@login:password','ip:port@login:password']
