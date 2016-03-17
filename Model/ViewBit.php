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
				'rule' => 'notBlank',
				'message' => 'Please enter a name for this item',
				'required' => true
			]
		],
		'route' => [
			'one' => [
				'rule' => 'notBlank',
				'message' => 'You must enter a route',
				'required' => true
			]
		],
		'content' => [
			'one' => [
				'rule' => 'notBlank',
				'message' => 'Please enter some content to display',
				'required' => true
			]
		]
	];

/**
 * Check to make sure that the route is reachable and will return a 200 OK
 * Will pass any route with a wildcard
 * 
 * @param array $check
 * @return boolean
 */
	public function check_route($check) {
		if (strpos($check['route'], '*')) {
			return true;
		}
		
		$http = new HttpSocket();
		$response = $http->get(Router::fullBaseUrl() . $check['route']);
		
		if ((int)$response->code === 200) {
			return true;
		}
		
		return false;
	}
}
