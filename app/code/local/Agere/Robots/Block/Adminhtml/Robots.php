<?php
/**
 * Block contains collection of robots.txt files
 *
 * @category Agere
 * @package Agere_Robots
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 26.09.15 13:18
 */
class Agere_Robots_Block_Adminhtml_Robots extends Mage_Adminhtml_Block_Widget_Grid_Container {

	/**
	 * @link http://stackoverflow.com/a/5716697/1335142
	 */
	protected function _construct() {
		$this->_blockGroup = 'agere_robots'; // module name
		$this->_controller = 'adminhtml_robots';
		$this->_headerText = $this->__('Robots.txt');
		$this->_addButtonLabel = $this->__('Add') . ' Robots.txt';
		parent::_construct();
	}

}