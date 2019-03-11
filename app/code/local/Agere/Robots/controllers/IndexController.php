<?php
/**
 * @category Agere
 * @package Agere_Robots
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 27.06.15 19:42
 */

class Agere_Robots_IndexController extends Mage_Core_Controller_Front_Action {

	public function indexAction() {
		$collection = Mage::getModel('agere_robots/robots')->getCollection();
		$collection->addFieldToFilter('is_active', '1')
			->addFieldToFilter('store_id', array(
				array('finset' => 0), // all stores
				array('finset' => Mage::app()->getStore(true)->getId()),
			));
	
		$this->getResponse()->setHeader('Content-type', 'text/plain', true);
		$this->getResponse()->setBody($collection->getFirstItem()->getContent());
	}

}