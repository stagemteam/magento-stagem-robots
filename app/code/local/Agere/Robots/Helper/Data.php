<?php
/**
 * Robots default helper
 *
 * @category Agere
 * @package Agere_Robots
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 20.04.14 14:54
 */ 
class Agere_Robots_Helper_Data extends Mage_Core_Helper_Abstract {

	public function canBeStoreCodeInUrl() {
		return Mage::isInstalled() && Mage::getStoreConfigFlag(Mage_Core_Model_Store::XML_PATH_STORE_IN_URL);
	}
}
