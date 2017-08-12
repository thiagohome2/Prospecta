<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Model {
       function get_empresas(){
         //Carrega base padrão
        $DB1 = $this->load->database('default',TRUE);
        
        //Consulta Email na base de convênios
        $sql = "SELECT * FROM empresas ORDER BY nome_fantasia ASC";
        //echo $sql."<br/><br/>";
        $empresas = $DB1->query($sql);
        
        $row =  $empresas->row_array();
        
        //print_r($row);
        //Se existe Convênio
        if (isset($row))
        {
            return $empresas;
        }  else {
            return NULL;
        }
    }
    function adicionar_empresa($dados){
         //Carrega base padrão
        $DB1 = $this->load->database('default',TRUE);
        print_r($dados);
        //Consulta Email na base de convênios
        $sql = "INSERT INTO empresas` "
                . "(`cnpj`,"
                . " `razao_social`,"
                . " `nome_fantasia`,"
                . " `telefone`,"
                . " `email`,"
                . " `site`)"
                . "VALUES ('13.470.423/0001-17',"
                . " 'Thiago de Oliveira',"
                . " 'Idéia Reciclavel',"
                . " '(47)34365250',"
                . " 'thiago@ideiareciclavel.com.br',"
                . " 'www.ideiareciclavel.com.br');";
        
//echo $sql."<br/><br/>";
        $empresas = $DB1->query($sql);
        
        $row =  $empresas->row_array();

        //Se existe Convênio
        if (isset($row))
        {
            return TRUE;
        }  else {
            return FALSE;
        }
    }
    //INSERT INTO `prospecta`.`empresas` (`cnpj`, `razao_social`, `nome_fantasia`, `telefone`, `email`, `site`) VALUES ('13.470.423/0001-17', 'Thiago de Oliveira', 'Idéia Reciclavel', '(47)34365250', 'thiago@ideiareciclavel.com.br', 'www.ideiareciclavel.com.br');
}