<?php
/**
 * Description of ViewBitsComponent
 *
 * @author David Yell <neon1024@gmail.com>
 */
App::uses('Component', 'Controller');

class ViewBitsComponent extends Component {

    public $settings = [
        'conditions' => []
    ];

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

            $options = [
                'conditions' => [
                    'OR' => [
                        ['route' => $controller->here],
                        ['route' => '*']
                    ]
                ],
                'order' => ['order ASC']
            ];

            $options['conditions'] = array_merge($options['conditions'], $this->settings['conditions']);

            $bits = $controller->ViewBit->find('all', $options);
            
            // Set the data in the view for the helper to use
            $controller->set('viewbits', $bits);
        }
        
    }
    
}

?>
