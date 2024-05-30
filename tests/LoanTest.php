<?php

namespace Tests;

use App\Models\Loan;
// use Illuminate\Foundation\Testing\TestCase;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class LoanTest extends TestCase {
    
    use DatabaseMigrations;

    public function testGetLoans()
    {
        $response = $this->call('GET', 'api/v1/loans');
        $this->assertEquals(200, $response->status());

        $response->assertExactJson([]);
    }

    public function testPostLoans() {

        $response = $this->call('POST', 'api/v1/loans', ['amount' => 999]);
        $this->assertEquals(201, $response->status());

    }

    public function testPutLoans() {
        $amount = 369;
        $response = $this->json('POST', 'api/v1/loans', ['amount' => $amount]);
        $response->seeJson([
            'amount' => $amount,
         ]
        );
        $data = json_decode($response->response->getContent(), true);
        // echo $data['id'];
        $new_amount = 366;
        $_url = 'api/v1/loans/' . $data['id'];
        $response = $this->json('PUT', $_url, ['amount' => $new_amount]);
        $response->seeJson([
            'amount' => $new_amount,
         ]
        );
        $this->seeInDatabase('loans', ['id' => $data['id'], 'amount' => $new_amount]);
    }

    public function testGetLoanById() {

        $loan = Loan::create(['amount' => 777]);

        $response = $this->json('GET', "api/v1/loans/$loan->id")
        ->seeJsonEquals([
            'id' => $loan->id,
            'amount' => $loan->amount,
            'created_at' => $loan->created_at,
            'updated_at' => $loan->updated_at,
         ]);
    }
}