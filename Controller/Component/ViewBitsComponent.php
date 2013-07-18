<?php
/**
 * Description of ViewBitsComponent
 *
 * @author David Yell <neon1024@gmail.com>
 */
App::uses('Component', 'Controller');

class ViewBitsComponent extends Component{
    
/**
 * Before a page is rendered, look up the ViewBits for that page
 * @param Controller $controller
 * @return void
 */
    public function beforeRender(Controller $controller) {
        parent::beforeRender($controller);
        
        // Check to make sure it's not ajax/json/xml
        if($controller->request->is('get') || $controller->request->is('post') || $controller->request->is('put')){
            
            $controller->loadModel('ViewBits.ViewBit');
            $bits = $controller->ViewBit->find('all', array(
                'conditions' => array(
                    'OR' => array(
                        array('route' => $controller->here),
                        array('route' => '*')
                    )
                ),
                'order' => array('order ASC')
            ));
            
            // Set the data in the view for the helper to use
            $controller->set('viewbits', $bits);
        }
        
    }
    
}

?>
