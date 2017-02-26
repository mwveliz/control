<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TablasApiTest extends TestCase
{
    use MakeTablasTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTablas()
    {
        $tablas = $this->fakeTablasData();
        $this->json('POST', '/api/v1/tablas', $tablas);

        $this->assertApiResponse($tablas);
    }

    /**
     * @test
     */
    public function testReadTablas()
    {
        $tablas = $this->makeTablas();
        $this->json('GET', '/api/v1/tablas/'.$tablas->id);

        $this->assertApiResponse($tablas->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTablas()
    {
        $tablas = $this->makeTablas();
        $editedTablas = $this->fakeTablasData();

        $this->json('PUT', '/api/v1/tablas/'.$tablas->id, $editedTablas);

        $this->assertApiResponse($editedTablas);
    }

    /**
     * @test
     */
    public function testDeleteTablas()
    {
        $tablas = $this->makeTablas();
        $this->json('DELETE', '/api/v1/tablas/'.$tablas->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/tablas/'.$tablas->id);

        $this->assertResponseStatus(404);
    }
}
