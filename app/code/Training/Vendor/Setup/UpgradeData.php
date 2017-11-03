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
 * Date: 03.11.17 Time: 18:50
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Vendor\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

/**
 * Class UpgradeData
 * @package Training\Vendor\Setup
 */
class UpgradeData implements UpgradeDataInterface
{
	/**
	 * @var \Magento\Config\Model\ResourceModel\Config
	 */
	protected $_config;

	/**
	 * UpgradeData constructor.
	 *
	 * @param \Magento\Config\Model\ResourceModel\Config $config
	 */
	public function __construct(
		\Magento\Config\Model\ResourceModel\Config $config
	)
	{
		$this->_config = $config;
	}

	/**
	 * result: http://take.ms/bIckr
	 *
	 * @param ModuleDataSetupInterface $setup
	 * @param ModuleContextInterface $context
	 */
	public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context )
	{
		$setup->startSetup();

		if (version_compare($context->getVersion(), '0.0.3', '<')) {
			/** @var \Magento\Config\Model\ResourceModel\Config $config */

			$this->_config->saveConfig('training/vendor/fixture', 'gold', 'default', 0);
		}

		$setup->endSetup();
	}
}