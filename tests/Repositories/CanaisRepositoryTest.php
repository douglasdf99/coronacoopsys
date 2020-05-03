<?php namespace Tests\Repositories;

use App\Models\Canais;
use App\Repositories\CanaisRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CanaisRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CanaisRepository
     */
    protected $canaisRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->canaisRepo = \App::make(CanaisRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_canais()
    {
        $canais = factory(Canais::class)->make()->toArray();

        $createdCanais = $this->canaisRepo->create($canais);

        $createdCanais = $createdCanais->toArray();
        $this->assertArrayHasKey('id', $createdCanais);
        $this->assertNotNull($createdCanais['id'], 'Created Canais must have id specified');
        $this->assertNotNull(Canais::find($createdCanais['id']), 'Canais with given id must be in DB');
        $this->assertModelData($canais, $createdCanais);
    }

    /**
     * @test read
     */
    public function test_read_canais()
    {
        $canais = factory(Canais::class)->create();

        $dbCanais = $this->canaisRepo->find($canais->id);

        $dbCanais = $dbCanais->toArray();
        $this->assertModelData($canais->toArray(), $dbCanais);
    }

    /**
     * @test update
     */
    public function test_update_canais()
    {
        $canais = factory(Canais::class)->create();
        $fakeCanais = factory(Canais::class)->make()->toArray();

        $updatedCanais = $this->canaisRepo->update($fakeCanais, $canais->id);

        $this->assertModelData($fakeCanais, $updatedCanais->toArray());
        $dbCanais = $this->canaisRepo->find($canais->id);
        $this->assertModelData($fakeCanais, $dbCanais->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_canais()
    {
        $canais = factory(Canais::class)->create();

        $resp = $this->canaisRepo->delete($canais->id);

        $this->assertTrue($resp);
        $this->assertNull(Canais::find($canais->id), 'Canais should not exist in DB');
    }
}
