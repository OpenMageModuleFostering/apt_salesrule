<?php
/**
 * Medma Avatar Module.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Magento Team
 * that is bundled with this package of Medma Infomatix Pvt. Ltd.
 * =================================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * =================================================================
 * This package designed for Magento COMMUNITY edition
 * Medma Support does not guarantee correct work of this package
 * on any other Magento edition except Magento COMMUNITY edition.
 * =================================================================
 */
?>
<?php

$installer = $this;
$installer->startSetup();

//$setup = Mage::getModel('customer/entity_setup', 'core_setup');

$installer->getConnection()
    ->addColumn(
        $installer->getTable('salesrule/rule'),
        'customer_id',
        array(
            'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
            'length'    => '255',
            'nullable'  => false,
            'default'   => 0,
            'comment'  => 'Customer Id',
        )
    );

$installer->endSetup();