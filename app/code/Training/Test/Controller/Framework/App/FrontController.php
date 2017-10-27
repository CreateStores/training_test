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
 * Date: 26.10.17 Time: 16:05
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Test\Controller\Framework\App;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterListInterface;
use Psr\Log\LoggerInterface;

/**
 * Class FrontController
 */
class FrontController extends \Magento\Framework\App\FrontController
{
	/**
	 * @var LoggerInterface
	 */
	protected $_logger;

	/**
	 * FrontController constructor.
	 *
	 * @param RouterListInterface $routerList
	 * @param \Magento\Framework\App\ResponseInterface $response
	 * @param LoggerInterface $logger
	 */
	public function __construct(
		RouterListInterface $routerList,
		\Magento\Framework\App\ResponseInterface $response,
		LoggerInterface $logger
	) {
		$this->_logger = $logger;
		parent::__construct($routerList, $response);
	}

	/**
	 * TODO: logic commented
	 *
	 * @param RequestInterface $request
	 *
	 * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
	 */
	public function dispatch( RequestInterface $request )
	{
//		foreach ($this->_routerList as $router) {
//			$this->_logger->info("--------\n\n\n ROUTER \n\n\n" . get_class($router));
//		}

		return parent::dispatch( $request );
	}
}