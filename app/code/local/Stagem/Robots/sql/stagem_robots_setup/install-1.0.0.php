<?php
/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;
$tableRobots = $installer->getTable('stagem_robots/robots');

$installer->startSetup();

$rule = $installer->getConnection()
    ->newTable($tableRobots)
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ), 'ID')
	->addColumn('store_id', Varien_Db_Ddl_Table::TYPE_TEXT, 63, array(
		'nullable' => true,
		'default' => null,
	), 'Store View Selector')
	->addColumn('created_at', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
		'nullable'  => false,
	), 'Date create')
	->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, 0, array(
		'nullable'  => false,
	), 'Robots.txt content')
;
$installer->getConnection()->createTable($rule);

$installer->endSetup();