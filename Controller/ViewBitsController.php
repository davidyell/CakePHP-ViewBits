<?php

/**
 * CakePHP ViewBitsController
 * @author david
 */
App::uses('ViewBitsAppController', 'ViewBits.Controller');

class ViewBitsController extends ViewBitsAppController {

/**
 * Creates a list of viewbits on the system
 */
    public function admin_index(){
        $this->set('viewBits', $this->Paginator->paginate());
    }

/**
 * Create a new viewbit
 */
    public function admin_add(){
        if($this->request->is('post') || $this->request->is('put')){
            $this->ViewBit->create();
            if($this->ViewBit->save($this->request->data)){
                $this->Session->setFlash(__('The view bit has been saved'), 'NiceAdmin.alert-box', array('class'=>'alert-success'));
                $this->redirect(array('action'=>'index'));
            } else{
                $this->Session->setFlash(__('The view bit could not be saved. Please, try again.'), 'alert-box', array('class'=>'alert-error'));
            }
        }
    }

/**
 * Edit and existing viewbit
 * @param int $id
 * @throws NotFoundException
 */
    public function admin_edit($id = null){
        $this->ViewBit->id = $id;
        if(!$this->ViewBit->exists()){
            throw new NotFoundException(__('Invalid content'));
        }
        if($this->request->is('post') || $this->request->is('put')){
            if($this->ViewBit->save($this->request->data)){
                $this->Session->setFlash(__('The view bit has been saved'), 'NiceAdmin.alert-box', array('class'=>'alert-success'));
                $this->redirect(array('action'=>'index'));
            } else{
                $this->Session->setFlash(__('The view bit could not be saved. Please, try again.'), 'NiceAdmin.alert-box', array('class'=>'alert-error'));
            }
        } else{
            $this->request->data = $this->ViewBit->read(null, $id);
        }
    }

/**
 * Delete a viewbit
 * @param int $id
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 */
    public function admin_delete($id = null){
        if(!$this->request->is('post')){
            throw new MethodNotAllowedException();
        }
        $this->ViewBit->id = $id;
        if(!$this->ViewBit->exists()){
            throw new NotFoundException(__('Invalid content'));
        }
        if($this->ViewBit->delete()){
            $this->Session->setFlash(__('ViewBit deleted'), 'NiceAdmin.alert-box', array('class'=>'alert-success'));
            $this->redirect(array('action'=>'index'));
        }
        $this->Session->setFlash(__('ViewBit was not deleted'), 'NiceAdmin.alert-box', array('class'=>'alert-error'));
        $this->redirect(array('action'=>'index'));
    }

}
