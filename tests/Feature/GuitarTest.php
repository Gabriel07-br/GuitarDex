<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\post;

uses(RefreshDatabase::class);
// Esse teste verifica se a rota responde com sucesso e se um conteúdo específico aparece na tela ou na API.
it("deve carregar a pagina mural com sucesso", function(){
    $this->withoutMiddleware(\Illuminate\Cookie\Middleware\EncryptCookies::class);

    $this->get('/mural')
         ->assertOk();
});

it('deve cadastrar uma guitarra nova com sucesso', function(){
    // 1. Cria um usuário no banco para o teste
    $user = User::factory()->create();
    $dados = [
        'brand' => 'Ibanez',
        'model' => 'Kelly',
        'year' => '1998',
        'color' => 'Preto',
        'description' => 'assinada pelo Marty Friedman'
    ];
    // 2. Simula o envio Estando Logado (actingAs)
    $resposta = actingAs($user)->post('/mural', $dados);
    // 3. Verificações
    assertDatabaseHas('guitars', [
        'brand' => 'Ibanez',
        'model' => 'Kelly',
        'year' => '1998',
        'color' => 'Preto',
        'description' => 'assinada pelo Marty Friedman'
    ]);

    $resposta->assertRedirect('/mural');


});