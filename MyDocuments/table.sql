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

DROP TABLE IF EXISTS cat_fecha_juguetes;
CREATE TABLE IF NOT EXISTS cat_fecha_juguetes (
	id_cat_fecha_juguetes SERIAL PRIMARY KEY,
	fecha VARCHAR(30),
	anio INTEGER,
	mes INTEGER,
	dia INTEGER
);

INSERT INTO cat_fecha_juguetes (fecha,anio,mes,dia) VALUES 
('2023-01-06',2023,1,6),
('2024-01-06',2023,1,6),
('2025-01-06',2023,1,6),
('2026-01-06',2023,1,6);

DROP TABLE IF EXISTS cat_estatus_juguetes;
CREATE TABLE IF NOT EXISTS cat_estatus_juguetes (
	id_cat_estatus_juguetes SERIAL PRIMARY KEY,
	estatus VARCHAR(30)
);

INSERT INTO cat_estatus_juguetes (estatus) VALUES 
('NO PAGADO'),
('PAGADO');

DROP TABLE IF EXISTS ctrl_juguetes;
CREATE TABLE IF NOT EXISTS ctrl_juguetes (
	id_ctrl_juguetes SERIAL PRIMARY KEY,
	id_cat_fecha_juguetes INTEGER,
	id_cat_estatus_juguetes INTEGER,
	id_tbl_empleados INTEGER,
	id_tbl_dependientes_economicos INTEGER
)