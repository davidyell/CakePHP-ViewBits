<?php
class SummaryAndNulls extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
                    'alter_field' => array(
                        'name' => array('null' => false),
                        'route' => array('null' => false),
                        'content' => array('null' => false),
                    ),
                    'create_field' => array(
                        'summary' => array('type' => 'varchar', 'length' => '255', 'null' => true)
                    )
		),
		'down' => array(
                    'alter_field' => array(
                        'name' => array('null' => true),
                        'route' => array('null' => true),
                        'content' => array('null' => true),
                    ),
                    'drop_field' => array(
                        'summary' => array('type' => 'varchar', 'length' => '255', 'null' => true)
                    )
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
