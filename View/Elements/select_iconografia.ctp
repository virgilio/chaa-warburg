<?php 
if(isset($iconografia)){
  echo $this->Form->input('iconografia_id', 
                          array('label' => '', 
                                'class' => 'input_chosen', 
                                'name' =>  'data[Obra][iconografia_id]',
                                'data-placeholder' => 'Selecione Iconografia', 'value' => $iconografia)); 
} 

?>            