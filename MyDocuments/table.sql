-- TABLE

--TABLE temp error carga masiva
CREATE TABLE IF NOT EXISTS tmp_error_dependientes_economicos(
	id_tmp_error_dependientes_economicos SERIAL PRIMARY KEY,
	rfc_empleado VARCHAR,
	curp_empleado VARCHAR,
	curp_menor VARCHAR,
	nombre VARCHAR,
	apellido_paterno VARCHAR,
	apellido_materno VARCHAR,
	estatus VARCHAR,
	descripcion TEXT
);
