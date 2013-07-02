<?php 
if(isset($instituicao)){
  echo $this->Form->input('instituicao_id', 
                          array('label' => '', 
                                'class' => 'fixme_input_chosen', 
                                'name' =>  'data[Obra][instituicao_id]',
                                'data-placeholder' => 'Selecione uma Instituicao', 'value' => $instituicao)); 
} 

?>