<?php

namespace App\Http\Requests\API;

use App\Http\Requests\ApiFormRequest;

class ProxyRequest extends ApiFormRequest
{

    private $data=[];
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method=$this->method();
        $rules = [
            'proxyIP' => 'required|ipv4',
            'proxyPort' => 'required|integer|between:0,65535',
            'proxyLogin' => 'required|string',
            'proxyPassword' => 'required|string',
        ];
        $id=['id' => 'required|integer|exists:proxies,id'];
        switch ($method) {
            case 'POST':
                $this->data= $rules;
                break;
            case 'PUT':
                $this->data= $id + $rules;
                break;
            case 'DELETE':
                $this->data= $id;
                break;
        }
        return $this->data;
    }
    protected function prepareForValidation()
    {
        $this->merge([
                'ip' => $this->proxyIP,
                'port' => $this->proxyPort,
                'login' => $this->proxyLogin,
                'password' => $this->proxyPassword,
            ]);
    }
}
