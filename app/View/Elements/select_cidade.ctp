<?php 
if(isset($cidade)){
  echo $this->Form->input('cidade_id', 
                          array('label' => '', 
                                'class' => 'input_chosen', 
                                'name' =>  'data[Instituicao][cidade_id]',
                                'data-placeholder' => 'Selecione uma cidade', 'value' => $cidade)); 
} 

?>