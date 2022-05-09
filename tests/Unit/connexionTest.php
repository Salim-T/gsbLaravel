<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class connexionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function ConnexionValid()
    {
       $data = ['login' => 'toto', 'mdp' => 'titi'];
       $response = $this->post('/',$data);
       $response->assertStatus(200);
       $response->assertSessionHas('visiteur');
       $response->assertSeeText('Louis'); 
    }

    /**
     * A basic test example.
     *
     * @test
     */
    public function echecConnexion()
    {
       $data = ['login' => 'toto', 'mdp' => 'toto'];
       $response = $this->post('/',$data);
       $response->assertStatus(200);
       $response->assertSessionMissing('visiteur');
       $response->assertSeeText('Login*'); 
       $response->assertSeeText('Mot de passe*');
    }

    public function echecConnexionPuisConnexionReussite()
    {
       $data = ['login' => 'toto', 'mdp' => 'toto'];
       $response = $this->post('/',$data);
       $response->assertStatus(200);
       $response->assertSessionMissing('visiteur');
       $response->assertSeeText('Login*'); 
       $response->assertSeeText('Mot de passe*');
       $data = ['login' => 'toto', 'mdp' => 'titi'];
       $response = $this->post('/',$data);
       $response->assertStatus(200);
       $response->assertSessionHas('visiteur');
       $response->assertSeeText('Louis'); 
    }
}
