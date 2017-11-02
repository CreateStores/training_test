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
use Magento\Store\Model\ResourceModel\Store\Collection;
use Magento\Catalog\Model\ResourceModel\Category\Collection as CategoryCollection;

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
	 * @var Collection|Store
	 */
	protected $_storeCollection;

	protected $_categoryCollection;

	/**
	 * Onepage constructor.
	 *
	 * @param Context $context
	 * @param PageFactory $pageFactory
	 * @param Collection $storeCollection
	 * @param CategoryCollection $categoryCollection
	 */
	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		Collection $storeCollection,
		CategoryCollection $categoryCollection
	) {
		$this->_resultPageFactory = $pageFactory;
		$this->_storeCollection   = $storeCollection;
		$this->_categoryCollection = $categoryCollection;

		parent::__construct( $context );
	}

	/**
	 * result: http://take.ms/T4coK
	 *
	 * @return \Magento\Framework\View\Result\Page
	 */
	public function execute()
	{
		/** @var \Magento\Store\Model\Store $store */
		foreach($this->_storeCollection->getItems() as $store) {
			$rootId = $store->getRootCategoryId();
			$this->_categoryCollection
				->addFieldToSelect('name')
				->addFieldToFilter(
				'parent_id', $rootId
			);
			$categories = $this->_categoryCollection->getItems();
			echo '<pre>';
			foreach ($categories as $category) {
				echo print_r($category->getData());
			}

		}
		exit('aaaaa');

		$page = $this->_resultPageFactory->create();
		return $page;
	}
}