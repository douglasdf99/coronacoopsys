<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CoopCanais;

class CoopCanaisApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_coop_canais()
    {
        $coopCanais = factory(CoopCanais::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/coop_canais', $coopCanais
        );

        $this->assertApiResponse($coopCanais);
    }

    /**
     * @test
     */
    public function test_read_coop_canais()
    {
        $coopCanais = factory(CoopCanais::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/coop_canais/'.$coopCanais->id
        );

        $this->assertApiResponse($coopCanais->toArray());
    }

    /**
     * @test
     */
    public function test_update_coop_canais()
    {
        $coopCanais = factory(CoopCanais::class)->create();
        $editedCoopCanais = factory(CoopCanais::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/coop_canais/'.$coopCanais->id,
            $editedCoopCanais
        );

        $this->assertApiResponse($editedCoopCanais);
    }

    /**
     * @test
     */
    public function test_delete_coop_canais()
    {
        $coopCanais = factory(CoopCanais::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/coop_canais/'.$coopCanais->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/coop_canais/'.$coopCanais->id
        );

        $this->response->assertStatus(404);
    }
}
