<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Entity\Car;
use App\Entity\Personne;

final class PersonneControllerTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $client->request('GET', '/personne');

        self::assertResponseIsSuccessful();
    }

    public function testGetId(): void
    {
        $personne = new Personne();
        $personne->setId(1);

        self::assertEquals(1, $personne->getId());
    }

    public function testSetId(): void
    {
        $personne = new Personne();
        $personne->setId(1);

        self::assertEquals(1, $personne->getId());
    }

    public function testGetNom(): void
    {
        $personne = new Personne();
        $personne->setNom('Doe');

        self::assertEquals('Doe', $personne->getNom());
    }

    public function testSetNom(): void
    {
        $personne = new Personne();
        $personne->setNom('Doe');

        self::assertEquals('Doe', $personne->getNom());
    }

    public function testGetPrenom(): void
    {
        $personne = new Personne();
        $personne->setPrenom('John');

        self::assertEquals('John', $personne->getPrenom());
    }

    public function testSetPrenom(): void
    {
        $personne = new Personne();
        $personne->setPrenom('John');

        self::assertEquals('John', $personne->getPrenom());
    }

    public function testGetCar(): void
    {
        $car = new Car();
        $personne = new Personne();
        $personne->setCar($car);

        self::assertSame($car, $personne->getCar());
    }

    public function testSetCar(): void
    {
        $car = new Car();
        $personne = new Personne();
        $personne->setCar($car);

        self::assertSame($car, $personne->getCar());
    }
}
