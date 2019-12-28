<?php 
if(isset($instituicao)){
  echo $this->Form->input('instituicao_id', 
                          array('label' => '', 
                                'class' => 'input_chosen', 
                                'name' =>  'data[Obra][instituicao_id]',
                                'data-placeholder' => 'Selecione uma Instituicao', 'value' => $instituicao)); 
} 

?>