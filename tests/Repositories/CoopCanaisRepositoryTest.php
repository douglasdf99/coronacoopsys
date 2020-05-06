<?php namespace Tests\Repositories;

use App\Models\CoopCanais;
use App\Repositories\CoopCanaisRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CoopCanaisRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CoopCanaisRepository
     */
    protected $coopCanaisRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coopCanaisRepo = \App::make(CoopCanaisRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_coop_canais()
    {
        $coopCanais = factory(CoopCanais::class)->make()->toArray();

        $createdCoopCanais = $this->coopCanaisRepo->create($coopCanais);

        $createdCoopCanais = $createdCoopCanais->toArray();
        $this->assertArrayHasKey('id', $createdCoopCanais);
        $this->assertNotNull($createdCoopCanais['id'], 'Created CoopCanais must have id specified');
        $this->assertNotNull(CoopCanais::find($createdCoopCanais['id']), 'CoopCanais with given id must be in DB');
        $this->assertModelData($coopCanais, $createdCoopCanais);
    }

    /**
     * @test read
     */
    public function test_read_coop_canais()
    {
        $coopCanais = factory(CoopCanais::class)->create();

        $dbCoopCanais = $this->coopCanaisRepo->find($coopCanais->id);

        $dbCoopCanais = $dbCoopCanais->toArray();
        $this->assertModelData($coopCanais->toArray(), $dbCoopCanais);
    }

    /**
     * @test update
     */
    public function test_update_coop_canais()
    {
        $coopCanais = factory(CoopCanais::class)->create();
        $fakeCoopCanais = factory(CoopCanais::class)->make()->toArray();

        $updatedCoopCanais = $this->coopCanaisRepo->update($fakeCoopCanais, $coopCanais->id);

        $this->assertModelData($fakeCoopCanais, $updatedCoopCanais->toArray());
        $dbCoopCanais = $this->coopCanaisRepo->find($coopCanais->id);
        $this->assertModelData($fakeCoopCanais, $dbCoopCanais->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_coop_canais()
    {
        $coopCanais = factory(CoopCanais::class)->create();

        $resp = $this->coopCanaisRepo->delete($coopCanais->id);

        $this->assertTrue($resp);
        $this->assertNull(CoopCanais::find($coopCanais->id), 'CoopCanais should not exist in DB');
    }
}
