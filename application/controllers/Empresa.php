<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct(){
        parent::__construct();
  
    }
    
    
    public function listar(){
        $this->load->model('empresas');     
        $empresas = $this->empresas->get_empresas();
        $titulo = array(
                        "titulo" => "Empresas",
                        "descricao" => ""
                    );
        
        $data = array(
                    "entidade" => "empresa",
                    "pagina" => "inicio",
                    "titulo" => $titulo,
                    "dados" => $empresas 
                );
        $this->load->view('layout/header', $data);
        $this->load->view('layout/menu-top-lateral', $data);
        $this->load->view('empresa/listar', $data);
        $this->load->view('layout/footer', $data);
    }
    
    public function cadastrar($alerta= null){
        
        
        $titulo = array(
                        
                        "titulo" => "Empresas",
                        "descricao" => ""
                    );
        
        $data = array(
                    "alerta" => $alerta,
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
    
    
    public function adicionar(){
        
        $alerta = null;
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome_fantasia', 'Nome Fantasia','required|min_length[5]');
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|min_length[18]|is_unique[empresas.cnpj]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[empresas.email]');
        if ($this->form_validation->run() == FALSE){

            $alerta = array(
                    "class" => "danger",
                    "mansagem" => "Atenção!" . validation_errors()
                );

        }else{
           
           $dados['cnpj'] = $this->input->post('cnpj');
           $dados['razao_social']= $this->input->post('razao_social');
           $dados['nome_fantasia'] = $this->input->post('nome_fantasia');
           $dados['telefone'] = $this->input->post('telefone');
           $dados['email'] = $this->input->post('email');
           $dados['site'] = $this->input->post('site');
           
           if($this->db->insert('empresas',$dados)){
                 $alerta = array(
                    "class" => "success",
                    "mansagem" => "Empresa cadastrada com sucesso!" 
                );
                 
                
            }else{
                $alerta = array(
                    "class" => "danger",
                    "mansagem" => "Atenção! Houve um erro ao processar seu cadastro<br/>" 
                );
            }
        }
        //Redireciona Internamente para o cadastro
        $this->cadastrar($alerta);
      
    }

}
