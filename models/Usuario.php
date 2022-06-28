<?php

namespace Model;

class Usuario extends ActiveRecord {

    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'correo', 'password'];


    public $id;
    public $nombre;
    public $apellido;
    public $correo;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validarLogin(){
        if(!$this->correo){
            self::$alertas['error'][] = 'El email es Obligatorio';
        }

        if(!$this->password){
            self::$alertas['error'][] = 'El password es Obligatorio';
        }

        return self::$alertas;
    }


    public function comprobarPassword($password){
        

        $query = "SELECT * FROM usuario WHERE password = '".$password."'";
        $resultado = self::$db->query($query);
        if($resultado->num_rows){
            return true;
        }else{
            self::$alertas['error'][] = 'Password Incorrecto';
        }

    }

}