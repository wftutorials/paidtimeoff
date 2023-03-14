<?php
include __DIR__ . '/../bootstrap.php';

use src\Employee;
use src\Leave;

// get id parameter from url
$id = $_GET['id'];

if($id){


    // get all leave by employee id
    $leaves = $entityManager->getRepository("src\Leave")->findBy(["employeeId" => $id]);

    // get employee by id
    $employee = $entityManager->getRepository("src\Employee")->find($id);

    render("history.html.twig", [
        "id" => $id,
        'leaves' => $leaves,
        'employee' => $employee
    ]);



}
