<?php

use App\Models\Tablas;
use App\Repositories\TablasRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TablasRepositoryTest extends TestCase
{
    use MakeTablasTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TablasRepository
     */
    protected $tablasRepo;

    public function setUp()
    {
        parent::setUp();
        $this->tablasRepo = App::make(TablasRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTablas()
    {
        $tablas = $this->fakeTablasData();
        $createdTablas = $this->tablasRepo->create($tablas);
        $createdTablas = $createdTablas->toArray();
        $this->assertArrayHasKey('id', $createdTablas);
        $this->assertNotNull($createdTablas['id'], 'Created Tablas must have id specified');
        $this->assertNotNull(Tablas::find($createdTablas['id']), 'Tablas with given id must be in DB');
        $this->assertModelData($tablas, $createdTablas);
    }

    /**
     * @test read
     */
    public function testReadTablas()
    {
        $tablas = $this->makeTablas();
        $dbTablas = $this->tablasRepo->find($tablas->id);
        $dbTablas = $dbTablas->toArray();
        $this->assertModelData($tablas->toArray(), $dbTablas);
    }

    /**
     * @test update
     */
    public function testUpdateTablas()
    {
        $tablas = $this->makeTablas();
        $fakeTablas = $this->fakeTablasData();
        $updatedTablas = $this->tablasRepo->update($fakeTablas, $tablas->id);
        $this->assertModelData($fakeTablas, $updatedTablas->toArray());
        $dbTablas = $this->tablasRepo->find($tablas->id);
        $this->assertModelData($fakeTablas, $dbTablas->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTablas()
    {
        $tablas = $this->makeTablas();
        $resp = $this->tablasRepo->delete($tablas->id);
        $this->assertTrue($resp);
        $this->assertNull(Tablas::find($tablas->id), 'Tablas should not exist in DB');
    }
}
