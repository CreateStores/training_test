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
 * Date: 14.11.17 Time: 19:25
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Orm\Setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * Class UpgradeData
 * @package Training\Orm\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
	/**
	 * @var EavSetupFactory
	 */
	protected $_eavSetupFactory;

	/**
	 * UpgradeData constructor.
	 *
	 * @param EavSetupFactory $eavSetupFactory
	 */
	public function __construct(EavSetupFactory $eavSetupFactory)
	{
		$this->_eavSetupFactory = $eavSetupFactory;
	}

	/**
	 * result: http://take.ms/hH9yD
	 *
	 * @param ModuleDataSetupInterface $setup
	 * @param ModuleContextInterface $context
	 *
	 * @return $this
	 */
	public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context )
	{
		if (version_compare($context->getVersion(), '0.0.2') < 0) {
			/** @var \Magento\Eav\Setup\EavSetup $eavSetup */
			$eavSetup = $this->_eavSetupFactory->create([ 'setup' => $setup]);

			$eavSetup->addAttribute(
				\Magento\Catalog\Model\Product::ENTITY,
				'flavor_multiselect',
				[
					'type' => 'varchar',
					'label' => 'Flavor Attribute MultiSelect',
					'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
					'visible' => true,
					'required' => false,
					'user_defined' => true,
					'searchable' => false,
					'filterable' => false,
					'comparable' => false,
					'visible_on_front' => true,
					'used_in_product_listing' => false,
					'unique' => false,
					'apply_to' => '',
					'frontend' => '',
					'input' => 'multiselect',
					'backend' => \Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend::class,
					'group' => 'General',
					'option' => [
						'value' => [
							'option_1' => ['Option 1'],
							'option_2' => ['Option 2'],
							'option_3' => ['Option 3'],
							'option_4' => ['Option 4 "!@#$%^&*']
						],
						'order' => [
							'option_1' => 1,
							'option_2' => 2,
							'option_3' => 3,
							'option_4' => 4,
						],
					],
				]
			);
		}

		return $this;
	}
}