<?php
/**
 * Robots default helper
 *
 * @category Stagem
 * @package Stagem_Robots
 * @author Popov Sergiy <popov@stagem.com.ua>
 * @datetime: 20.04.14 14:54
 */ 
class Stagem_Robots_Helper_Data extends Mage_Core_Helper_Abstract {

	public function canBeStoreCodeInUrl() {
		return Mage::isInstalled() && Mage::getStoreConfigFlag(Mage_Core_Model_Store::XML_PATH_STORE_IN_URL);
	}
}
