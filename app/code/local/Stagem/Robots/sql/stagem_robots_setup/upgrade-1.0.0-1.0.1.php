<?php
/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$tableRobots = $installer->getTable('stagem_robots/robots');

$installer->startSetup();
$installer->getConnection() // @link http://magento.stackexchange.com/a/4617
	->addColumn($tableRobots, 'is_active', array( // instead can use string "tinyint(1) UNSIGNED DEFAULT 0 AFTER store_id"
		'type'     => Varien_Db_Ddl_Table::TYPE_BOOLEAN,
		'length'   => '1',
		'nullable' => false,
		'default'  => 0,
		'comment'  => 'Is robots.txt active'
	));

$installer->endSetup();