<?php

namespace Tests\Feature\Http\Controllers\User;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjetosUserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_deve_renderizar_pagina_meus_projetos()
    {
        $this->withoutExceptionHandling();

        //Arrange 
        $user = User::factory()->create();
        $this->actingAs($user);

        //Act
        $response = $this->get(
            route('users.projetos',
             ['id' => $user->id, 'nick' => $user->nickname]
            )
        );

        //Assert
        $response->assertStatus(200);
        $response->assertViewIs('pages.meus-projetos');
        $response->assertViewHas('projetos');
    }
}
