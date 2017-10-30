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
 * Date: 30.10.17 Time: 21:50
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Render\Controller\Layout;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Onepage
 * @package Training\Render\Controller\Layout
 */
class Onepage extends Action
{
	/**
	 * @var PageFactory
	 */
	protected $_resultPageFactory;

	/**
	 * Onepage constructor.
	 *
	 * @param Context $context
	 * @param PageFactory $pageFactory
	 */
	public function __construct(
		Context $context,
		PageFactory $pageFactory
	) {
		$this->_resultPageFactory = $pageFactory;
		parent::__construct( $context );
	}

	/**
	 * result: http://take.ms/9yBqV
	 *
	 * @return \Magento\Framework\View\Result\Page
	 */
	public function execute()
	{
		$page = $this->_resultPageFactory->create();
		return $page;
	}
}