<?php

namespace App\DataFixtures;

use App\Entity\Equipe;
use App\Entity\Joueur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $equipe = [
            'France',
            'UK',
            'Allemangne',
            'Italie',
            'Espagne'
        ];
        foreach ($equipe as $e) {
            $equip= new Equipe;
            $equip->setNom($e);
            $tabObjEquipe[] = $equip;
            $manager->persist($equip);
        }

        $data = [[
            'nom' => "Jean Michel Attaquant",
            'photo' => "def",
            'pays' => "France",
            'presentation' => "Tout ce que vous devez savoir sur ce joueur",
            'relation' => "equipe"
        ],[
            'nom' => "Didier Bernard Défenseur",
            'photo' => "def",
            'pays' => "France",
            'presentation' => "Tout ce que vous devez savoir sur ce joueur",
            'relation' => "equipe" 
        ],[
            'nom' => "Patrick Henri Gardien",
            'photo' => "def",
            'pays' => "France",
            'presentation' => "Tout ce que vous devez savoir sur ce joueur",
            'relation' => "equipe"
        ]];

        foreach ($data as $j) {
            $joueur = new Joueur;
            $joueur
                ->setNom($j['nom'])
                ->setPhoto($j['photo'])
                ->setPays($j['pays'])
                ->setPresentation($j['presentation'])
                ->setRelation($tabObjEquipe[0]);

            $manager -> persist($joueur);

        }

        $manager->flush();

    }
}
