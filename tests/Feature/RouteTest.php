<?php

namespace W360\Support\Tests\Feature;

use W360\Support\Tests\TestCase;

class RouteTest extends TestCase
{

    /** @test */
    public function get_web_route_test()
    {
        $response = $this->get('/web');
        $response->assertStatus(200);
    }


}