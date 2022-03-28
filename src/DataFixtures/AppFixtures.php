<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\EspaceDeCoworking;
use App\Entity\User;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $tim = new User();
        $tim->setPrenom("Timoteo");
        $tim->setNom("Couture");
        $tim->setUsername("Tim");
        $tim->setEmail("timlebucheron@gmail.com");
        $tim->setMetier("Bucheron");
        $tim->setSecteurActivite("Bois");
        $tim->setEstGerant(true);
        $tim->setRoles(["ROLE_CLIENT", "ROLE_GERANT", "ROLE_ADMIN"]);
        $tim->setPassword('$2y$10$zccmVXyfzJOqtx6/laXvH.Wwsctb67DAcmoH9yEEcBvUS47afzgcy');

        $manager->persist($tim);

        $bastien = new User();
        $bastien->setPrenom("Bastien");
        $bastien->setNom("Dupont");
        $bastien->setUsername("Bylyz");
        $bastien->setEmail("sniperFR4NC3@gmail.com");
        $bastien->setMetier("Tireur d'élite");
        $bastien->setSecteurActivite("Lance-roquette");
        $bastien->setEstGerant(true);
        $bastien->setRoles(["ROLE_CLIENT", "ROLE_GERANT", "ROLE_ADMIN"]);
        $bastien->setPassword('$2y$10$Qht6/zogFaGNd/a010k2wuZ21u2skndunZ4lCtLZ4u1yvIVUzs8RS');

        $manager->persist($bastien);

        $EspaceDeCoworkingBayonne = new EspaceDeCoworking();
        $EspaceDeCoworkingBayonne->setUrl('....\public\Image\espace_de_coworking_bayonne');
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
        $EspaceDeCoworkingBayonne->setLat(43.4933379);
        $EspaceDeCoworkingBayonne->setLongitude(-1.475099);
        $manager->persist($EspaceDeCoworkingBayonne);

        $EspaceDeCoworkingAnglet = new EspaceDeCoworking();
        $EspaceDeCoworkingAnglet->setUrl('....\public\Image\espace_de_coworking_anglet');
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
        $EspaceDeCoworkingAnglet->setLat(43.4813927);
        $EspaceDeCoworkingAnglet->setLongitude(-1.5149935);
        
        $manager->persist($EspaceDeCoworkingAnglet);

        $manager->flush();

    }
}