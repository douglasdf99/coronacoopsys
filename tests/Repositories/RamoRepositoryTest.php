<?php namespace Tests\Repositories;

use App\Models\Ramo;
use App\Repositories\RamoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class RamoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var RamoRepository
     */
    protected $ramoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->ramoRepo = \App::make(RamoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_ramo()
    {
        $ramo = factory(Ramo::class)->make()->toArray();

        $createdRamo = $this->ramoRepo->create($ramo);

        $createdRamo = $createdRamo->toArray();
        $this->assertArrayHasKey('id', $createdRamo);
        $this->assertNotNull($createdRamo['id'], 'Created Ramo must have id specified');
        $this->assertNotNull(Ramo::find($createdRamo['id']), 'Ramo with given id must be in DB');
        $this->assertModelData($ramo, $createdRamo);
    }

    /**
     * @test read
     */
    public function test_read_ramo()
    {
        $ramo = factory(Ramo::class)->create();

        $dbRamo = $this->ramoRepo->find($ramo->id);

        $dbRamo = $dbRamo->toArray();
        $this->assertModelData($ramo->toArray(), $dbRamo);
    }

    /**
     * @test update
     */
    public function test_update_ramo()
    {
        $ramo = factory(Ramo::class)->create();
        $fakeRamo = factory(Ramo::class)->make()->toArray();

        $updatedRamo = $this->ramoRepo->update($fakeRamo, $ramo->id);

        $this->assertModelData($fakeRamo, $updatedRamo->toArray());
        $dbRamo = $this->ramoRepo->find($ramo->id);
        $this->assertModelData($fakeRamo, $dbRamo->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_ramo()
    {
        $ramo = factory(Ramo::class)->create();

        $resp = $this->ramoRepo->delete($ramo->id);

        $this->assertTrue($resp);
        $this->assertNull(Ramo::find($ramo->id), 'Ramo should not exist in DB');
    }
}
