<?php
/**
 * CreateStores Inc.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@createstores.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * If you wish to customize it for your
 * needs please refer to http://www.createstores.com for more information.
 *
 * @creator     Gusev Oleg, Magento certificated Developer Plus, magentoassistance@gmail.com
 * @certificate http://www.magentocommerce.com/certification/directory/dev/973862/
 *
 * Created by
 * User: oleg
 * Date: 03.11.17 Time: 17:37
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Vendor\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

/**
 * Class InstallSchema
 * @package Training\Vendor\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
	/**
	 * result: http://take.ms/QmvjQ
	 *
	 * @param SchemaSetupInterface $setup
	 * @param ModuleContextInterface $context
	 */
	public function install( SchemaSetupInterface $setup, ModuleContextInterface $context )
	{
		$installer = $setup;

		$installer->startSetup();

		$tableName = 'training_vendor_entity';
		$tableDdl = $installer->getConnection()->newTable($installer->getTable($tableName))
			->addColumn(
				'entity_id',
				\Magento\Framework\DB\Ddl\Table::TYPE_BIGINT,
				null,
				[
					'unsigned' => true,
					'primary'  => true,
					'nullable' => false
				],
				'Primary Id'
			)
			->addColumn(
				'key',
				\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				64,
				[
					'default' => 'Key'
				],
				'Key'
			)
			->addIndex(
				$installer->getIdxName(
					$tableName,
					['key'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
				),
				['key'],
				['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
			)
			->setComment('Test table to keep KEY => VALUE text pairs')
		;

		$installer->getConnection()->createTable($tableDdl);

		$installer->endSetup();
	}
}