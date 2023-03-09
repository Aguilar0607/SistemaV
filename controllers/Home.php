<?php

class Home extends Controller{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        // print_r($this->model->getDatos($parametro));
        // $data = $this->model->getDatos($parametro);
        $data['title'] = 'Login';
        $this->views->View('principal', 'login', $data);
        // echo 
        // echo 'Mensaje desde el controlador: '. $parametro;
    }
    // Validar Formulario de login
    public function validar()
    {
        if (isset($_POST['correo']) && isset($_POST['clave'])) {
            if (empty($_POST['correo'])) {
                $res = array('msg' => 'Email required back', 'type' => 'warning');
            }else if (empty($_POST['clave'])) {
                $res = array('msg' => 'Password required back', 'type' => 'warning');
            }else {
                $correo = strClean($_POST['correo']);
                $clave = strClean($_POST['clave']);
                $data = $this->model->getDatos($correo);
                if (empty($data)) {
                    $res = array('msg' => 'Email doesnt exist back', 'type' => 'warning');
                }else {
                    if (password_verify($clave, $data['clave'])) {
                        $_SESSION['nombre_usuario'] = $data['nombre'];
                        $_SESSION['correo_usuario'] = $data['correo'];
                        $res = array('msg' => 'Datos correctos back', 'type' => 'success');
                    }else {
                        $res = array('msg' => 'Password verify error back', 'type' => 'warning');
                    }
                }

            }
            
        }else {
            $res = array('msg' => 'Error desconocido back', 'type' => 'error');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }
}

?>