<?php
/**
 * @category Stagem
 * @package Stagem_Robots
 * @author Popov Sergiy <popov@stagem.com.ua>
 * @datetime: 26.06.15 15:00
 */
class Stagem_Robots_Block_Adminhtml_Robots_Edit extends Mage_Adminhtml_Block_Widget_Form_Container {

	/**
	 * Init class
	 */
	protected function _construct() {
		$this->_blockGroup = 'stagem_robots';
		$this->_controller = 'adminhtml_robots';

		$this->setData('action', $this->getUrl('*/*/save'));
	}

	/**
	 * Get Header text
	 *
	 * @return string
	 */
	public function getHeaderText() {
		$model = Mage::registry('current_stagem_robots');
		if ($model->getId()) {
			return $this->__("Edit Robots.txt item");
		} else {
			return $this->__("Add Robots.txt item");
		}
	}

}