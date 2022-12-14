<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $response = $this->json('POST', 'api/register', [
            'name'  =>  $name = 'Test',
            'email'  =>  $email = time().'test@example.com',
            'password'  =>  $password = '123456789',
            'c_password'  =>  $password = '123456789',
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);
//        dd($response);
        $response->assertStatus(201);

        $this->assertArrayHasKey('data',$response->json());
        User::where('email',$email)->delete();
    }

    public function testLogin()
    {
        $email = time().'@example.com';
        $password = '123456789';
        User::create([
            'name' => 'Test',
            'email'=> $email,
            'password' => bcrypt($password),
            'c_password' => bcrypt($password)
        ]);
        $response = $this->json('POST','api/login',[
            'email' => $email,
            'password' => $password
        ]);

        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);
//        dd([$email,$password,$response]);
        $response->assertStatus(200);

        User::where('email',$email)->delete();
    }
}
