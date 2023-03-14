<?php

include __DIR__ . '/../bootstrap.php';

use src\Sector;

// if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sector = new Sector();
    $sector->setSector($_POST['sector']);
    $entityManager->persist($sector);
    $entityManager->flush();
}


$sectors = $entityManager->getRepository(Sector::class)->findAll();

render('sectors.html.twig', ['sectors' => $sectors, 'actions' => getActions()]);
