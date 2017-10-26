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
 * Date: 26.10.17 Time: 18:15
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Test\Controller\Catalog\Product;

use Magento\Framework\App\Action\Action;

/**
 * Class View
 * @package Training\Test\Controller\Catalog\Product
 */
class View extends Action
{
	/**
	 * uncomment app/code/Training/Test/etc/di.xml string 74
	 */
	public function execute()
	{
		echo 'overrided by Training\Test\Controller\Catalog\Product\View';
		exit();
	}
	/*
	public function beforeExecute() {
		//echo "BEFORE<BR>"; exit;
	}
	public function afterExecute(\Magento\Catalog\Controller\Product\View $controller,
		$result) {
		//echo "AFTER"; exit;
	}
	*/
}