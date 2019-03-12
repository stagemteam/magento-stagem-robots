<?php
/**
 * Block contains collection of robots.txt files
 *
 * @category Stagem
 * @package Stagem_Robots
 * @author Popov Sergiy <popov@stagem.com.ua>
 * @datetime: 26.09.15 13:18
 */
class Stagem_Robots_Block_Adminhtml_Robots extends Mage_Adminhtml_Block_Widget_Grid_Container {

	/**
	 * @link http://stackoverflow.com/a/5716697/1335142
	 */
	protected function _construct() {
		$this->_blockGroup = 'stagem_robots'; // module name
		$this->_controller = 'adminhtml_robots';
		$this->_headerText = $this->__('Robots.txt');
		$this->_addButtonLabel = $this->__('Add') . ' Robots.txt';
		parent::_construct();
	}

}