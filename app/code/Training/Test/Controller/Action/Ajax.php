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
 * Date: 10.11.17 Time: 15:20
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Test\Controller\Action;

use Braintree\Exception;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\DataObject;
use Psr\Log\LoggerInterface;

/**
 * Class Ajax
 * @package Training\Test\Controller\Action
 */
class Ajax extends Action
{
	/**
	 * @var JsonFactory
	 */
	protected $_jsonFactory;

	/**
	 * @var LoggerInterface
	 */
	protected $_logger;

	/**
	 * Ajax constructor.
	 *
	 * @param Context $context
	 * @param JsonFactory $jsonFactory
	 */
	public function __construct(
		Context $context,
		JsonFactory $jsonFactory,
		LoggerInterface $logger
	) {
		parent::__construct( $context );

		$this->_jsonFactory = $jsonFactory;
		$this->_logger = $logger;
	}

	/**
	 * save cusotmer data form to file
	 *
	 * result: http://take.ms/TgAGS
	 *
	 * @return $this
	 */
	public function execute()
	{
		$response = new DataObject();
		$response->setError(false);
		try {
			$this->_logger->info(var_export($this->getRequest()->getParams(), true));
			$response->setMessage('ajax response code: 200');
		} catch (Exception $e) {
			$response->setError(true);
			$response->setMessage('ajx response error: ' . $e->getMessage());
		}

		return $this->_jsonFactory->create()->setJsonData($response->toJson());
	}
}