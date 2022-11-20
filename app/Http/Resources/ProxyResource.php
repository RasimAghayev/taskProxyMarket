<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProxyResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'proxyIP'=>$this->ip,
            'proxyPort'=>$this->port,
            'proxyLogin'=>$this->login,
            'proxyPassword'=>$this->password,
            'categoryCreatedAt' => $this->created_at->format('d.m.Y H:i:s'),
            'categoryUpdatedAt' => $this->updated_at->format('d.m.Y H:i:s'),
        ];
    }
}
