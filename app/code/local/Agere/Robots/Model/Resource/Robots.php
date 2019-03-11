<?php
/**
 * Robots resource
 *
 * @category Agere
 * @package Agere_Robots
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 26.06.15 13:02
 */

class Agere_Robots_Model_Resource_Robots extends Mage_Core_Model_Resource_Db_Abstract {

	protected function _construct() {
		$this->_init('agere_robots/robots', 'id');
	}

}