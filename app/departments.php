<?php

use src\Department;

include __DIR__ . "/../bootstrap.php";

// global $entityManager;

// if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get post data
    $name = $_POST['name'];
    $description = $_POST['description'];

    // create new department
    $department = new Department();
    $department->setName($name);
    $department->setDescription($description);

    // save department
    $entityManager->persist($department);
    $entityManager->flush();
}


// get all departments
$departments = $entityManager->getRepository("src\Department")->findAll();

render("departments.html.twig",
    [
        "departments" => $departments,
        "actions" => getActions()
    ]);
