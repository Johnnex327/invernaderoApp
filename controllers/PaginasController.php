<?php


namespace Controllers;

use Dotenv\Store\StringStore;
use LDAP\Result;
use MVC\Router;
use Model\Usuario;
use Model\Configuracion;
use Model\Reportes;



class PaginasController
{

    public static function login(Router $router)
    {
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();

            if (empty($alertas)) {

                $usuario = Usuario::where('correo', $auth->correo);

                if ($usuario) {

                    if ($usuario->comprobarPassword($auth->password)) {

                        session_start();

                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION['correo'] = $usuario->correo;
                        $_SESSION['login'] = true;

                        header('Location: /');
                    }
                } else {
                    Usuario::setAlerta('error', 'Usuario no encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->render('paginas/login', [
            'alertas' => $alertas
        ]);
    }

    public static function monitoreo(Router $router)
    {

        $router->render('paginas/monitoreo', []);
    }

    public static function configuracion(Router $router)
    {
        $configuracion = Configuracion::all();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = $_POST;

            $configuracion[0]->sincronizar($args);


            $resultado = $configuracion[0]->guardar();

            if ($resultado) {
                header('location: /configuracion');
            }
        }
        $router->render('paginas/configuracion', [

            'configuracion' => $configuracion,
        ]);
    }

    public static function reportes(Router $router)
    {
        $riegos_7dias = static::ultimosDias(7, 'riegos');
        $riegos_14dias = static::ultimosDias(14, 'riegos');
        $riegos_30dias = static::ultimosDias(30, 'riegos');

        $h_suelo_7dias = static::ultimosDias(7, 'h_suelo');
        $h_suelo_14dias = static::ultimosDias(14, 'h_suelo');
        $h_suelo_30dias = static::ultimosDias(30, 'h_suelo');

        $temperatura_7dias = static::ultimosDias(7, 'temperatura');
        $temperatura_14dias = static::ultimosDias(14, 'temperatura');
        $temperatura_30dias = static::ultimosDias(30, 'temperatura');

        $h_relativa_7dias = static::ultimosDias(7, 'h_relativa');
        $h_relativa_14dias = static::ultimosDias(14, 'h_relativa');
        $h_relativa_30dias = static::ultimosDias(30, 'h_relativa');



        $router->render('paginas/reportes', [
            "h_suelo_7dias" => $h_suelo_7dias,
            "h_suelo_14dias" => $h_suelo_14dias,
            "h_suelo_30dias" => $h_suelo_30dias,

            "temperatura_7dias" => $temperatura_7dias,
            "temperatura_14dias" => $temperatura_14dias,
            "temperatura_30dias" => $temperatura_30dias,

            "h_relativa_7dias" => $h_relativa_7dias,
            "h_relativa_14dias" => $h_relativa_14dias,
            "h_relativa_30dias" => $h_relativa_30dias,

            "riegos_7dias" => $riegos_7dias,
            "riegos_14dias" => $riegos_14dias,
            "riegos_30dias" => $riegos_30dias
        ]);
    }

    public static function logout(Router $router)
    {
        session_start();

        $_SESSION = [];

        header('Location: /login');

    }

    public static function setData(Router $router){
        
        $router->render('../includes/setData', [
            
        ]);
    }


    public static function ultimosDias($dias, $campoBaseDatos)
    {
        $resultados = Reportes::consultaXDias($dias);

        $cont = 0;
        $sumaDias = 0;

        foreach ($resultados as $value) {
            $sumaDias += $resultados[$cont]->$campoBaseDatos;
            $cont += 1;
        }
        $h_suelo = number_format($sumaDias / $dias);
        if ($campoBaseDatos === "riegos") {
            return $sumaDias;
        } else {
            return $h_suelo;
        }
    }
}
