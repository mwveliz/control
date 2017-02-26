<?php

use App\Models\Comandos;
use App\Repositories\ComandosRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComandosRepositoryTest extends TestCase
{
    use MakeComandosTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ComandosRepository
     */
    protected $comandosRepo;

    public function setUp()
    {
        parent::setUp();
        $this->comandosRepo = App::make(ComandosRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateComandos()
    {
        $comandos = $this->fakeComandosData();
        $createdComandos = $this->comandosRepo->create($comandos);
        $createdComandos = $createdComandos->toArray();
        $this->assertArrayHasKey('id', $createdComandos);
        $this->assertNotNull($createdComandos['id'], 'Created Comandos must have id specified');
        $this->assertNotNull(Comandos::find($createdComandos['id']), 'Comandos with given id must be in DB');
        $this->assertModelData($comandos, $createdComandos);
    }

    /**
     * @test read
     */
    public function testReadComandos()
    {
        $comandos = $this->makeComandos();
        $dbComandos = $this->comandosRepo->find($comandos->id);
        $dbComandos = $dbComandos->toArray();
        $this->assertModelData($comandos->toArray(), $dbComandos);
    }

    /**
     * @test update
     */
    public function testUpdateComandos()
    {
        $comandos = $this->makeComandos();
        $fakeComandos = $this->fakeComandosData();
        $updatedComandos = $this->comandosRepo->update($fakeComandos, $comandos->id);
        $this->assertModelData($fakeComandos, $updatedComandos->toArray());
        $dbComandos = $this->comandosRepo->find($comandos->id);
        $this->assertModelData($fakeComandos, $dbComandos->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteComandos()
    {
        $comandos = $this->makeComandos();
        $resp = $this->comandosRepo->delete($comandos->id);
        $this->assertTrue($resp);
        $this->assertNull(Comandos::find($comandos->id), 'Comandos should not exist in DB');
    }
}
