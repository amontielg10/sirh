-- CREATE INDEX

-- TABLE cat_entidad
CREATE INDEX cat_entidad_pk_ix ON cat_entidad (id_cat_entidad, entidad);

-- TABLE tbl_control_plazas
CREATE INDEX tbl_control_plazas_all_ix ON tbl_control_plazas (
	id_tbl_control_plazas, num_plaza
);

-- TABLE tbl_control_plazas
CREATE INDEX tbl_control_plazas_all_sn_ix ON tbl_control_plazas (
	id_tbl_control_plazas, num_plaza, id_cat_plazas, id_cat_tipo_contratacion,
	id_cat_unidad_reponsable, id_cat_puesto, id_cat_zonas_tabuladores,
	id_cat_niveles, zona_pagadora, fecha_ini_contrato, fecha_fin_contrato, 
	fecha_modificacion
);

-- TABLE tbl_centro_trabajo
CREATE INDEX tbl_centro_trabajo_inf_ix ON tbl_centro_trabajo(
	id_tbl_centro_trabajo, clave_centro_trabajo, 
    codigo_postal, nombre
);

-- TABLE tbl_centro_trabajo
CREATE INDEX tbl_centro_trabajo_all_ix ON tbl_centro_trabajo (
	id_tbl_centro_trabajo, clave_centro_trabajo, nombre,
	pais, id_cat_entidad, colonia, codigo_postal, num_exterior,
    num_interior, latitud, longitud, id_cat_region, id_estatus_centro
);