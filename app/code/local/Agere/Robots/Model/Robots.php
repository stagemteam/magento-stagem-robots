<?php
/**
 * Robots model
 *
 * @category Agere
 * @package Agere_Robots
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 16.10.14 12:28
 */
class Agere_Robots_Model_Robots extends Mage_Core_Model_Abstract {

	protected function _construct() {
		$this->_init('agere_robots/robots');
	}

	protected function _beforeSave() {
		if ($this->isObjectNew()) {
			$this->setData('created_at', Varien_Date::now());
		}

		return $this;
	}

}