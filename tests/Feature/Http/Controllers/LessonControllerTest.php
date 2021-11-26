<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class LessonControllerTest extends TestCase
{
    public function testShow()
    {
        $response = $this->get('/lessons/1');

        $response->assertStatus(Response::HTTP_OK);
        $response->assertSee('楽しいヨガレッスン');
        $response->assertSee('×');
    }
}
