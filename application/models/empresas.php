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
}