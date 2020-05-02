<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Ramo;

class RamoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_ramo()
    {
        $ramo = factory(Ramo::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/ramos', $ramo
        );

        $this->assertApiResponse($ramo);
    }

    /**
     * @test
     */
    public function test_read_ramo()
    {
        $ramo = factory(Ramo::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/ramos/'.$ramo->id
        );

        $this->assertApiResponse($ramo->toArray());
    }

    /**
     * @test
     */
    public function test_update_ramo()
    {
        $ramo = factory(Ramo::class)->create();
        $editedRamo = factory(Ramo::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/ramos/'.$ramo->id,
            $editedRamo
        );

        $this->assertApiResponse($editedRamo);
    }

    /**
     * @test
     */
    public function test_delete_ramo()
    {
        $ramo = factory(Ramo::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/ramos/'.$ramo->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/ramos/'.$ramo->id
        );

        $this->response->assertStatus(404);
    }
}
