<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Car;
use App\Entity\Personne;

final class CarControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/car');

        self::assertResponseIsSuccessful();
    }
    
    public function testGetId(): void
    {
        $car = new Car();
        $car->setId(1);

        self::assertEquals(1, $car->getId());
    }

    public function testGetModele(): void
    {
        $car = new Car();
        $car->setModele('Tesla Model S');

        self::assertEquals('Tesla Model S', $car->getModele());
    }

    public function testSetModele(): void
    {
        $car = new Car();
        $car->setModele('Tesla Model 3');

        self::assertEquals('Tesla Model 3', $car->getModele());
    }

    public function testGetPersonne(): void
    {
        $personne = new Personne();
        $car = new Car();
        $car->setPersonne($personne);

        self::assertSame($personne, $car->getPersonne());
    }

    public function testSetPersonne(): void
    {
        $personne = new Personne();
        $car = new Car();
        $car->setPersonne($personne);

        self::assertSame($personne, $car->getPersonne());
    }
}
