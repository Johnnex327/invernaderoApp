<?php

namespace Model;

class Configuracion extends ActiveRecord {

    protected static $tabla = 'configuracion';
    protected static $columnasDB = ['id', 'tiempo_riego', 'frecu_escaneado', 'porc_minimo', 'porc_maximo', 'noti_riego'];


    public $id;
    public $tiempo_riego;
    public $frecu_escaneado;
    public $porc_minimo;
    public $porc_maximo;
    public $noti_riego;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tiempo_riego = $args['tiempo_riego'] ?? '';
        $this->frecu_escaneado = $args['frecu_escaneado'] ?? '';
        $this->porc_minimo = $args['porc_minimo'] ?? '';
        $this->porc_maximo = $args['porc_maximo'] ?? '';
    }


}