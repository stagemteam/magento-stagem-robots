<?php
/**
 * @category Agere
 * @package Agere_Item
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 16.10.14 12:41
 */
class Agere_Robots_Adminhtml_RobotsController extends Mage_Adminhtml_Controller_Action {

	public function indexAction() {
		$this->_initAction();
		$this->_title($this->__('Robots.txt'));
		// see layout
		//$this->_addContent($this->getLayout()->createBlock('agere_robots/adminhtml_robots'));

		$this->renderLayout();
	}

	public function newAction() {
		$this->_forward('edit');
	}

	public function editAction() {
		//$this->_initAction();

		$id = (int) $this->getRequest()->getParam('id');
		$model = Mage::getModel('agere_robots/robots')->load($id);

		//$this->loadLayout()->_setActiveMenu('agere_seo');

		$data = Mage::getSingleton('adminhtml/session')->getRobotsData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register('current_agere_robots', $model);

		$this->_initAction()
			->_addBreadcrumb($id ? $this->__('Edit Robots.txt') : $this->__('New Robots.txt'), $id ? $this->__('Edit Robots.txt') : $this->__('New Robots.txt'))
			//->_addContent($this->getLayout()->createBlock('agere_robots/adminhtml_robots_edit')->setData('action', $this->getUrl('*/*/save')))
			->renderLayout();
	}

	public function saveAction() {
		if ($data = $this->getRequest()->getPost()) {
			try {
				if (isset($data['stores'])) {
					if (in_array('0', $data['stores'])) {
						$data['store_id'] = '0';
					} else {
						$data['store_id'] = join(",", $data['stores']);
					}
					unset($data['stores']);
				}

				$model = Mage::getModel('agere_robots/robots');
				$model->setData($data)->setId($this->getRequest()->getParam('id'));
				$model->save();

				Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Robots.txt was saved successfully'));
				Mage::getSingleton('adminhtml/session')->setRobotsData(false);
				$this->_redirect('*/*/');
			} catch (Mage_Core_Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
			catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this Robots.txt.'));
			}
			return;
		}

		Mage::getSingleton('adminhtml/session')->addError($this->__('Unable to find item to save'));
		$this->_redirect('*/*/');
	}

	public function deleteAction() {
		if ($id = $this->getRequest()->getParam('id')) {
			try {
				Mage::getModel('agere_robots/robots')->setId($id)->delete();
				Mage::getSingleton('adminhtml/session')->addSuccess($this->__('Robotx.txt was deleted successfully'));
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $id));
			}
		}
		$this->_redirect('*/*/');
	}

	/**
	 * Initialize action
	 *
	 * Here, we set the breadcrumbs and the active menu
	 *
	 * @return Mage_Adminhtml_Controller_Action
	 */
	protected function _initAction() {
		$this->loadLayout()
			// Make the active menu match the menu config nodes (without 'children' inbetween)
			->_setActiveMenu('cms/agere_robots')
			->_title($this->__('CMS'))->_title($this->__('Robots.txt'))
			->_addBreadcrumb($this->__('CMS'), $this->__('CMS'))
			->_addBreadcrumb($this->__('Robots.txt'), $this->__('Robots.txt'));

		return $this;
	}

	/**
	 * Check currently called action by permissions for current user
	 *
	 * @return bool
	 */
	protected function _isAllowed()	{
		return Mage::getSingleton('admin/session')->isAllowed('cms/agere_robots');
	}

}