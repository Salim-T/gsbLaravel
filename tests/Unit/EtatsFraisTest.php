<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PdoGsb;

class EtatsFraisTest extends TestCase
{
    public function contexte() {
        $visiteur = PdoGsb::getInfosVisiteur('toto','tata');
        session(['visiteur' => $visiteur]);
    }
    /**
     * @test
     *
     * @return void
     */
    public function moisSelected()
    {
        $this->contexte();
        $response = $this->get('/selectionMois');
        $response->assertStatus(200); //retrouve bien la ressource -> la vue
        $response->assertSee('202101');
        $response->assertSee('202102');
    }
    /**
     * @test
     *
     * @return void
     */
    public function donneesRetournees()
    {
        $this->contexte();
        $data = ['lstMois'=>'202101'];
        $response = $this->post('/listeFrais',$data); //post donc recupere des données->$data
        $response->assertStatus(200);
        $response->assertSee('4644.78');
    }
}


