<?php

include '../librerias.php';
include '../../../Model/Central/ReporteM/ReporteM.php';

$isSchema = 'central';
$isTableName = $isSchema . '.reporte_central';

$reporteM = new ReporteM();

$bool = false;

$bool = $reporteM->isTruncateTable($isTableName) ? true : false;
if (!$bool) exit($bool);

$bool = $reporteM->isQueryAll($isTableName) ? true : false;
if (!$bool) exit ($bool);

echo $bool;

