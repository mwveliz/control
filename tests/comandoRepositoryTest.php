<?php

use App\Models\comando;
use App\Repositories\comandoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class comandoRepositoryTest extends TestCase
{
    use MakecomandoTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var comandoRepository
     */
    protected $comandoRepo;

    public function setUp()
    {
        parent::setUp();
        $this->comandoRepo = App::make(comandoRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatecomando()
    {
        $comando = $this->fakecomandoData();
        $createdcomando = $this->comandoRepo->create($comando);
        $createdcomando = $createdcomando->toArray();
        $this->assertArrayHasKey('id', $createdcomando);
        $this->assertNotNull($createdcomando['id'], 'Created comando must have id specified');
        $this->assertNotNull(comando::find($createdcomando['id']), 'comando with given id must be in DB');
        $this->assertModelData($comando, $createdcomando);
    }

    /**
     * @test read
     */
    public function testReadcomando()
    {
        $comando = $this->makecomando();
        $dbcomando = $this->comandoRepo->find($comando->id);
        $dbcomando = $dbcomando->toArray();
        $this->assertModelData($comando->toArray(), $dbcomando);
    }

    /**
     * @test update
     */
    public function testUpdatecomando()
    {
        $comando = $this->makecomando();
        $fakecomando = $this->fakecomandoData();
        $updatedcomando = $this->comandoRepo->update($fakecomando, $comando->id);
        $this->assertModelData($fakecomando, $updatedcomando->toArray());
        $dbcomando = $this->comandoRepo->find($comando->id);
        $this->assertModelData($fakecomando, $dbcomando->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecomando()
    {
        $comando = $this->makecomando();
        $resp = $this->comandoRepo->delete($comando->id);
        $this->assertTrue($resp);
        $this->assertNull(comando::find($comando->id), 'comando should not exist in DB');
    }
}
