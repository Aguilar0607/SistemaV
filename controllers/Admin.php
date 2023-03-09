<?php

class Admin extends Controller{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        // print_r($this->model->getDatos($parametro));
        // $data = $this->model->getDatos($parametro);
        // $data['title'] = 'Login';
        // $this->views->View('principal', 'login', $data);
        // echo 
        // echo 'Mensaje desde el controlador: '. $parametro;
        print_r($_SESSION);
    }
}

?>