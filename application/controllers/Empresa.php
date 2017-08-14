<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller {

    public function __construct(){
        parent::__construct();
  
    }
    
     function validar_cnpj($cnpj)
    {
	$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
	// Valida tamanho
	if (strlen($cnpj) != 14)
		return false;
	// Valida primeiro dígito verificador
	for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
		return false;
	// Valida segundo dígito verificador
	for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
	{
		$soma += $cnpj{$i} * $j;
		$j = ($j == 2) ? 9 : $j - 1;
	}
	$resto = $soma % 11;
	return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }
    
    public function listar($alerta= null){
        $this->load->model('empresas');     
        $empresas = $this->empresas->get_empresas();
        $titulo = array(
                        "titulo" => "Empresas",
                        "descricao" => ""
                    );
        
        $data = array(
                    "alerta" => $alerta,
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
    
    public function cadastrar(){
        
        $alerta= null;
        
        if (!empty($this->input->post('salvar'))){
              
            $this->load->library('form_validation');
            $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|min_length[18]|is_unique[empresas.cnpj]');
            $this->form_validation->set_rules('razao_social', 'Razão social','required|min_length[5]');
            $this->form_validation->set_rules('nome_fantasia', 'Nome Fantasia','required|min_length[5]');
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email|is_unique[empresas.email]');
            if ($this->form_validation->run() == FALSE){

                $alerta = array(
                        "class" => "danger",
                        "mansagem" => "Atenção!" . validation_errors()
                    );
            }else{
                
                $cnpj = $this->input->post('cnpj');
                
                if ($this->validar_cnpj($cnpj) == FALSE){
                    $alerta = array(
                        "class" => "danger",
                        "mansagem" => "Atenção! CNPJ Inválido!"
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
                             "mansagem" => "Atenção! Houve um erro ao adicionar empresa<br/>" 

                        );
                    }
                }
            }
        }    
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
    //AJAX alterar empresa
    function alterar(){
        if (!empty($this->input->post('cnpj'))){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('razao_social', 'Razõo social','required|min_length[5]');
            $this->form_validation->set_rules('nome_fantasia', 'Nome Fantasia','required|min_length[5]');
            $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email');
            if ($this->form_validation->run() == FALSE){
                
                $tipo = 2;
                $mansagem = "Atenção!" . validation_errors(); 
                
            }else{
        
                $id = $this->input->post('id');
                //$cnpj = $this->input->post('cnpj');
                $razao_social= $this->input->post('razao_social');
                $nome_fantasia = $this->input->post('nome_fantasia');
                $telefone = $this->input->post('telefone');
                $email = $this->input->post('email');
                $site = $this->input->post('site');


                $data = array(
                    'razao_social' => $razao_social,
                    'nome_fantasia' => $nome_fantasia,
                    'telefone' => $telefone,
                    'email' => $email,
                    'site' => $site
                );

                $this->db->where('id', $id);
                if($this->db->update('empresas', $data)){
                    $tipo = 3;
                    $mansagem = "Empresa alterada com sucesso!"; 
                }else{
                    $tipo = 2;
                    $mansagem = "Atenção! Houve um erro ao altera empresa"; 
                }
            }
        }    
        $retorno = array( 
            'tipo' => $tipo,
            'msg' => $mansagem,    
        );
        
        //Tem que imprimir para retorno 
        echo json_encode($retorno);
        
    }
    function excluir(){
        
         $id = $this->input->post('id');
        
        if( $this->db->delete('empresas', array('id' => $id))){
            $tipo = 3;
            $mansagem = "Empresa excluida com sucesso!";
       }else{
            $tipo = 2;
            $mansagem = "Atenção! Houve um erro ao excluir empresa"; 
           
       }
        $retorno = array( 
            'tipo' => $tipo,
            'msg' => $mansagem,    
        );
        
        //Tem que imprimir para retorno 
        echo json_encode($retorno);
    }
    
}
