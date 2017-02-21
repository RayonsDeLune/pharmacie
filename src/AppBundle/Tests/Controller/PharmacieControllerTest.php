<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PharmacieControllerTest extends WebTestCase
{
    public function testRechercherecetteparsymptomeproduit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rechercheRecetteParSymptomeProduit');
    }

    public function testRechercheproduitparsymptomecategorie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rechercheProduitParSymptomeCategorie');
    }

    public function testRecherchesymptomeparproduit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/rechercheSymptomeParProduit');
    }

    public function testListedernieresrecettes()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listeDernieresRecettes');
    }

    public function testListederniersproduits()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/listeDerniersProduits');
    }

}
