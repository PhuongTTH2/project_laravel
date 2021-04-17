<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\ChatApp;
use App\Models\User;


use DB;
class ChatTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/chatapp');

        $response->assertStatus(200);
    }

    public function test_chat_box()
    {
        $response = $this->get('/chatapp');

        $data_user = DB::select('select * from users where id = 2');
        $data_user_name = $data_user[0]->name;

        $data_test = User::find(2);
        $data_test_name =$data_test->name;
        $this->assertEquals($data_user_name, $data_test_name);
    }
}
