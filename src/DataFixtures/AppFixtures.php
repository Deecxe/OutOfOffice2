<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\EspaceDeCoworking;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $EspaceDeCoworkingBayonne = new EspaceDeCoworking();
        $EspaceDeCoworkingBayonne->setUrl('..\..\public\Image\espace_de_coworking_bayonne');
        $EspaceDeCoworkingBayonne->setTitre('Espace de coworking Bayonne');
        $EspaceDeCoworkingBayonne->setPrix(50);
        $EspaceDeCoworkingBayonne->setAdresse('126 rue des potes, Bayonne 64100');
        $EspaceDeCoworkingBayonne->setDescriptif('Il est vraiment cool');
        $EspaceDeCoworkingBayonne->setImprimante(TRUE);
        $EspaceDeCoworkingBayonne->setParking(FALSE);
        $EspaceDeCoworkingBayonne->setCafe(FALSE);
        $EspaceDeCoworkingBayonne->setHeureOuverture('08h00');
        $EspaceDeCoworkingBayonne->setHeureFermeture('18h00');
        $EspaceDeCoworkingBayonne->setNombrePlace(20);
        $EspaceDeCoworkingBayonne->setNombrePlaceLibre(20);
        $manager->persist($EspaceDeCoworkingBayonne);

        $EspaceDeCoworkingAnglet = new EspaceDeCoworking();
        $EspaceDeCoworkingAnglet->setUrl('..\..\public\Image\espace_de_coworking_anglet');
        $EspaceDeCoworkingAnglet->setTitre('Espace de coworking Anglet');
        $EspaceDeCoworkingAnglet->setPrix(20);
        $EspaceDeCoworkingAnglet->setAdresse('140 rue des pitre, Anglet 64600');
        $EspaceDeCoworkingAnglet->setDescriptif('Il est bof');
        $EspaceDeCoworkingAnglet->setImprimante(TRUE);
        $EspaceDeCoworkingAnglet->setParking(TRUE);
        $EspaceDeCoworkingAnglet->setCafe(FALSE);
        $EspaceDeCoworkingAnglet->setHeureOuverture('08h00');
        $EspaceDeCoworkingAnglet->setHeureFermeture('18h00');
        $EspaceDeCoworkingAnglet->setNombrePlace(10);
        $EspaceDeCoworkingAnglet->setNombrePlaceLibre(10);
        $manager->persist($EspaceDeCoworkingAnglet);
        $manager->flush();
    }
}
