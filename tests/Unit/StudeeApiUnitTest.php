<?php

namespace Tests\Unit;

use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class StudeeApiUnitTest extends TestCase
{
    protected $uriBase = 'http://studee-api.test/api/';

    public function testListAllSegments()
    {
        $response = $this->get($this->uriBase . 'segment/');
        $response->assertStatus(200);
    }

    public function testFindSingleSegment()
    {
        $needle = 11000000;
        $response = $this->get($this->uriBase . 'segment/' . $needle);
        $response->assertStatus(200);
    }

    public function testListAllFamilies()
    {
        $response = $this->get($this->uriBase . 'family/');
        $response->assertStatus(200);
    }

    public function testFindSingleFamily()
    {
        $needle = 10250000;
        $response = $this->get($this->uriBase . 'family/' . $needle);
        $response->assertStatus(200);
    }

    public function testListAllClasses()
    {
        $response = $this->get($this->uriBase . 'class/');
        $response->assertStatus(200);
    }

    public function testFindSingleClass()
    {
        $needle = 10131600;
        $response = $this->get($this->uriBase . 'class/' . $needle);
        $response->assertStatus(200);
    }

    public function testListAllCommodities()
    {
        $response = $this->get($this->uriBase . 'commodity/');
        $response->assertStatus(200);
    }

    public function testFindSingleCommodity()
    {
        $needle = 10161821;
        $response = $this->get($this->uriBase . 'commodity/' . $needle);
        $response->assertStatus(200);
    }
}
