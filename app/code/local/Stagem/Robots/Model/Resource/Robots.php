<?php
/**
 * Robots resource
 *
 * @category Stagem
 * @package Stagem_Robots
 * @author Popov Sergiy <popov@stagem.com.ua>
 * @datetime: 26.06.15 13:02
 */

class Stagem_Robots_Model_Resource_Robots extends Mage_Core_Model_Resource_Db_Abstract {

	protected function _construct() {
		$this->_init('stagem_robots/robots', 'id');
	}

}