<?php

use src\Employee;
include __DIR__ . "/../bootstrap.php";


// if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get post data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $sector = $_POST['sector'];

    // create new employee
    $employee = new Employee();
    $employee->setName($name);
    $employee->setEmail($email);
    // get one department
    $departmentModel = $entityManager->find("src\Department", $department);
    $employee->setDepartmentModel($departmentModel);
    // get one sector
    $sectorModel = $entityManager->find("src\Sector", $sector);
    $employee->setSector($sectorModel);
    // save employee
    $entityManager->persist($employee);
    $entityManager->flush();
}


// render employee view
$employees = $entityManager->getRepository("src\Employee")->findAll();

// get departments listing
$departments = $entityManager->getRepository("src\Department")->findAll();

// get sectors
$sectors = $entityManager->getRepository("src\Sector")->findAll();

render("employees.html.twig",
    [
        "employees" => $employees,
        'departments' => $departments,
        'sectors' => $sectors,
        "actions" => getActions()
    ]);

