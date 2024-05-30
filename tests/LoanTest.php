<?php

namespace Tests;

use App\Models\Loan;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class LoanTest extends TestCase {
    
    // use RefreshDatabase;

    public function testGetLoans()
    {
        $response = $this->call('GET', 'api/v1/loans');
        $this->assertEquals(200, $response->status());

        $response->assertExactJson([]);
    }
}