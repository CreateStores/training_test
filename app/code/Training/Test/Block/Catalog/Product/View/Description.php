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
 * Date: 30.10.17 Time: 19:16
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Test\Block\Catalog\Product\View;

/**
 *
 * plugin Description
 * @package Training\Test\Block\Catalog\Product\View
 */
class Description extends \Magento\Catalog\Block\Product\View\Description
{
	/**
	 * result http://take.ms/5GR56
	 *
	 * @return \Magento\Catalog\Block\Product\View\Description
	 */
	protected function _beforeToHtml()
	{
		//$_product = $this->getProduct();
		//$_product->setDescription('Test description from Training\Test\Block\Catalog\Product\View\Description');

		return parent::_beforeToHtml();
	}
}