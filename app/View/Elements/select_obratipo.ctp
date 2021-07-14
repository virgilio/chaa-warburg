<?php 
if(isset($obratipo)){
  echo $this->Form->input('obra_tipos_id', 
                          array('label' => '', 
                                'class' => 'input_chosen', 
                                'name' =>  'data[Obra][obra_tipos_id]',
                                'data-placeholder' => 'Selecione uma Técnica', 'value' => $obratipo)); 
} 

?>