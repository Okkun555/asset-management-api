<?php

namespace Tests\Feature\Http\Controllers\Api\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountCreateControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @var array $params リクエストパラメータ */
    private array $params;

    public function setUp(): void
    {
        parent::setUp();

        $this->params = [
            'email' => 'sample-test@email.com',
            'password' => 'password0000'
        ];
    }

    /**
     * @test
     * @group AccountCreateController
     */
    public function 正常_リクエスト成功時、200ステータスを含むJSONを返却()
    {
        $response = $this->post(route('account.create'), $this->params);

        $response->assertOk();
        // DB値のテスト
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', [
            'email' => $this->params['email'],
        ]);
    }
}
