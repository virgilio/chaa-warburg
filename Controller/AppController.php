<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');
App::uses('AuthComponent', 'Controller/Component');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  public $components = array(
                             'Session',
                             'Auth' => array(
                                             'loginAction' => array('prefix' => false, 'admin' => false, 'controller' => 'users', 'action' => 'login'),
                                             'loginRedirect' => array('controller' => 'obras', 'action' => 'index', 
                                              'admin' => true,
                                              'prefix' => 'admin'),
                                             'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
                                             'authenticate' => array('Form' => array(
                                                                                     'fields' => array('username' => 'email')
                                                                                     )
                                                                     ),
                                             'authorize' => array('Controller'),
                                             'authError' => 'Você não está autorizado(a) a entrar aqui.'
                                             ),
                             );
  
  function beforeFilter() {
    $this->Auth->allow('index', 'view', 'display', 'search', 'login', 'register');
    if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
      $this->layout = 'admin';
    } 

    $this->set('auth', $this->Auth->user());
  }
  
  function isAuthorized() {
    if (!empty($this->params['prefix']) && $this->params['prefix'] == 'admin') {
      if ($this->Auth->user('role') != 'admin') {
        return false;
      }
    }
    return true;
  }


  function searchDataLoader(){
    $this->loadModel('Obra');

    $artistas = $this->Obra->Artista->find('all', array('recursive' => -1, 'fields' => array('Artista.nome')));
    $artistas_list = array();
    foreach($artistas as $artista) {
      $artistas_list = array_merge($artistas_list, array($artista['Artista']['nome']));
    }
    $this->set('artistas_list', json_encode($artistas_list));

    $instituicoes = $this->Obra->Instituicao->find('all', array('recursive' => -1, 'fields' => array('Instituicao.nome')));
    $instituicoes_list = array();
    foreach($instituicoes as $instituicao) {
      $instituicoes_list = array_merge($instituicoes_list, array($instituicao['Instituicao']['nome']));
    }
    $this->set('instituicoes_list', json_encode($instituicoes_list));

    $this->loadModel('Pais');
    $paises = $this->Pais->find('all', array('recursive' => -1, 'fields' => array('Pais.nome')));
    $paises_list = array();
    foreach($paises as $pais) {
      $paises_list = array_merge($paises_list, array($pais['Pais']['nome']));
    }
    $this->set('paises_list', json_encode($paises_list));

    $this->loadModel('Cidade');
    $cidades = $this->Cidade->find('all', array('recursive' => -1, 'fields' => array('Cidade.nome')));
    $cidades_list = array();
    foreach($cidades as $cidade) {
      $cidades_list = array_merge($cidades_list, array($cidade['Cidade']['nome']));
    }
    $this->set('cidades_list', json_encode($cidades_list));

    $ano_inicio = $this->Obra->query('select min(ano_inicio) from obras');
    $ano_fim = $this->Obra->query('select max(ano_fim) from obras');

    $letters = $this->Obra->query('SELECT count(DISTINCT SUBSTRING(`nome`, 1, 1)) FROM `obras` ORDER BY `nome`');
    
  }
  
}
