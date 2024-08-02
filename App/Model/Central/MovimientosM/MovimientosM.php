<?php

class ModelMovimientosM
{
    public function listarByIdEmpleado($idEmpleado, $paginator)
    {
        $listado = pg_query("SELECT tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes, 
                                    tbl_plazas_empleados_hraes.fecha_inicio, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento,
                                    tbl_plazas_empleados_hraes.id_tbl_movimientos, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento, 
                                    tbl_plazas_empleados_hraes.id_tbl_empleados_hraes,
                                    CONCAT(tbl_movimientos.codigo,' - ',tbl_movimientos.nombre_movimiento),
                                    tbl_movimientos.tipo_movimiento,
                                    tbl_control_plazas_hraes.num_plaza
                            FROM central.tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                            ON central.tbl_plazas_empleados_hraes.id_tbl_movimientos = 
                                tbl_movimientos.id_tbl_movimientos
                            INNER JOIN central.tbl_control_plazas_hraes
                            ON central.tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes =
                                central.tbl_control_plazas_hraes.id_tbl_control_plazas_hraes
                            WHERE central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado
                            ORDER BY tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes DESC
                            LIMIT 3 OFFSET $paginator;");

        return $listado;
    }

    public function listarByBusqueda($idEmpleado, $paginator, $busqueda)
    {
        $listado = pg_query("SELECT tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes, 
                                    tbl_plazas_empleados_hraes.fecha_inicio, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento,
                                    tbl_plazas_empleados_hraes.id_tbl_movimientos, 
                                    tbl_plazas_empleados_hraes.fecha_movimiento, 
                                    tbl_plazas_empleados_hraes.id_tbl_empleados_hraes,
                                    CONCAT(tbl_movimientos.codigo,' - ',tbl_movimientos.nombre_movimiento),
                                    tbl_movimientos.tipo_movimiento,
                                    tbl_control_plazas_hraes.num_plaza
                            FROM central.tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                            ON tbl_plazas_empleados_hraes.id_tbl_movimientos = 
                                tbl_movimientos.id_tbl_movimientos
                            INNER JOIN central.tbl_control_plazas_hraes
                            ON central.tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes =
                                central.tbl_control_plazas_hraes.id_tbl_control_plazas_hraes
                            WHERE central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado
                            AND (TRIM(UPPER(UNACCENT(tbl_plazas_empleados_hraes.fecha_movimiento::TEXT))) 
                                    LIKE '%$busqueda%' OR
                                    TRIM(UPPER(UNACCENT(tbl_movimientos.nombre_movimiento::TEXT)))
                                    LIKE '%$busqueda%' OR
                                central.tbl_control_plazas_hraes.num_plaza LIKE '%$busqueda%'
                            )
                            ORDER BY tbl_plazas_empleados_hraes.id_tbl_plazas_empleados_hraes DESC
                            LIMIT 3 OFFSET $paginator;");
        return $listado;
    }

    public function listarByEdit($idMovimiento)
    {
        $listado = pg_query("SELECT id_tbl_plazas_empleados_hraes,fecha_inicio,
                                    fecha_termino,id_tbl_movimientos,fecha_movimiento,
                                    id_tbl_control_plazas_hraes,id_tbl_empleados_hraes,
                                    observaciones, motivo_estatus,id_cat_caracter_nom_hraes
                             FROM central.tbl_plazas_empleados_hraes
                             WHERE id_tbl_plazas_empleados_hraes = $idMovimiento;");
        return $listado;
    }

    public function listarByNull()
    {
        return $array = [
            'id_tbl_plazas_empleados_hraes' => null,
            'fecha_inicio' => null,
            'fecha_termino' => null,
            'id_tbl_movimientos' => null,
            'fecha_movimiento' => null,
            'id_tbl_control_plazas_hraes' => null,
            'id_tbl_empleados_hraes' => null,
            'id_cat_caracter_nom_hraes' => null,
            'motivo_estatus' => null,
            'observaciones' => null,
        ];
    }




    public function listarCountPlaza($id)
    {
        $listado = pg_query("SELECT COUNT(tbl_plazas_empleados_hraes)
                             FROM central.tbl_plazas_empleados_hraes
                             WHERE id_tbl_control_plazas_hraes = $id");
        return $listado;
    }




    public function listadoByIdPlaza($idEmpleado)
    {
        $listado = pg_query("SELECT id_tbl_control_plazas_hraes
                             FROM central.tbl_plazas_empleados_hraes
                             WHERE id_tbl_empleados_hraes = $idEmpleado
                             ORDER BY fecha_movimiento DESC
                             LIMIT 1");
        return $listado;
    }

    function editarByArray($conexion, $datos, $condicion, $name)
    {
        $pg_update = pg_update($conexion, $name, $datos, $condicion);
        return $pg_update;
    }

    function agregarByArray($conexion, $datos, $name)
    {
        $pg_add = pg_insert($conexion, $name, $datos);
        return $pg_add;
    }

    function eliminarByArray($conexion, $condicion, $name)
    {
        $pgs_delete = pg_delete($conexion, $name, $condicion);
        return $pgs_delete;
    }

    public function ultimoMovimientoByVal($idPlaza)
    {
        $listado = pg_query("SELECT tbl_movimientos.id_tipo_movimiento,
                                    tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes
                            FROM central.tbl_plazas_empleados_hraes
                            INNER JOIN tbl_movimientos
                                ON central.tbl_plazas_empleados_hraes.id_tbl_movimientos =
                                    tbl_movimientos.id_tbl_movimientos
                            WHERE id_tbl_empleados_hraes = (
                                SELECT id_tbl_empleados_hraes
                                FROM central.tbl_plazas_empleados_hraes
                                WHERE id_tbl_control_plazas_hraes = $idPlaza 
                                ORDER BY id_tbl_plazas_empleados_hraes DESC
                                LIMIT 1)
                            ORDER BY id_tbl_plazas_empleados_hraes DESC
                            LIMIT 1");
        return $listado;
    }

    public function countPlazasById($idPlaza)
    {
        $listado = pg_query("SELECT COUNT (id_tbl_plazas_empleados_hraes)
                             FROM central.tbl_plazas_empleados_hraes
                             WHERE id_tbl_control_plazas_hraes = $idPlaza;");
        return $listado;
    }


    ///LA FUNCION PERMITE SABER SI EXISTE INFORMACION EN LA BASE DEL EMPLEADO
    public function countUltimoMovimiento($idEmpleado)
    {
        $listado = pg_query("SELECT COUNT(id_tbl_plazas_empleados_hraes)
                                 FROM central.tbl_plazas_empleados_hraes 
                                 WHERE id_tbl_empleados_hraes = $idEmpleado");
        return $listado;
    }

    ///LA FUNCION TRAE EL ULTIMO MOVIMIENTO (ALTA, BAJA, MOVIMIENTO DEL EMPLEADO)
    public function listadoUltimoMovimiento($idEmpleado)
    {
        $listado = pg_query("SELECT tbl_movimientos.id_tipo_movimiento,
                                        tbl_plazas_empleados_hraes.fecha_movimiento
                                 FROM central.tbl_plazas_empleados_hraes 
                                 INNER JOIN tbl_movimientos
                                 ON central.tbl_plazas_empleados_hraes.id_tbl_movimientos =
                                    tbl_movimientos.id_tbl_movimientos
                                 WHERE central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado
                                 GROUP BY central.tbl_plazas_empleados_hraes.fecha_movimiento,
                                        tbl_movimientos.id_tipo_movimiento
                                 ORDER BY central.tbl_plazas_empleados_hraes.fecha_movimiento DESC
                                 LIMIT 1;");
        return $listado;
    }

    public function idPlazaMovimiento($idEmpleado)
    {
        $listado = pg_query("SELECT id_tbl_control_plazas_hraes
                                 FROM central.tbl_plazas_empleados_hraes
                                 WHERE id_tbl_empleados_hraes = $idEmpleado
                                 ORDER BY id_tbl_plazas_empleados_hraes DESC
                                 LIMIT 1;");
        return $listado;
    }

    //La funcion retorna el id de la plaza a la que esta actualmente asociado
    public function getMaxIdPlaza($schema, $idEmpleado){
        $isQuery = pg_query("SELECT 
                                $schema.tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes
                            FROM $schema.tbl_plazas_empleados_hraes
                            INNER JOIN public.tbl_movimientos
                                ON public.tbl_movimientos.id_tbl_movimientos = 
                                    $schema.tbl_plazas_empleados_hraes.id_tbl_movimientos
                            WHERE $schema.tbl_plazas_empleados_hraes.fecha_movimiento = (
                                                        SELECT MAX($schema.tbl_plazas_empleados_hraes.fecha_movimiento) 
                                                        FROM $schema.tbl_plazas_empleados_hraes
                                                        WHERE $schema.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado)
                            AND $schema.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = $idEmpleado
                            AND public.tbl_movimientos.id_tipo_movimiento <> 3; --> ES DISNTO DE BAJA");
        return $isQuery;
    }

    /*
    SELECT 
	central.tbl_empleados_hraes.id_tbl_empleados_hraes, 
		CASE 
			WHEN (SELECT EXISTS (
				   SELECT TRUE
				   FROM central.tbl_plazas_empleados_hraes
				   INNER JOIN central.tbl_control_plazas_hraes
					ON central.tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes =
						central.tbl_control_plazas_hraes.id_tbl_control_plazas_hraes
				   INNER JOIN public.tbl_movimientos
				   ON public.tbl_movimientos.id_tbl_movimientos = 
					  central.tbl_plazas_empleados_hraes.id_tbl_movimientos
					  WHERE central.tbl_plazas_empleados_hraes.fecha_movimiento = (
					   SELECT MAX(central.tbl_plazas_empleados_hraes.fecha_movimiento) 
					   FROM central.tbl_plazas_empleados_hraes
					   WHERE central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = 
							 central.tbl_empleados_hraes.id_tbl_empleados_hraes)
					  AND central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = 
							central.tbl_empleados_hraes.id_tbl_empleados_hraes
					AND public.tbl_movimientos.id_tipo_movimiento <> 3
			)) = TRUE THEN central.tbl_control_plazas_hraes.num_plaza 
			ELSE '-'
			END AS num_plaza,
			CASE 
			WHEN (SELECT EXISTS (
				   SELECT TRUE
				   FROM central.tbl_plazas_empleados_hraes
				   INNER JOIN central.tbl_control_plazas_hraes
					ON central.tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes =
						central.tbl_control_plazas_hraes.id_tbl_control_plazas_hraes
				   INNER JOIN public.tbl_movimientos
				   ON public.tbl_movimientos.id_tbl_movimientos = 
					  central.tbl_plazas_empleados_hraes.id_tbl_movimientos
					  WHERE central.tbl_plazas_empleados_hraes.fecha_movimiento = (
					   SELECT MAX(central.tbl_plazas_empleados_hraes.fecha_movimiento) 
					   FROM central.tbl_plazas_empleados_hraes
					   WHERE central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = 
							 central.tbl_empleados_hraes.id_tbl_empleados_hraes)
					  AND central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = 
							central.tbl_empleados_hraes.id_tbl_empleados_hraes
					AND public.tbl_movimientos.id_tipo_movimiento <> 3
			)) = TRUE THEN public.cat_entidad.entidad 
			ELSE '-'
			END AS zona_pagadora,
		central.tbl_empleados_hraes.rfc, 
		central.tbl_empleados_hraes.curp, 
		central.tbl_empleados_hraes.nombre, 
		central.tbl_empleados_hraes.primer_apellido,
	    central.tbl_empleados_hraes.segundo_apellido, 
		central.tbl_empleados_hraes.num_empleado,
		'MOVIMIENTO',
		CASE 
			WHEN (SELECT EXISTS (
				   SELECT TRUE
				   FROM central.tbl_plazas_empleados_hraes
				   INNER JOIN central.tbl_control_plazas_hraes
					ON central.tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes =
						central.tbl_control_plazas_hraes.id_tbl_control_plazas_hraes
				   INNER JOIN public.tbl_movimientos
				   ON public.tbl_movimientos.id_tbl_movimientos = 
					  central.tbl_plazas_empleados_hraes.id_tbl_movimientos
					  WHERE central.tbl_plazas_empleados_hraes.fecha_movimiento = (
					   SELECT MAX(central.tbl_plazas_empleados_hraes.fecha_movimiento) 
					   FROM central.tbl_plazas_empleados_hraes
					   WHERE central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = 
							 central.tbl_empleados_hraes.id_tbl_empleados_hraes)
					  AND central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes = 
							central.tbl_empleados_hraes.id_tbl_empleados_hraes
					AND public.tbl_movimientos.id_tipo_movimiento <> 3
			)) = TRUE THEN CONCAT (central.tbl_centro_trabajo_hraes.clave_centro_trabajo, ' - ',
									central.tbl_centro_trabajo_hraes.nombre)
			ELSE '-'
			END AS zona_pagadora
FROM central.tbl_empleados_hraes
LEFT JOIN central.tbl_plazas_empleados_hraes
	ON central.tbl_empleados_hraes.id_tbl_empleados_hraes =
		central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes
LEFT JOIN central.tbl_control_plazas_hraes
		ON central.tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes =
			central.tbl_control_plazas_hraes.id_tbl_control_plazas_hraes	
LEFT JOIN central.tbl_centro_trabajo_hraes
	ON central.tbl_control_plazas_hraes.id_tbl_centro_trabajo_hraes =
		central.tbl_centro_trabajo_hraes.id_tbl_centro_trabajo_hraes
LEFT JOIN public.cat_entidad
	ON central.tbl_centro_trabajo_hraes.id_cat_entidad =
		public.cat_entidad.id_cat_entidad
WHERE (central.tbl_plazas_empleados_hraes.fecha_movimiento = 
	(SELECT MAX(central.tbl_plazas_empleados_hraes.fecha_movimiento) 
	  FROM central.tbl_plazas_empleados_hraes
	   WHERE central.tbl_plazas_empleados_hraes.id_tbl_empleados_hraes 
					= central.tbl_empleados_hraes.id_tbl_empleados_hraes)
		OR central.tbl_plazas_empleados_hraes.fecha_movimiento IS NULL)		
		
        */
}
