DELETE FROM central.ctrl_asistencia
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.ctrl_estudios_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.ctrl_lengua
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.tbl_plazas_empleados_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.tbl_domicilios_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.ctrl_telefono_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.ctrl_medios_contacto_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.ctrl_especialidad_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.ctrl_cuenta_clabe_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.ctrl_adic_emp_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.ctrl_capacidad_dif_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);


DELETE FROM central.ctrl_asistencia
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
		)
);

DELETE FROM central.tbl_empleados_hraes
WHERE id_tbl_empleados_hraes IN (
			SELECT
			central.tbl_empleados_hraes.id_tbl_empleados_hraes
		FROM central.tbl_empleados_hraes
		WHERE curp IN (
		'DIMN960830MMSZRH04',
		'RUTF931122MMSZPB07',
		'SESL900317MMSRTG07',
		'AADE940822MGRLZL00',
		'HEMA870417MMSRRN09',
		'CAML931107MMSSRL02',
		'GANP980701MMSRGL07',
		'SAME980328MVZLRS01'
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