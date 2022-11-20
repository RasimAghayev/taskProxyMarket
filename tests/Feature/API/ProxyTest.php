<?php

namespace Tests\Feature\API;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;

class ProxyTest extends TestCase
{
    /**
     * Authenticate user.
     *
     * @return void
     */
    protected function authenticate()
    {
        $user = User::create([
            'name' => 'test',
            'email' => rand(12345,678910).'test@gmail.com',
            'password' => bcrypt('secret9874')
        ]);
        $response = $this->json('POST','api/login',[
            'email' => $user->email,
            'password' => 'secret9874'
        ]);
//        if (!auth()->attempt(['email'=>$user->email, 'password'=>'secret9874'])) {
//            return response(['message' => 'Login credentials are invaild']);
//        }
        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);
//        if($response->assertStatus(200)){
//
//        }
//        if($response->assertStatus(400)){
//
//        }

        return json_decode($response->getContent(), false)->data;
    }

    /**
     * test create category.
     *
     * @return void
     */
    public function test_create_proxy()
    {
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('POST','api/v1/proxies',[
            'proxyIP' => '205.3.70.72',
            "proxyPort"=>47893,
            "proxyLogin"=> "ole03",
            "proxyPassword"=> "@}|,8/$8qX<2=Z~uCtPp@KEs\"$!?6`^;|^if<"
        ])->assertStatus(201);
        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);
        return $response->getContent();
//        $response->assertStatus(200);
    }

    /**
     * test find category.
     *
     * @return void
     */
    public function test_list_proxy()
    {
        $token = $this->authenticate();
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET','api/v1/proxies');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find category.
     *
     * @return void
     */
    public function test_find_proxy()
    {
        $token = $this->authenticate();
        $id = (array) json_decode($this->test_create_proxy());
        $id=(int) $id['data']->id;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET','api/v1/proxies/{$id}');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }

    /**
     * test find category.
     *
     * @return void
     */
    public function test_update_proxy()
    {
        $token = $this->authenticate();
        $id = (array) json_decode($this->test_create_proxy());
        $id=(int) $id['data']->id;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('PUT','api/v1/proxies/{$id}',[
            'name' => 'Test category 2',
            'description' => 'Test category 2',
            'parent_id' => 2,
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }
    /**
     * test delte category.
     *
     * @return void
     */
    public function test_delete_proxy()
    {
        $token = $this->authenticate();
        $id = (array) json_decode($this->test_create_proxy());
        $id=(int) $id['data']->id;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('DELETE','api/v1/proxies/{$id}');

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(200);
    }
}
