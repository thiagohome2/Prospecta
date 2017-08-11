/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function save_limite_func(codigo){      
    $.ajax({
        url : "<?php echo base_url();?>empresa/save_limite_func",
        type: "POST",
        dataType : "json",
        data : {"codigo" : codigo,"valor" : $("#limite-func-"+codigo).val()},  
        success: 
             function(data){
               console.log(data);
            
             }
     });

}
  
