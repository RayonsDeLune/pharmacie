<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RecettePosologieControllerTest extends WebTestCase
{
    public function testRecetteposologie()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/recettePosologie');
    }

}
