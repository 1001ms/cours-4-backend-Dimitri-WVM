<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;
use App\Entity\Personne;
use App\Entity\Car;

#[AsCommand(
    name: 'AddDataDB',
    description: 'Add a short description for your command',
)]
class AddDataDBCommand extends Command
{

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function configure()
    {
        $this->setDescription('Ajoute des données de test dans la base de données');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $personne = new Personne();
            $personne->setNom($faker->lastName);
            $personne->setPrenom($faker->firstName);

            if ($i % 2 === 0) {
                $car = new Car();
                $car->setModele($faker->word);
                $personne->setCar($car);
                $this->em->persist($car);
            }

            $this->em->persist($personne);
        }

        $this->em->flush();

        $output->writeln('Données ajoutées avec succès.');
        return Command::SUCCESS;
    }
}
