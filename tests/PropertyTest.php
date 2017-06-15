<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PropertyTest extends TestCase
{
    protected $baseUrl = 'http://localhost/api/properties';

    public function testIndex()
    {
        $this->json('GET', $this->baseUrl)
            ->seeStatusCode(200)
            ->isJson();
    }

    public function testCreate()
    {
        $params = ['id'=>'TCO', 'name' => 'Temuco'];
        $this->json('POST', $this->baseUrl, $params)
            ->seeStatusCode(201);
        $this->json('GET', $this->baseUrl.'/'.$params['id'])
            ->seeStatusCode(200)
            ->seeJson([
                'name' => 'Temuco',
            ]);
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
        $params = ['name' => 'Temuco2'];
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
        $id = 'TCO';
        $this->json('DELETE', $this->baseUrl.'/'.$id)
            ->seeStatusCode(204);
        $this->json('GET', $this->baseUrl.'/'.$id)
            ->seeStatusCode(404);
    }
}
