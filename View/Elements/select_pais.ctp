<?php 
if(isset($pais)){
  echo $this->Form->input('pais_id', 
                          array('label' => '', 
                                'class' => 'input_chosen', 
                                'name' =>  'data[Cidade][pais_id]',
                                'data-placeholder' => 'Selecione o país', 'value' => $pais)); 
} 

?>             