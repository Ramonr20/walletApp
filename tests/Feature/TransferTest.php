<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Wallet;
use App\Transfer;

class TransferTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $wallet = factory(Wallet::class)->create(); //created within database
        $transfer = factory(Transfer::class)->make(); //created at memory

        $response = $this->json('POST', '/api/transfer', [
            'description' => $transfer->description,
            'amount' => $transfer->amount,
            'wallet_id' => $wallet->id
        ]);

        $response->assertJsonStructure([
            'id', 'description', 'amount', 'wallet_id'
        ])->assertStatus(201);

        $this->assertDatabaseHas('transfers', [
            'description' => $transfer->description,
            'amount' => $transfer->amount,
            'wallet_id' => $wallet->id
        ]);

        $this->assertDatabaseHas('wallets', [
            'id' => $wallet->id,
            'money' => $wallet->money + $transfer->amount
        ]);
    }
}
