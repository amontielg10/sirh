<?php

///INCLUDE CONEXION
include '../../../../conexion.php';

///MODEL
include '../../../Model/Hraes/DatosEmpleadoM/DatosEmpleadoM.php';
include '../../../Model/Catalogos/CatGeneroM/CatGeneroM.php';
include '../../../Model/Catalogos/CatEstadoCivilM/CatEstadoCivilM.php';
include '../../../Model/Catalogos/CatEstatusM/CatEstatusM.php';
include '../../../Model/Hraes/CamposPersM/CamposPersM.php';
include '../../../Model/Hraes/TelefonoM/TelefonoM.php';
include '../../../Model/Hraes/CedulaM/CedulaM.php';
include '../../../Model/Hraes/DependientesM/DependientesM.php';
include '../../../Model/Hraes/ContactoEmergenciaM/ContactoEmergenciaM.php';
include '../../../Model/Hraes/FormaPagoM/FormaPagoM.php';
include '../../../Model/Catalogos/CatFormatoPagoM/CatFormatoPagoM.php';
include '../../../Model/Catalogos/CatBancoM/CatBancoM.php';
include '../../../Model/Catalogos/CatDependientesM/CatDependientesM.php';
include '../../../Model/Hraes/Catalogos/CatDependientesM/CatDependientesM.php';
include '../../../Model/Hraes/JuguetesM/JuguetesM.php';
include '../../../Model/Catalogos/CatFechaJuguetesM/CatFechaJuguetesM.php';
include '../../../Model/Catalogos/CatEstatusJuguetesM/CatEstatusJuguetesM.php';
include '../../../Model/Hraes/RetardoM/RetardoM.php';
include '../../../Model/Hraes/DomicilioM/DomicilioM.php';
include '../../../Model/Catalogos/CatSepomexM/CatSepomexM.php';

///CONTROLLERS
include '../../../Controllers/Hrae/GlobalC/ArrayC.php';
include '../../../Controllers/Catalogos/CatGeneroC/CatGeneroC.php';
include '../../../Controllers/Catalogos/CatEstadoCivilC/CatEstadoCivilC.php';
include '../../../Controllers/Catalogos/CatEstatusC/CatEstatusC.php';
include '../../../Controllers/Catalogos/CatFormatoPagoC/CatFormatoPagoC.php';
include '../../../Controllers/Catalogos/CatDependientesC/CatDependientesC.php';
include '../../../Controllers/Hrae/Catalogos/CatDependientesC/CatDependientesC.php';
include '../../../Controllers/Catalogos/CatFechaJuguetesC/CatFechaJuguetesC.php';
include '../../../Controllers/Catalogos/CatEstatusJuguetesC/CatEstatusJuguetesC.php';
include '../../../Controllers/Catalogos/CatSepomexC/CatSepomexC.php';