<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegionTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->call('GET', '/region/1');

        $this->assertEquals(200, $response->status());
        
    }
}
