<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InscriptionControllerControllerTest extends WebTestCase
{
    public function testInscription()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/inscription');
    }

}
