DELETE FROM central.ctrl_asistencia
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.ctrl_estudios_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.ctrl_lengua
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.tbl_plazas_empleados_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.tbl_domicilios_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.ctrl_telefono_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.ctrl_medios_contacto_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.ctrl_especialidad_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.ctrl_cuenta_clabe_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.ctrl_adic_emp_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.ctrl_capacidad_dif_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);


DELETE FROM central.ctrl_asistencia
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);

DELETE FROM central.tbl_empleados_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'GUVF940922MHGTLL05'
		)
);



DELETE FROM central.tbl_control_plazas_hraes
WHERE id_tbl_control_plazas_hraes IN  (
SELECT 
	central.tbl_control_plazas_hraes.id_tbl_control_plazas_hraes
FROM central.tbl_control_plazas_hraes
LEFT JOIN central.tbl_plazas_empleados_hraes
	ON central.tbl_control_plazas_hraes.id_tbl_control_plazas_hraes =
		central.tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes
WHERE central.tbl_plazas_empleados_hraes.id_tbl_control_plazas_hraes IS NULL
)