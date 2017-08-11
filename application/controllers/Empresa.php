<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct(){
        parent::__construct();
  
    }
    
    
    public function listar(){

        //$this->load->model('empresas');
        
        //$empresas = $this->empresas->get_empresas();
        
        $titulo = array(
                        
                        "titulo" => "Empresas",
                        "descricao" => ""
                    );
        
        $data = array(
                    "entidade" => "empresa",
                    "pagina" => "inicio",
                    "titulo" => $titulo,
                    "dados" => '' 
                );
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu-top-lateral', $data);
        $this->load->view('empresa/listar', $data);
        $this->load->view('layout/footer', $data);
    }
    public function cadastrar(){
        
        $titulo = array(
                        
                        "titulo" => "Empresas",
                        "descricao" => ""
                    );
        
        $data = array(
                    "entidade" => "empresa",
                    "pagina" => "inicio",
                    "titulo" => $titulo,
                    "dados" => '' 
                );
        
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu-top-lateral', $data);
        $this->load->view('empresa/cadastrar', $data);
        $this->load->view('layout/footer', $data);
    }
    public function editar(){
        
        
    }
    public function ativar_desativar_empresa(){
        
    }
    
}
