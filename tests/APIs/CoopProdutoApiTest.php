<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CoopProduto;

class CoopProdutoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_coop_produto()
    {
        $coopProduto = factory(CoopProduto::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/coop_produtos', $coopProduto
        );

        $this->assertApiResponse($coopProduto);
    }

    /**
     * @test
     */
    public function test_read_coop_produto()
    {
        $coopProduto = factory(CoopProduto::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/coop_produtos/'.$coopProduto->id
        );

        $this->assertApiResponse($coopProduto->toArray());
    }

    /**
     * @test
     */
    public function test_update_coop_produto()
    {
        $coopProduto = factory(CoopProduto::class)->create();
        $editedCoopProduto = factory(CoopProduto::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/coop_produtos/'.$coopProduto->id,
            $editedCoopProduto
        );

        $this->assertApiResponse($editedCoopProduto);
    }

    /**
     * @test
     */
    public function test_delete_coop_produto()
    {
        $coopProduto = factory(CoopProduto::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/coop_produtos/'.$coopProduto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/coop_produtos/'.$coopProduto->id
        );

        $this->response->assertStatus(404);
    }
}
