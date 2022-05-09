<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestDate extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function dateMois()
    {
        $mois = MyDate::extraireMois("202203");
        $this->assertEquals($mois,"03","erreur");
    }
}
