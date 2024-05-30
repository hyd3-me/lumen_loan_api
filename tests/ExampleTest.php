<?php

namespace Tests;

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function test_that_base_endpoint_returns_a_successful_response()
    {
        $this->get('/');

        $this->assertEquals(
            $this->app->version(), $this->response->getContent()
        );
    }
}


// <?php

// namespace Tests\Feature;

// use App\Models\Loan;
// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;

// class LoanTest extends TestCase
// {
//     use RefreshDatabase;

//     public function testGetLoans()
//     {
//         $response = $this->getJson('/loans');

//         $response->assertStatus(401);
//         $response = $this->getJson('/loans', ['Authorization' => 'token']);
//         $response->assertStatus(200);
//         $response->assertJsonStructure([
//             'data' => [
//                 '*' => [
//                     'id',
//                     'title',
//                     'amount',
//                     'start_date',
//                     'end_date',
//                     'created_at',
//                     'updated_at'
//                 ]
//             ]
//         ]);
//     }

//     public function testPostLoans()
//     {
//         $data = [
//             'title' => 'Test Loan',
//             'amount' => 1000,
//             'start_date' => '2024-05-29',
//             'end_date' => '2024-06-29'
//         ];

//         $response = $this->postJson('/loans', $data, ['Authorization' => 'token']);

//         $response->assertStatus(201);
//         $response->assertJsonStructure([
//             'id',
//             'title',
//             'amount',
//             'start_date',
//             'end_date',
//             'created_at',
//             'updated_at'
//         ]);

//         $this->assertDatabaseHas('loans', $data);
//     }

//     public function testGetLoan()
//     {
//         $loan = Loan::factory()->create();

//         $response = $this->getJson('/loans/' . $loan->id, ['Authorization' => 'token']);

//         $response->assertStatus(200);
//         $response->assertJsonStructure([
//             'id',
//             'title',
//             'amount',
//             'start_date',
//             'end_date',
//             'created_at',
//             'updated_at'
//         ]);
//     }

//     public function testPutLoan()
//     {
//         $loan = Loan::factory()->create();

//         $data = [
//             'title' => 'Updated Loan',
//             'amount' => 2000,
//             'start_date' => '2024-05-30',
//             'end_date' => '2024-06-30'
//         ];

//         $response = $this->putJson('/loans/' . $loan->id, $data, ['Authorization' => 'token']);

//         $response->assertStatus(200);
//         $response->assertJsonStructure([
//             'id',
//             'title',
//             'amount',
//             'start_date',
//             'end_date',
//             'created_at',
//             'updated_at'
//         ]);

//         $this->assertDatabaseHas('loans', $data);
//     }

//     public function testDeleteLoan()
//     {
//         $loan = Loan::factory()->create();

//         $response = $this->deleteJson('/loans/' . $loan->id, [], ['Authorization' => 'token']);

//         $response->assertStatus(200);
//         $this->assertDatabaseMissing('loans', $loan->toArray());
//     }
// }