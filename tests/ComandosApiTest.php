<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComandosApiTest extends TestCase
{
    use MakeComandosTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateComandos()
    {
        $comandos = $this->fakeComandosData();
        $this->json('POST', '/api/v1/comandos', $comandos);

        $this->assertApiResponse($comandos);
    }

    /**
     * @test
     */
    public function testReadComandos()
    {
        $comandos = $this->makeComandos();
        $this->json('GET', '/api/v1/comandos/'.$comandos->id);

        $this->assertApiResponse($comandos->toArray());
    }

    /**
     * @test
     */
    public function testUpdateComandos()
    {
        $comandos = $this->makeComandos();
        $editedComandos = $this->fakeComandosData();

        $this->json('PUT', '/api/v1/comandos/'.$comandos->id, $editedComandos);

        $this->assertApiResponse($editedComandos);
    }

    /**
     * @test
     */
    public function testDeleteComandos()
    {
        $comandos = $this->makeComandos();
        $this->json('DELETE', '/api/v1/comandos/'.$comandos->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/comandos/'.$comandos->id);

        $this->assertResponseStatus(404);
    }
}
