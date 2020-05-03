<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Coop;

class CoopApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_coop()
    {
        $coop = factory(Coop::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/coops', $coop
        );

        $this->assertApiResponse($coop);
    }

    /**
     * @test
     */
    public function test_read_coop()
    {
        $coop = factory(Coop::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/coops/'.$coop->id
        );

        $this->assertApiResponse($coop->toArray());
    }

    /**
     * @test
     */
    public function test_update_coop()
    {
        $coop = factory(Coop::class)->create();
        $editedCoop = factory(Coop::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/coops/'.$coop->id,
            $editedCoop
        );

        $this->assertApiResponse($editedCoop);
    }

    /**
     * @test
     */
    public function test_delete_coop()
    {
        $coop = factory(Coop::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/coops/'.$coop->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/coops/'.$coop->id
        );

        $this->response->assertStatus(404);
    }
}
