<?php namespace Tests\Repositories;

use App\Models\CoopProduto;
use App\Repositories\CoopProdutoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CoopProdutoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CoopProdutoRepository
     */
    protected $coopProdutoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->coopProdutoRepo = \App::make(CoopProdutoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_coop_produto()
    {
        $coopProduto = factory(CoopProduto::class)->make()->toArray();

        $createdCoopProduto = $this->coopProdutoRepo->create($coopProduto);

        $createdCoopProduto = $createdCoopProduto->toArray();
        $this->assertArrayHasKey('id', $createdCoopProduto);
        $this->assertNotNull($createdCoopProduto['id'], 'Created CoopProduto must have id specified');
        $this->assertNotNull(CoopProduto::find($createdCoopProduto['id']), 'CoopProduto with given id must be in DB');
        $this->assertModelData($coopProduto, $createdCoopProduto);
    }

    /**
     * @test read
     */
    public function test_read_coop_produto()
    {
        $coopProduto = factory(CoopProduto::class)->create();

        $dbCoopProduto = $this->coopProdutoRepo->find($coopProduto->id);

        $dbCoopProduto = $dbCoopProduto->toArray();
        $this->assertModelData($coopProduto->toArray(), $dbCoopProduto);
    }

    /**
     * @test update
     */
    public function test_update_coop_produto()
    {
        $coopProduto = factory(CoopProduto::class)->create();
        $fakeCoopProduto = factory(CoopProduto::class)->make()->toArray();

        $updatedCoopProduto = $this->coopProdutoRepo->update($fakeCoopProduto, $coopProduto->id);

        $this->assertModelData($fakeCoopProduto, $updatedCoopProduto->toArray());
        $dbCoopProduto = $this->coopProdutoRepo->find($coopProduto->id);
        $this->assertModelData($fakeCoopProduto, $dbCoopProduto->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_coop_produto()
    {
        $coopProduto = factory(CoopProduto::class)->create();

        $resp = $this->coopProdutoRepo->delete($coopProduto->id);

        $this->assertTrue($resp);
        $this->assertNull(CoopProduto::find($coopProduto->id), 'CoopProduto should not exist in DB');
    }
}
