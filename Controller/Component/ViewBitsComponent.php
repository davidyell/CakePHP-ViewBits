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
 * Construct the component and merge settings
 *
 * @param \ComponentCollection $collection
 * @param array $settings
 */
    public function __construct(ComponentCollection $collection, $settings = array())
    {
        $settings = array_merge($this->settings, $settings);
        parent::__construct($collection, $settings);
    }

/**
 * Before a page is rendered, look up the ViewBits for that page
 * @param Controller $controller
 * @return void
 */
    public function beforeRender(Controller $controller) {
        parent::beforeRender($controller);

        if(!$controller->request->is('ajax') && preg_match("/^\/(files|css|img|js)/", $controller->here) === 0){

            $key = 'viewbit_' . Inflector::slug($controller->here);
            $bits = Cache::read($key, 'medium');

            if (!$bits) {
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

                Cache::write($key, $bits, 'medium');
            }

            // Set the data in the view for the helper to use
            $controller->set('viewbits', $bits);
        }
    }
    
}
