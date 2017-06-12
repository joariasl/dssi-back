<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PropertyTest extends TestCase
{
    protected $baseUrl = 'http://localhost/api/property';

    public function testIndex()
    {
        $this->json('GET', $this->baseUrl)
            ->seeStatusCode(200)
            ->isJson();
    }

    public function testCreate()
    {
        Session::start();
        $params = ['id'=>'TCO', 'name' => 'Temuco', '_token' => csrf_token()];
        $this->json('POST', $this->baseUrl, $params)
            ->seeStatusCode(201);
    }

    public function testShow()
    {
        $id = 'TCO';
        $this->json('GET', $this->baseUrl.'/'.$id)
            ->seeStatusCode(200)
            ->seeJson([
                'name' => 'Temuco',
            ]);
    }

    public function testUpdate()
    {
        Session::start();
        $params = ['name' => 'Temuco2', '_token' => csrf_token()];
        $id = 'TCO';
        $this->json('PUT', $this->baseUrl.'/'.$id, $params)
            ->seeStatusCode(200);
        $this->json('GET', $this->baseUrl.'/'.$id)
            ->seeStatusCode(200)
            ->seeJson([
                'name' => 'Temuco2',
            ]);
    }

    public function testDestroy()
    {
        Session::start();
        $params = ['_token' => csrf_token()];
        $id = 'TCO';
        $this->json('DELETE', $this->baseUrl.'/'.$id, $params)
            ->seeStatusCode(200);
        $this->json('GET', $this->baseUrl.'/'.$id)
            ->seeStatusCode(404);
    }
}
