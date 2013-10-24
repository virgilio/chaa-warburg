<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {
  
  /**
   * Controller name
   *
   * @var string
   */
  public $name = 'Pages';
  
  /**
   * This controller does not use a model
   *
   * @var array
   */
  public $uses = array();
  
  /**
   * Displays a view
   *
   * @param mixed What page to display
   * @return void
   */
  public function display() {
    $path = func_get_args();
    
    $count = count($path);
    if (!$count) {
      $this->redirect('/');
    }
    $page = $subpage = $title_for_layout = null;

    if (!empty($path[0])) {
      $page = $path[0];
    }
    if (!empty($path[1])) {
      $subpage = $path[1];
    }
    if (!empty($path[$count - 1])) {
      $title_for_layout = Inflector::humanize($path[$count - 1]);
    }

    
    parent::searchDataLoader();

    $obraTipos = $this->Obra->ObraTipo->find('list');
    $iconografias = $this->Obra->Iconografia->find('list');
    $this->set('obraTipos', $obraTipos);
    $this->set('iconografias', $iconografias);
    $obras = $this->Obra->find('all', 
                               array('fields' => array(
                                                       'Obra.imagem', 
                                                       'Obra.nome', 
                                                       'Obra.id'), 
                                     'limit' => 5, 
                                     'order' => 'Obra.created desc'));
    $this->set('lastObras', $obras);
    $this->set('numObras', $this->Obra->find('count'));
    
    $this->loadModel('ObrasRelacionada');
    $this->set('numRelacionamentos', $this->ObrasRelacionada->find('count'));

    $this->loadModel('Users');
    $this->set('numPesquisadores', $this->Users->find('count'));
    
    $this->set(compact('page', 'subpage', 'title_for_layout'));
    $this->render(implode('/', $path));
  }
}
