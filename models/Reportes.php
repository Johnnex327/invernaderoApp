<?php

namespace Model;

class Reportes extends ActiveRecord {

    protected static $tabla = 'control_riego';
    protected static $columnasDB = ['id', 'fecha', 'riegos','h_suelo', 'temperatura', 'h_relativa', 'id_micro'];


    public $id;
    public $fecha;
    public $riegos;
    public $h_suelo;
    public $temperatura;
    public $h_relativa;
    public $id_micro;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->fecha = $args['fecha'] ?? '';
        $this->riegos = $args['riegos'] ?? '';
        $this->h_suelo = $args['h_suelo'] ?? '';
        $this->temperatura = $args['temperatura'] ?? '';
        $this->h_relativa = $args['h_relativa'] ?? '';
        $this->id_micro = $args['id_micro'] ?? '';
    }


}