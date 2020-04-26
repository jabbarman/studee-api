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
        $needle = 10101500;
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

    public function testStoreSegment()
    {
        $data = [
            'segment' => 30000000,
            'segment_name' => 'Some Segment name',
        ];

        $header = [
            'Accept' => 'application/json',
        ];

        $response =  $this->post(route('segment.store'), $data, $header);
        $response->assertStatus(201);
    }

    public function testStoreFamily()
    {
        $data = [
            'family' => 30100000,
            'family_name' => 'Some Family name',
        ];

        $header = [
            'Accept' => 'application/json',
        ];

        $response =  $this->post(route('family.store'), $data, $header);
        $response->assertStatus(201);
    }

    public function testStoreClass()
    {
        $data = [
            'class' => 30101000,
            'class_name' => 'Some Class name',
        ];

        $header = [
            'Accept' => 'application/json',
        ];

        $response =  $this->post(route('class.store'), $data, $header);
        $response->assertStatus(201);
    }

    public function testStoreCommodity()
    {
        $data = [
            'commodity' => 30101001,
            'commodity_name' => 'Some Commodity name',
        ];

        $header = [
            'Accept' => 'application/json',
        ];

        $response =  $this->post(route('commodity.store'), $data, $header);
        $response->assertStatus(201);
    }
}
