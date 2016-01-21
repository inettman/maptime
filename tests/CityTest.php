<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->call('GET', '/city/30907');

        $this->assertEquals(200, $response->status());
        
    }
}
