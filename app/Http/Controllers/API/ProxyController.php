<?php

namespace App\Http\Controllers\API;

use App\Filters\API\ProxyFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\ProxyRequest;
use App\Http\Resources\ProxyCollection;
use App\Http\Resources\ProxyResource;
use App\Models\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use JWTAuth;
use Symfony\Component\HttpFoundation\Response;


class ProxyController extends Controller
{
    protected $user;

    public function __construct()
    {

        $this->user = JWTAuth::parseToken()->authenticate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return ProxyCollection
     */
    public function index(Request $request)
    {
        $filter= new ProxyFilters();
        $queryItems=$filter->transform($request);//[['column','operator','value']]
        $proxies=Proxy::where($queryItems);
        $proxies->orderBy('id', 'desc');
        $paginates=[5,10,15,25,50,'All'];
        $paginate = ucwords($request->paginate);
            if (in_array($paginate,$paginates)){
                $paginate=($paginate=='All')?$proxies->count():$paginate;
                $pagePaginate=$paginate;
            }elseif(!$paginate){
                $pagePaginate=15;
            }else{
                return $this->sendError([], 'Paginate criteria not found', Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        return new ProxyCollection($proxies->paginate($pagePaginate)->appends($request->query()));
    }

    public function list(Request $request)
    {
        $proxies=$this->index($request);
        $data=[];
        $csvFormat = strtolower($request->csvFormat);
        $formats=['ip','ip:port','ip@login:password','ip:port@login:password'];
        if(in_array($csvFormat,$formats)){
            $allProxies = collect($proxies)->map(callback: function ($proxy) use($csvFormat,$formats) {
                if($csvFormat){
                    if(Str::contains($csvFormat, 'ip')){
                        $newdata=$proxy->ip;
                        if(Str::contains($csvFormat, 'port')){
                            $newdata.=':'.$proxy->port;
                        }
                        if(Str::contains($csvFormat, 'login')){
                            $newdata.='@'.$proxy->login.':'.$proxy->password;
                        }
                    }
                    $data=[$newdata];
                }else{
                    $data=[
                        'proxyIP'         => $proxy->ip,
                        'proxyPort'       => $proxy->port,
                        'proxyLogin'      => $proxy->login,
                        'proxyPassword'   => $proxy->password,
                    ];
                }
                return $data;
            });
            return $allProxies->all();
        }else{
            return $this->sendError([], 'Export format criteria not found', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
    public function export(Request $request)
    {
        $productItemNumbers = $this->list($request);
        $local = Storage::disk('local');
        $storage = Storage::disk('local')->url('/');
        $exportFileName     = sprintf('proxies-%s.csv', strtotime("now"));
        $csvFile = tmpfile();
        $csvPath = stream_get_meta_data($csvFile)['uri'];
        $fd = fopen($csvPath, 'w');
        fputcsv($fd, ['Lists']);
        foreach ($productItemNumbers as $item) {
            fputcsv($fd, $item, ',', '"', "\\");
        }
        rewind($fd);
        fclose($fd);
        $symlink = 'public/docs/user_docs/'.$this->user->id.'/';
        return Storage::download($local->putFileAs('', $csvPath, $exportFileName));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\API\ProxyRequest  $request
     * @return ProxyResource
     */
    public function store(ProxyRequest $request)
    {
        return new ProxyResource(Proxy::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proxy  $proxy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proxy=Proxy::find($id);
        if($proxy) {
            return new ProxyResource($proxy);
        }else{
            return 'Proxy ID not found.';
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\API\ProxyRequest  $request
     * @param  \App\Models\Proxy  $proxy
     * @return \Illuminate\Http\Response
     */
    public function update(ProxyRequest $request, Proxy $proxy)
    {
        $proxy->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proxy  $proxy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proxy $proxy)
    {
        $proxy->delete();
    }
}
