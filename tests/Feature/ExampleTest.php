<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        \Storage::fake('local');
        // Weird trick I'm doing to make the test pass with Storage::url() after Storage::fake()
        // \Storage::getDriver()->getConfig()->set(
        //     'url',
        //     \Storage::getDriver()->getAdapter()->getPathPrefix()
        // );

        $response = $this->get('/');

        // Fail because of FileNotFound (URL is not set in the fake storage).
        $response->assertStatus(200);
    }
}
