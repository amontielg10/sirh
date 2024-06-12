<?php


class CatNacionalidadC
{
    private $mexicana = 'MEXICANA';
    private $extranjero = 'EXTRAJERO';
    function selectByAll()
    {
        $options = '<option value="">Seleccione</option>';
        $options .= '<option value="MEXICANA">MEXICANA</option>';
        $options .= '<option value="EXTRAJERO">EXTRAJERO</option>';
        return $options;
    }

    function selectById($resultados)
    {
        $options = '<option value="' . $resultados. '">' . $resultados. '</option>';
            if ($resultados != 'MEXICANA') {
                $options .= '<option value="' . 'MEXICANA' . '">' . 'MEXICANA' . '</option>';
            } else {
                $options .= '<option value="' . 'EXTRAJERO' . '">' . 'EXTRAJERO' . '</option>';
            }
        
        return $options;
    }
}
