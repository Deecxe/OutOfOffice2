<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\EspaceDeCoworking;
use App\Entity\User;
use App\Entity\Reservation;

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
        $EspaceDeCoworkingBayonne->setUrl('\Image\espace_de_coworking\espace43.jpg');
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
        $EspaceDeCoworkingAnglet->setUrl('\Image\espace_de_coworking\espace44.jpg');
        $EspaceDeCoworkingAnglet->setTitre('Espace de coworking Anglet');
        $EspaceDeCoworkingAnglet->setPrix(20);
        $EspaceDeCoworkingAnglet->setAdresse('140 rue des pitre, Anglet 64600');
        $EspaceDeCoworkingAnglet->setDescriptif('Il est spatieux');
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
        $EspaceDeCoworkingToulouse = new EspaceDeCoworking();
        $EspaceDeCoworkingToulouse->setUrl('\Image\espace_de_coworking\espace45.jpg');
        $EspaceDeCoworkingToulouse->setTitre('Espace de coworking Toulouse');
        $EspaceDeCoworkingToulouse->setPrix(20);
        $EspaceDeCoworkingToulouse->setAdresse('140 rue des fur, Toulouse 64600');
        $EspaceDeCoworkingToulouse->setDescriptif('Il est top');
        $EspaceDeCoworkingToulouse->setImprimante(TRUE);
        $EspaceDeCoworkingToulouse->setParking(TRUE);
        $EspaceDeCoworkingToulouse->setCafe(FALSE);
        $EspaceDeCoworkingToulouse->setHeureOuverture('08h00');
        $EspaceDeCoworkingToulouse->setHeureFermeture('18h00');
        $EspaceDeCoworkingToulouse->setNombrePlace(10);
        $EspaceDeCoworkingToulouse->setNombrePlaceLibre(10);
        $EspaceDeCoworkingToulouse->setLat(43.6044622);
        $EspaceDeCoworkingToulouse->setLongitude(1.4442469);

        $manager->persist($EspaceDeCoworkingToulouse);
        $EspaceDeCoworkingMarseille = new EspaceDeCoworking();
        $EspaceDeCoworkingMarseille->setUrl('\Image\espace_de_coworking\espace46.jpg');
        $EspaceDeCoworkingMarseille->setTitre('Espace de coworking Marseille');
        $EspaceDeCoworkingMarseille->setPrix(20);
        $EspaceDeCoworkingMarseille->setAdresse('5 rue des pepep, Marseille 64600');
        $EspaceDeCoworkingMarseille->setDescriptif('Il est nice');
        $EspaceDeCoworkingMarseille->setImprimante(TRUE);
        $EspaceDeCoworkingMarseille->setParking(TRUE);
        $EspaceDeCoworkingMarseille->setCafe(FALSE);
        $EspaceDeCoworkingMarseille->setHeureOuverture('08h00');
        $EspaceDeCoworkingMarseille->setHeureFermeture('18h00');
        $EspaceDeCoworkingMarseille->setNombrePlace(10);
        $EspaceDeCoworkingMarseille->setNombrePlaceLibre(10);
        $EspaceDeCoworkingMarseille->setLat(43.2961743);
        $EspaceDeCoworkingMarseille->setLongitude(5.3699525);

        $manager->persist($EspaceDeCoworkingMarseille);        
        $EspaceDeCoworkingTruf = new EspaceDeCoworking();
        $EspaceDeCoworkingTruf->setUrl('\Image\espace_de_coworking\espace47.jpg');
        $EspaceDeCoworkingTruf->setTitre('Espace de coworking Anglet');
        $EspaceDeCoworkingTruf->setPrix(20);
        $EspaceDeCoworkingTruf->setAdresse('140 rue des pitre, Anglet 64600');
        $EspaceDeCoworkingTruf->setDescriptif('Il est cool');
        $EspaceDeCoworkingTruf->setImprimante(TRUE);
        $EspaceDeCoworkingTruf->setParking(TRUE);
        $EspaceDeCoworkingTruf->setCafe(FALSE);
        $EspaceDeCoworkingTruf->setHeureOuverture('08h00');
        $EspaceDeCoworkingTruf->setHeureFermeture('18h00');
        $EspaceDeCoworkingTruf->setNombrePlace(10);
        $EspaceDeCoworkingTruf->setNombrePlaceLibre(10);
        $EspaceDeCoworkingTruf->setLat(43.4813927);
        $EspaceDeCoworkingTruf->setLongitude(6.5149935);

        $manager->persist($EspaceDeCoworkingTruf);        
        $EspaceDeCoworkingLo = new EspaceDeCoworking();
        $EspaceDeCoworkingLo->setUrl('\Image\espace_de_coworking\espace47.jpg');
        $EspaceDeCoworkingLo->setTitre('Espace de coworking Anglet');
        $EspaceDeCoworkingLo->setPrix(20);
        $EspaceDeCoworkingLo->setAdresse('140 rue des pitre, Anglet 64600');
        $EspaceDeCoworkingLo->setDescriptif('Il est bof');
        $EspaceDeCoworkingLo->setImprimante(TRUE);
        $EspaceDeCoworkingLo->setParking(TRUE);
        $EspaceDeCoworkingLo->setCafe(FALSE);
        $EspaceDeCoworkingLo->setHeureOuverture('08h00');
        $EspaceDeCoworkingLo->setHeureFermeture('18h00');
        $EspaceDeCoworkingLo->setNombrePlace(10);
        $EspaceDeCoworkingLo->setNombrePlaceLibre(10);
        $EspaceDeCoworkingLo->setLat(43.813927);
        $EspaceDeCoworkingLo->setLongitude(4.5149935);

        $manager->persist($EspaceDeCoworkingLo);
        $EspaceDeCoworkingTo = new EspaceDeCoworking();
        $EspaceDeCoworkingTo->setUrl('\Image\espace_de_coworking\espace47.jpg');
        $EspaceDeCoworkingTo->setTitre('Espace de coworking Anglet');
        $EspaceDeCoworkingTo->setPrix(20);
        $EspaceDeCoworkingTo->setAdresse('140 rue des pitre, Anglet 64600');
        $EspaceDeCoworkingTo->setDescriptif('Il est bof');
        $EspaceDeCoworkingTo->setImprimante(TRUE);
        $EspaceDeCoworkingTo->setParking(TRUE);
        $EspaceDeCoworkingTo->setCafe(FALSE);
        $EspaceDeCoworkingTo->setHeureOuverture('08h00');
        $EspaceDeCoworkingTo->setHeureFermeture('18h00');
        $EspaceDeCoworkingTo->setNombrePlace(10);
        $EspaceDeCoworkingTo->setNombrePlaceLibre(10);
        $EspaceDeCoworkingTo->setLat(43.83927);
        $EspaceDeCoworkingTo->setLongitude(4.149935);

        $manager->persist($EspaceDeCoworkingTo);


        $manager->flush();

    }
}