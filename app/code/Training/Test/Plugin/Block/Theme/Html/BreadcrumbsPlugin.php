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
 * Date: 26.10.17 Time: 13:50
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Test\Plugin\Block\Theme\Html;

/**
 * Class BreadcrumbsPlugin
 * @package Training\Test\Plugin\Block\Theme\Html
 */
class BreadcrumbsPlugin
{
	/**
	 *
	 * @param \Magento\Theme\Block\Html\Breadcrumbs $subject
	 * @param \Closure $proceed
	 * @param $crumbName
	 * @param $crumbInfo
	 *
	 * @return \Magento\Theme\Block\Html\Breadcrumbs
	 */
	public function aroundAddCrumb(\Magento\Theme\Block\Html\Breadcrumbs $subject, \Closure $proceed, $crumbName, $crumbInfo)
	{
		$crumbName .= '(!)';

		return $proceed($crumbName, $crumbInfo);
	}
}