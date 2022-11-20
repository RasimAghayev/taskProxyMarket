<?php

namespace App\Filters\API;

use App\Filters\ApiFilter;

class ProxyFilters extends ApiFilter
{
    protected $safeParms=[
        'proxyIP'=>['eq','lk','nlk'],
        'proxyPort'=>['eq','lt','lte','gt','gte','ne','lk','nlk'],
        'proxyLogin'=>['eq','ne'],
    ];
    protected $columnMap=[
        'proxyIP'=>'ip',
        'proxyPort'=>'port',
        'proxyLogin'=>'login',
    ];

}
