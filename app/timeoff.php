<?php



use src\Leave;
use src\Employee;

require_once __DIR__ . "/../bootstrap.php";

// if post request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get post data
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];
    $reason = $_POST['reason'];
    $emp = $_POST['employee'];

    // create new leave
    $leave = new Leave();
    $leave->setStartDate($startDate);
    $leave->setEndDate($endDate);
    $leave->setStartTime($startTime);
    $leave->setEndTime($endTime);
    $leave->setReason($reason);
    $leave->setEmployeeId($emp);
    $leave->setApproved(0);

    $model = $entityManager->getRepository("src\Employee")->find($emp);
    $leave->setEmployee($model);
    $leave->setSector($model->getSector());
    // save leave
    $entityManager->persist($leave);
    $entityManager->flush();
}


// get all leaves
$leaves = $entityManager->getRepository("src\Leave")->findAll();
// get all employees
$employees = $entityManager->getRepository("src\Employee")->findAll();

render("timeoff.html.twig", [
    "actions" => getActions(),
    "leaves" => $leaves,
    "employees" => $employees
]);
