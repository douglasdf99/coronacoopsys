<?php namespace Tests\Repositories;

use App\Models\Coop;
use App\Repositories\CoopRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CoopRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CoopRepository
     */
    protected $coopRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coopRepo = \App::make(CoopRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_coop()
    {
        $coop = factory(Coop::class)->make()->toArray();

        $createdCoop = $this->coopRepo->create($coop);

        $createdCoop = $createdCoop->toArray();
        $this->assertArrayHasKey('id', $createdCoop);
        $this->assertNotNull($createdCoop['id'], 'Created Coop must have id specified');
        $this->assertNotNull(Coop::find($createdCoop['id']), 'Coop with given id must be in DB');
        $this->assertModelData($coop, $createdCoop);
    }

    /**
     * @test read
     */
    public function test_read_coop()
    {
        $coop = factory(Coop::class)->create();

        $dbCoop = $this->coopRepo->find($coop->id);

        $dbCoop = $dbCoop->toArray();
        $this->assertModelData($coop->toArray(), $dbCoop);
    }

    /**
     * @test update
     */
    public function test_update_coop()
    {
        $coop = factory(Coop::class)->create();
        $fakeCoop = factory(Coop::class)->make()->toArray();

        $updatedCoop = $this->coopRepo->update($fakeCoop, $coop->id);

        $this->assertModelData($fakeCoop, $updatedCoop->toArray());
        $dbCoop = $this->coopRepo->find($coop->id);
        $this->assertModelData($fakeCoop, $dbCoop->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_coop()
    {
        $coop = factory(Coop::class)->create();

        $resp = $this->coopRepo->delete($coop->id);

        $this->assertTrue($resp);
        $this->assertNull(Coop::find($coop->id), 'Coop should not exist in DB');
    }
}
