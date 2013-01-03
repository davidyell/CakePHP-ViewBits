<?php
/**
 * Description of ViewBitsComponent
 *
 * @author david
 */
App::uses('Component', 'Controller');

class ViewBitsComponent extends Component{
    
    public $_Controller = '';
    
    public function startup(\Controller $controller) {
        parent::startup($controller);
        
        $this->_Controller = $controller;
    }
    
/**
 * Before a page is rendered, look up the ViewBits for that page
 * @param \Controller $controller
 */
    public function beforeRender(\Controller $controller) {
        parent::beforeRender($controller);
        
        // Check to make sure it's not ajax/json/xml
        if($this->_Controller->request->is('get') || $this->_Controller->request->is('post') || $this->_Controller->request->is('put')){
            
            $this->_Controller->loadModel('ViewBits.ViewBit');
            $bits = $this->_Controller->ViewBit->find('all', array(
                'conditions'=>array(
                    'OR'=>array(
                        array('route'=>$this->_Controller->here),
                        array('route'=>'*')
                    )
                ),
                'order'=>array('order ASC')
            ));
            
            // Set the data in the view for the helper to use
            $this->_Controller->set('viewbits', $bits);
        }
        
    }
    
}

?>
