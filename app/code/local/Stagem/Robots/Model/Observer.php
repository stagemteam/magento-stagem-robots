<?php
/**
 * @category Stagem
 * @package Stagem_Robots
 * @author Popov Sergiy <popov@stagem.com.ua>
 * @datetime: 20.04.14 15:02
 */

class Stagem_Robots_Model_Observer extends Varien_Event_Observer {

	/**
	 * @var Stagem_Seo_Helper_Data $seoHelper
	 */
	protected $seoHelper;

	/**
	 * Add module to Request for robots.txt
	 *
	 * @param Varien_Event_Observer $observer
	 */
	public function hookAddModuleToRequest(Varien_Event_Observer $observer) {
		/** @var Mage_Core_Controller_Varien_Front $front */
		$front = $module = $observer->getFront();
		if ($front->getRequest()->getPathInfo() === '/robots.txt') {
			$requestUri = $front->getRequest()->getRequestUri();
			if (Mage::helper('stagem_robots')->canBeStoreCodeInUrl()) {
				$requestUri = '/' . Mage::app()->getStore()->getCode() . '/' . $requestUri;
			}
			$front->getRequest()->setRequestUri($requestUri);

			$module = (string) Mage::getConfig()->getNode('frontend/routers/stagem_robots/args/frontName');
			$front->getRequest()->setModuleName($module);
			$front->getRequest()->setActionName('index');
		}
	}

}