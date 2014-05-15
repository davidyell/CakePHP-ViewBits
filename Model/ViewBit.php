<?php

App::uses('ViewBitsAppModel', 'ViewBits.Model');
App::uses('HttpSocket', 'Network/Http');

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
	public $validate = [
		'name' => [
			'one' => [
				'rule' => 'notEmpty',
				'message' => 'Please enter a name for this item',
				'required' => true
			]
		],
		'route' => [
			'one' => [
				'rule' => 'notEmpty',
				'message' => 'You must enter a route',
				'required' => true
			],
			'two' => [
				'rule' => 'check_route',
				'message' => 'Route is not a valid page'
			]
		],
		'content' => [
			'one' => [
				'rule' => 'notEmpty',
				'message' => 'Please enter some content to display',
				'required' => true
			]
		]
	];

/**
 * Check to make sure that the route is reachable and will return a 200 OK
 * 
 * @param array $check
 * @return boolean
 */
	public function check_route($check) {
		$http = new HttpSocket();
		$response = $http->get(Router::fullBaseUrl() . $check['route']);
		
		if ((int)$response->code === 200) {
			return true;
		}
		
		return false;
	}
}
