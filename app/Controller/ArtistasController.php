<?php
App::uses('AppController', 'Controller');
/**
 * Artistas Controller
 *
 * @property Artista $Artista
 */
class ArtistasController extends AppController {

    /**
     * index method
     *
     * @return void
     */

    public $paginate = array();

    public function admin_index() {
        $this->Artista->recursive = 0;
        $data = $this->request->query;

        if($this->request->is('get')
                && !empty($data) && isset($data['Search']['filter'])){

            $this->paginate['order'] = 'Artista.nome asc';
            if('artista' == $data['Search']['filter']){
                $this->paginate['conditions'] = array(
                        'Artista.nome LIKE' => '%' . $data['Search']['query'] . '%',
                        );
            }
        }


        $this->set('artistas', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Artista->exists($id)) {
            throw new NotFoundException(__('Artista inválido'));
        }

        parent::searchDataLoader();

        $options = array(
                'conditions' => array(
                    'Artista.' . $this->Artista->primaryKey => $id
                    ));
        $this->set('artista',
                $this->Artista->find('first', $options));
    }

    public function admin_view($id = null) {
        if (!$this->Artista->exists($id)) {
            throw new NotFoundException(__('Artista inválido'));
        }

        $options = array('conditions' => array(
                    'Artista.' . $this->Artista->primaryKey => $id));

        $this->set(
                'artista', $this->Artista->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if(isset($data['Artista']['imagem'])
                    && $data['Artista']['imagem']['error'] != 4){

                $data['Artista']['imagem'] =
                    $this->processFile($data['Artista']['imagem']);
            } else {
                unset($data['Artista']['imagem']);
            }

            $this->Artista->create();

            if ($this->Artista->save($data)) {
                $this->Flash->set(__('O artista foi salvo!'));
                if(!$this->request->is('ajax')) {
                    $this->redirect(array('action' => 'index'));
                } else {
                    $artistas = $this->Artista->find('list');
                    $this->set(compact('artistas'));

                    $this->set('artista', $this->Artista->id);

                    $this->autoRender = false;
                    $this->layout = 'ajax';
                    $this->render(DS.'Elements'.DS.'select_artista');
                }
            } else {
                if(!$this->request->is('ajax')) {
                    $this->Flash->set(__('O artista não foi salvo. Por favor, tente novamente.'));
                } else {
                    $this->autoRender = false;
                    $this->layout = 'ajax';
                    return '{"error" : "Não foi possível adicionar o artista"}';
                }
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Artista->exists($id)) {
            throw new NotFoundException(__('Artista inválido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['Artista']['imagem']['error'] == 0){ //Nova imagem
                $this->request->data['Artista']['imagem'] =
                    $this->processFile($this->request->data['Artista']['imagem']);
            } else {
                unset($this->request->data['Artista']['imagem']);
            }

            if ($this->Artista->save($this->request->data)) {
                $this->Flash->set(__('Artista salvo'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->set(__('O artista não foi salvo. Por favor, tente novamente.'));
            }
        } else {
            $options = array('conditions' => array('Artista.' . $this->Artista->primaryKey => $id));
            $this->request->data = $this->Artista->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Artista->id = $id;
        if (!$this->Artista->exists()) {
            throw new NotFoundException(__('Artista inválido'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Artista->delete()) {
            $this->Flash->set(__('Artista deletado'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Flash->set(__('O artista não foi deletado'));
        $this->redirect(array('action' => 'index'));
    }

    private function _ext($uploaded){
        return strrchr($uploaded['name'],".");
    }

    private function processFile($uploaded){
        $uploaded['name'] = strtolower(str_replace(" ", "-", $uploaded['name']));

        $up_dir = WWW_ROOT . "img/artistas";

        $target_path = $up_dir . DS . $uploaded['name'];

        //temp path without the ext
        $temp_path = substr($target_path, 0,
                strlen($target_path) - strlen($this->_ext($uploaded)));

        $i = 1;
        while(file_exists($target_path)){
            $target_path = $temp_path . "-" . $i . $this->_ext($uploaded);
            $i++;
        }

        $save_data = array();

        if(move_uploaded_file($uploaded['tmp_name'], $target_path)){
            //Final File Name
            $finalFile = basename($target_path);
            @chmod($target_path, 0644);
        } else {
            $this->Flash->set(__("ArtistasController::processFile() -
                        Unable to save temp file to file system.
                        (" . $target_path . ")"));
            $this->redirect(array('action' => 'index'));
        }
        return $finalFile;
    }

}
