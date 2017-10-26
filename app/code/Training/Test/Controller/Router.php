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
 * Date: 26.10.17 Time: 17:00
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Test\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;

/**
 * Class Router
 */
class Router implements RouterInterface
{
	/**
	 * @var ActionFactory
	 */
	protected $_actionFactory;

	/**
	 * Router constructor.
	 *
	 * @param ActionFactory $actionFactory
	 */
	public function __construct(ActionFactory $actionFactory)
	{
		$this->_actionFactory = $actionFactory;
	}

	/**
	 * router which “understands” URLs like /frontName-actionPath-action and converts them
	 * to /frontName/actionPath/action
	 *
	 * example: http://magento.dev/catalog-product-view/id/1/
	 *
	 * @param RequestInterface $request
	 *
	 * @return null
	 */
	public function match( RequestInterface $request )
	{
		$info = $request->getPathInfo();
		if (preg_match("%^/(.*?)-(.*?)-(.*?)$%", $info, $m)) {
			$request->setPathInfo( sprintf( "/%s/%s/%s", $m[1], $m[2], $m[3] ) );

			return $this->_actionFactory->create( 'Magento\Framework\App\Action\Forward',
				['request' => $request ]
			);
		}

		return null;
	}
}