<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Canais;

class CanaisApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_canais()
    {
        $canais = factory(Canais::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/canais', $canais
        );

        $this->assertApiResponse($canais);
    }

    /**
     * @test
     */
    public function test_read_canais()
    {
        $canais = factory(Canais::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/canais/'.$canais->id
        );

        $this->assertApiResponse($canais->toArray());
    }

    /**
     * @test
     */
    public function test_update_canais()
    {
        $canais = factory(Canais::class)->create();
        $editedCanais = factory(Canais::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/canais/'.$canais->id,
            $editedCanais
        );

        $this->assertApiResponse($editedCanais);
    }

    /**
     * @test
     */
    public function test_delete_canais()
    {
        $canais = factory(Canais::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/canais/'.$canais->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/canais/'.$canais->id
        );

        $this->response->assertStatus(404);
    }
}
