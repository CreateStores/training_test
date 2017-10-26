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
 * Date: 26.10.17 Time: 17:56
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Test\Controller\Adminhtml\Action;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\UrlInterface;
use Magento\Framework\App\ActionFlag;
use Magento\Framework\App\Response\RedirectInterface;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Training\Test\Controller\Action
 */
class Index extends Action
{
	/**
	 * @var \Magento\Framework\View\Result\PageFactory
	 */
	protected $_resultPageFactory;

	/**
	 * @var RedirectInterface
	 */
	protected $_redirect;

	/**
	 * @var ActionFlag
	 */
	protected $_actionFlag;

	/**
	 * @var UrlInterface
	 */
	protected $_url;

	/**
	 * Index constructor.
	 *
	 * @see http://devdocs.magento.com/guides/v2.2/ext-best-practices/extension-coding/example-module-adminpage.html
	 *
	 * @param Context $context
	 * @param PageFactory $pageFactory
	 * @param ActionFlag $actionFlag
	 * @param RedirectInterface $redirect
	 * @param UrlInterface $url
	 */
	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		ActionFlag $actionFlag,
		RedirectInterface $redirect,
		UrlInterface $url
	) {
		parent::__construct($context); //obligatory for backend menu!!!
		$this->_resultPageFactory = $pageFactory;//obligatory for backend???

		$this->_actionFlag = $actionFlag;
		$this->_redirect = $redirect;
		$this->_url = $url;
	}

	/**
	 * TODO: remember url HAS appear via menu WITH /KEY/
	 * TODO: like http://magento.dev/admin/test_backend/action/index/key/53bc135d61f8ff5e1c3a1ae8e184051d8efceeb19a92c1a6873eef763b54ed22/
	 * TODO: else redirect to dashboard
	 *
	 * actual url is:
	 *
	 *
	 *  http://magento.dev/admin/test/action/index
	 *
	 * @return $this
	 */
	public function execute()
	{
		$this->_actionFlag->set('', Action::FLAG_NO_DISPATCH, true);
		$this->_redirect->redirect($this->getResponse(), 'catalog/category/index', array('id' => 3));

		//return $resultPage = $this->_resultPageFactory->create(); // generate MENU: obligatory for backend!!!
		return $this->getResponse()->appendBody('Hello World, REDIRECT: ' . $this->getUrl('admin/catalog/category/index/id/3'));
	}

	/**
	 * TODO: comment for redirect tasks
	 * access to admin via secret parameter
	 *
	 * @return bool
	 */
//	protected function _isAllowed()
//	{
//		$secret = $this->getRequest()->getParam('secret');
//		return isset($secret) && (int)$secret == 1;
//	}
}