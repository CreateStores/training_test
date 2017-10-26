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
 * Date: 26.10.17 Time: 15:04
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Test\Observer;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;


/**
 * Class App
 */
class App implements ObserverInterface
{
	/**
	 * @var RedirectInterface
	 */
	protected $_redirect;

	/**
	 * @var ActionFlag
	 */
	protected $_actionFlag;

	/**
	 * App constructor.
	 *
	 * @param RedirectInterface $redirect
	 * @param ActionFlag $actionFlag
	 */
	public function __construct(
		RedirectInterface $redirect,
		ActionFlag $actionFlag
	) {
		$this->_redirect = $redirect;
		$this->_actionFlag = $actionFlag;
	}

	/**
	 * TODO: commented all logic: cuz impossible to test the remained tasks
	 *
	 * event: controller_action_predispatch
	 *
	 * @param Observer $observer
	 *
	 * @return $this
	 */
	public function execute( Observer $observer )
	{
		/** @var \Magento\Framework\App\RequestInterface $request */
		$request = $observer->getEvent()->getRequest();
		if ($request->getModuleName() != 'catalog' && $request->getModuleName() != 'product'
		    && $request->getModuleName() != 'checkout' && $request->getModuleName() != 'sales') {

			//$this->_actionFlag->set('', Action::FLAG_NO_DISPATCH, true);
			//$this->_redirect->redirect($observer->getEvent()->getControllerAction()->getResponse(),
			//	'catalog/product/view/id/1');

		}
		return $this;
	}
}