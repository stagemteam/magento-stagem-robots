<?php
/**
 * @category Agere
 * @package Agere_Robots
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 26.06.15 15:14
 */
class Agere_Robots_Block_Adminhtml_Robots_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

	public function _construct() {
		parent::_construct();

		$this->setId('agere_robots_form'); //agere_robots_robots_form
		$this->setTitle($this->__('Robots Information'));
	}

	/**
	 * Load Wysiwyg on demand and Prepare layout
	 */
	/*protected function _prepareLayout() {
		parent::_prepareLayout();
		if (Mage::getSingleton('cms/wysiwyg_config')->isEnabled()) {
			$this->getLayout()->getBlock('head')->setCanLoadTinyMce(true);
		}
	}*/

	protected function _prepareForm() {
		$model = Mage::registry('current_agere_robots');

		$form = new Varien_Data_Form(array(
			'id'     => 'edit_form',
			'action' => $this->getUrl('*/*/save', array(
				'id' => $this->getRequest()->getParam('id')
			)),
			'method' => 'post'
		));

		$fieldset = $form->addFieldset('base_fieldset', array(
			'legend' => $this->__('Robots Information'),
			'class' => 'fieldset-wide',
		));

		if ($model->getId()) {
			$fieldset->addField('id', 'hidden', array(
				'name' => 'id',
			));
		}


		//Zend_Debug::dump(get_class(Mage::getSingleton('adminhtml/system_store'))); die(__METHOD__);
		if (!Mage::app()->isSingleStoreMode()) {
			$fieldset->addField('store_id', 'multiselect', array(
				'name' => 'stores[]',
				'label' => $this->__('Store View'),
				'title' => $this->__('Store View'),
				'required' => true,
				'values' => Mage::getSingleton('adminhtml/system_store')->getStoreValuesForForm(false, true),
			));
		} else {
			$fieldset->addField('store_id', 'hidden', array(
				'name' => 'stores[]',
				'value' => Mage::app()->getStore(true)->getId(),
			));
		}
		
		/*$fieldset->addField('category_id', 'select', array(
			'label'    => $this->__('Category'),
			'name'     => 'category_id',
			'required' => true,
			'value'    => $model->getCategoryId(),
			'values'   => Mage::getModel('Agere_Seo_Model_System_Config_Category')->toOptionArray(),
		));*/

		/*$fieldset->addField('date_create', 'text', array(
			'label'              => $this->__('Url'),
			'required'           => false,
			'name'               => 'url',
			'after_element_html' => '<div class="hint"><p class="note">' . $this->__('Requires only part of the link without a store. For example: women/where/item-type/jeans') . '</p></div>',
		));*/

		$fieldset->addField('content', 'textarea', array(
			'name'     => 'content',
			'label'    => $this->__('Robots.txt content'),
			'title'    => $this->__('Robots.txt content'),
			'required' => true,
			'style'    => 'width: 50%; height: 200px;',
		));

		$fieldset->addField('is_active', 'select', array(
			'label'     => $this->__('Status'),
			'name'      => 'is_active',
			'required'  => true,
			'options'   => array(
				1 => $this->__('Enabled'),
				0 => $this->__('Disabled'),
			),
		));

		if ($data = Mage::getSingleton('adminhtml/session')->getFormData()) {
			$form->setValues($data);
		} else {
			$form->setValues($model->getData());
		}
		$form->setUseContainer(true);
		$this->setForm($form);

		return parent::_prepareForm();
	}

}