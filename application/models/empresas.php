<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Model {
    
    //Busca todos os funcionarios da empresa conveniada que no caso é cliente da farmácia
    public function get_clientes($codigo_convenio){
        
        //Carrega base padrão
        $DB1 = $this->load->database('default',TRUE);
        
        //Consulta Email na base de convênios
        $sql = "SELECT * FROM CLIENTES WHERE CONVENIO = '".$codigo_convenio."' ORDER BY NOME ASC";
        //echo $sql."<br/><br/>";
        $varcli = $DB1->query($sql);
        
        $row = $varcli->row_array();
        
        //print_r($row);
        //Se existe Convênio
        if (isset($row))
        {
            return $varcli;
        }  else {
            return NULL;
        }
    }
    
    public function get_compras($codigo){
        //Carrega base padrão
        $DB1 = $this->load->database('default',TRUE);
        
        //Consulta Email na base de convênios
        $sql = "SELECT * FROM VENDAS WHERE CLIENTE = '".$codigo."' ORDER BY DATA ASC";
        //echo $sql."<br/><br/>";
        $varvem = $DB1->query($sql);
        
        $rows = $varvem->row_array();

        if (isset($rows))
        {
            return $varvem->result_array();
        }  else {
            return NULL;
        }
    }
    
    public function save_limite_func($codigo, $valor){
        
        
        //Carrega base padrão
        $DB1 = $this->load->database('default',TRUE);
        
        $sql = "UPDATE CLIENTES SET LIMITE = '".$valor."' WHERE CODIGO = '".$codigo."'";
        //echo "<h1>".$sql."</h1>";
        if($DB1->query($sql))
        {
            return "1";
        }
        else
        {
            return "2";
        }
    }
    
    public function atualiza_status_func($codigo, $valor){
        
        
        //Carrega base padrão
        $DB1 = $this->load->database('default',TRUE);
        
        if($valor){
            $status = 'ATIVO'; 
        }else{
            $status = 'INATIVO'; 
        }
        
        $sql = "UPDATE CLIENTES SET STATUS = '".$status."' WHERE CODIGO = '".$codigo."'";
        //echo "<h1>".$sql."</h1>";
        if($DB1->query($sql))
        {
            return "1";
        }
        else
        {
            return "2";
        }
    }
    
}


