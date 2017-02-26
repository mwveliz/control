<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class comandoApiTest extends TestCase
{
    use MakecomandoTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecomando()
    {
        $comando = $this->fakecomandoData();
        $this->json('POST', '/api/v1/comandos', $comando);

        $this->assertApiResponse($comando);
    }

    /**
     * @test
     */
    public function testReadcomando()
    {
        $comando = $this->makecomando();
        $this->json('GET', '/api/v1/comandos/'.$comando->id);

        $this->assertApiResponse($comando->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecomando()
    {
        $comando = $this->makecomando();
        $editedcomando = $this->fakecomandoData();

        $this->json('PUT', '/api/v1/comandos/'.$comando->id, $editedcomando);

        $this->assertApiResponse($editedcomando);
    }

    /**
     * @test
     */
    public function testDeletecomando()
    {
        $comando = $this->makecomando();
        $this->json('DELETE', '/api/v1/comandos/'.$comando->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/comandos/'.$comando->id);

        $this->assertResponseStatus(404);
    }
}
