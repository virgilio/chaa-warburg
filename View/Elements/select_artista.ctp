<?php 
if(isset($artista)){
  echo $this->Form->input('artista_id', 
                          array('label' => '', 
                                'class' => 'input_chosen', 
                                'name' =>  'data[Obra][artista_id]',
                                'data-placeholder' => 'Selecione Artista', 'value' => $artista)); 
} 

?>            