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
 * Date: 14.11.17 Time: 18:01
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Orm\Setup;


use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class InstallData
 * @package Training\Orm\Setup
 */
class InstallData implements InstallDataInterface
{
	/**
	 * @var \Magento\Eav\Setup\EavSetup
	 */
	protected $_eavSetupFactory;

	/**
	 * InstallData constructor.
	 *
	 * @param EavSetupFactory $eavSetupFactory
	 */
	public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
	{
		$this->_eavSetupFactory = $eavSetupFactory;
	}

	/**
	 * result: http://take.ms/OEgVe
	 * 
	 * @param ModuleDataSetupInterface $setup
	 * @param ModuleContextInterface $context
	 *
	 * @return $this
	 */
	public function install( ModuleDataSetupInterface $setup, ModuleContextInterface $context )
	{
		/** @var \Magento\Eav\Setup\EavSetup $eavSetup */
		$eavSetup = $this->_eavSetupFactory->create([ 'setup' => $setup]);

		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'flavor_attribute_code',
			[
				'type' => 'varchar',
                'label' => 'Flavor Attribute',
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
				'group' => 'General'
			]
		);

		return $this;
	}
}