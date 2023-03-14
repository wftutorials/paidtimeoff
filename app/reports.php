<?php

include __DIR__ . "/../bootstrap.php";


// get all leaves
$leaves = $entityManager->getRepository("src\Leave")->findAll();

$sectors = [];
$sectorCount = [];
$sectorDaysCount = [];
foreach ($leaves as $leave){

    $sector = $leave->getEmployee()->getSector()->getSector();
   // var_dump($sector);
    if(!in_array($sector, $sectors)){
        $sectors[] = $sector;
        $sectorCount[$sector] = 1;
        $sectorDaysCount[$sector] = $leave->getDays();
    }else{
        $sectorCount[$sector] = $sectorCount[$sector] + 1;
        $sectorDaysCount[$sector] = $sectorDaysCount[$sector] + $leave->getDays();
    }
}


render("reports.html.twig", [
    "actions" => getActions(),
    "sectorCount" => $sectorCount,
    "sectorDaysCount" => $sectorDaysCount
]);
