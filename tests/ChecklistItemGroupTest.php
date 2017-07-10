<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChecklistItemGroupTest extends TestCase
{
    protected $baseUrl = 'http://localhost/api/checklist-item-groups';

    public function testIndex()
    {
        $this->json('GET', $this->baseUrl)
            ->seeStatusCode(200)
            ->isJson();
    }

    public function testCreate()
    {
        $params = ['id'=>'100', 'name' => 'Grupo1', 'checklist_id' => '1'];
        $this->json('POST', $this->baseUrl, $params)
            ->seeStatusCode(201);
        $this->json('GET', $this->baseUrl.'/'.$params['id'])
            ->seeStatusCode(200)
            ->seeJson([
                'name' => 'Grupo1',
            ]);
    }

    public function testShow()
    {
        $id = '100';
        $this->json('GET', $this->baseUrl.'/'.$id)
            ->seeStatusCode(200)
            ->seeJson([
                'name' => 'Grupo1',
            ]);
    }

    public function testUpdate()
    {
        $params = ['name' => 'Grupo2', 'checklist_id' => '1'];
        $id = '100';
        $this->json('PUT', $this->baseUrl.'/'.$id, $params)
            ->seeStatusCode(200);
        $this->json('GET', $this->baseUrl.'/'.$id)
            ->seeStatusCode(200)
            ->seeJson([
                'name' => 'Grupo2',
            ]);
    }

    public function testDestroy()
    {
        $id = '100';
        $this->json('DELETE', $this->baseUrl.'/'.$id)
            ->seeStatusCode(204);
        $this->json('GET', $this->baseUrl.'/'.$id)
            ->seeStatusCode(404);
    }
}