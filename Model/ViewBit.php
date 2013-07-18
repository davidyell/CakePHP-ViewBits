<?php
App::uses('ViewBitsAppModel', 'ViewBits.Model');
/**
 * ViewBit Model
 *
 */
class ViewBit extends ViewBitsAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Model validation rules
 * 
 * @var array
 */
        public $validate = array(
            'name'=>array(
                'one'=>array(
                    'rule'=>'notEmpty',
                    'message'=>'Please enter a name for this item',
                    'required'=>true
                )
            ),
            'route'=>array(
                'one'=>array(
                    'rule'=>'notEmpty',
                    'message'=>'You must enter a route',
                    'required'=>true
                )
            ),
            'content'=>array(
                'one'=>array(
                    'rule'=>'notEmpty',
                    'message'=>'Please enter some content to display',
                    'required'=>true
                )
            )
        );

}
