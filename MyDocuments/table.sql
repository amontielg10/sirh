
-- --SCRIPT NEW
DROP TABLE IF EXISTS ctrl_juguetes_hraes;
CREATE TABLE IF NOT EXISTS public.ctrl_juguetes_hraes
(
    id_ctrl_juguetes_hraes SERIAL PRIMARY KEY,
    id_cat_fecha_juguetes integer,
    id_cat_estatus_juguetes integer,
    id_tbl_empleados_hraes integer,
    id_ctrl_dependientes_economicos_hraes integer,
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











DROP TABLE IF EXISTS ctrl_retardo_hraes;
CREATE TABLE IF NOT EXISTS ctrl_retardo_hraes(
	id_ctrl_retardo_hraes SERIAL PRIMARY KEY,
	fecha DATE,
	hora_entrada INTEGER,
	minuto_entrada INTEGER,
	hora_salida INTEGER,
	minuto_salida INTEGER,
	id_tbl_empleados_hraes INTEGER
);

DROP TABLE IF EXISTS ctrl_juguetes_hraes;
CREATE TABLE IF NOT EXISTS public.ctrl_juguetes_hraes
(
    id_ctrl_juguetes_hraes SERIAL PRIMARY KEY,
    id_cat_fecha_juguetes integer,
    id_cat_estatus_juguetes integer,
    id_tbl_empleados_hraes integer,
    id_ctrl_dependientes_economicos_hraes integer,
);

DROP TABLE IF EXISTS ctrl_dependientes_economicos_hraes;
CREATE TABLE IF NOT EXISTS ctrl_dependientes_economicos_hraes (
	id_ctrl_dependientes_economicos_hraes SERIAL PRIMARY KEY,
	curp character varying(20) NOT NULL,
	nombre character varying(40) COLLATE pg_catalog."default",
    apellido_materno character varying(40) COLLATE pg_catalog."default",
    apellido_paterno character varying(40) COLLATE pg_catalog."default",
    id_tbl_empleados_hraes integer,
    id_cat_dependientes_economicos integer
);
	
DROP TABLE IF EXISTS cat_dependientes_economicos;
CREATE TABLE IF NOT EXISTS cat_dependientes_economicos(
	id_cat_dependientes_economicos SERIAL PRIMARY KEY,
	clave VARCHAR(10),
	nombre VARCHAR(40)
);
INSERT INTO cat_dependientes_economicos (clave,nombre) VALUES
('03', 'Hijo'),
('02', 'Conyuge'),
('01', 'Padre/Madre');






	-- ------------------------
	-- -------------------------
	-- ------------------------
DROP TABLE IF EXISTS bitacora_hraes;
CREATE TABLE IF NOT EXISTS bitacora_hraes(
	id_bitacora_hraes SERIAL PRIMARY KEY,
	nombre_tabla VARCHAR(60) NOT NULL,
	accion VARCHAR(30) NOT NULL,
	valores TEXT NOT NULL,
	fecha TIMESTAMP NOT NULL,
	id_users INTEGER NOT NULL
)



-----------------
-----------------
-----------------
-----------------

DROP TABLE IF EXISTS cat_carga_masiva;
CREATE TABLE IF NOT EXISTS cat_carga_masiva(
	id_cat_carga_masiva SERIAL PRIMARY KEY,
	nombre VARCHAR(60)
);

INSERT INTO cat_carga_masiva (nombre) VALUES
('Modulo juguetes (Dependientes economicos)'),
('Modulo juguetes (Dependientes economicos - pago)');

TRUNCATE ctrl_carga_masiva RESTART IDENTITY; 
--- Cambiar el tipo de dato tipo_carga = id_cat_carga_masiva = integer
--- Agregar columna a ctrl_juguetes -> monto varchar(10);








--------------------
--------------------
-------------------- TABLE

DROP TABLE IF EXISTS ctrl_carga_masiva;
CREATE TABLE IF NOT EXISTS ctrl_carga_masiva (
	id_ctrl_carga_masiva SERIAL PRIMARY KEY,
	tipo_carga VARCHAR(50),
	id_usuario INTEGER,
	fecha TIMESTAMP
)

DROP TABLE IF EXISTS ctrl_error_dependientes_economicos;
CREATE TABLE IF NOT EXISTS ctrl_error_dependientes_economicos(
	id_ctrl_error_dependientes_economicos SERIAL PRIMARY KEY,
	rfc_empleado VARCHAR,
	curp_empleado VARCHAR,
	curp_menor VARCHAR,
	nombre VARCHAR,
	apellido_paterno VARCHAR,
	apellido_materno VARCHAR,
	estatus VARCHAR,
	descripcion TEXT,
	linea_exel INTEGER,
	id_carga_masiva INTEGER
);

--TABLE temp error carga masiva
DROP TABLE IF EXISTS ctrl_error_dependientes_economicos
CREATE TABLE IF NOT EXISTS ctrl_error_dependientes_economicos(
	id_ctrl_error_dependientes_economicos SERIAL PRIMARY KEY,
	rfc_empleado VARCHAR,
	curp_empleado VARCHAR,
	curp_menor VARCHAR,
	nombre VARCHAR,
	apellido_paterno VARCHAR,
	apellido_materno VARCHAR,
	estatus VARCHAR,
	descripcion TEXT
);

-----------------------------------------------
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
	id_tbl_dependientes_economicos INTEGER,
	id_ctrl_carga_masiva INTEGER
)
---------------------------------------------------





-- 
DROP TABLE IF EXISTS ctrl_carga_masiva;
CREATE TABLE IF NOT EXISTS ctrl_carga_masiva (
	id_ctrl_carga_masiva SERIAL PRIMARY KEY,
	tipo_carga VARCHAR(50),
	id_usuario INTEGER,
	fecha TIMESTAMP
)

--- YA
-- SCRIPT 1.1
INSERT INTO rol (id_rol,nombre, descripcion) VALUES 
(1, 'ROL ADMINISTRADOR', 'Permite el acceso total a los modulos del sistema'),
(2, 'ROL CENTRAL', 'Permite el acceso al modulo central del sistema'),
(3, 'ROL HRAES', 'Permite el acceso al modulo hraes del sistema'),
(4, 'ROL FEDERALIZADA', 'Permite el acceso al modulo federalizada del sistema');