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
 * Date: 21.11.17 Time: 17:18
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Registry\Controller\Index;

use Magento\Catalog\Api\ProductRepositoryInterface;

use Magento\Catalog\Model\Product\Type;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\Api\SortOrderBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/**
 * Class Index
 * @package Training\Orm\Controller\Index
 */
class Index extends Action
{
	/**
	 * @var ProductRepositoryInterface
	 */
	protected $_productRepository;

	/**
	 * @var SearchCriteriaBuilder
	 */
	protected $_searchCriteria;

	/**
	 * @var FilterBuilder
	 */
	protected $_filterBuilder;

	/**
	 * @var SortOrder
	 */
	protected $_sortOrder;

	/**
	 * Index constructor.
	 *
	 * @param Context $context
	 * @param ProductRepositoryInterface $productRepository
	 * @param SearchCriteriaBuilder $searchCriteria
	 * @param FilterBuilder $filterBuider
	 */
	public function __construct(
		Context $context,
		ProductRepositoryInterface $productRepository,
		SearchCriteriaBuilder $searchCriteria,
		FilterBuilder $filterBuilder,
		SortOrder $sortOrder
	) {
		$this->_productRepository = $productRepository;
		$this->_searchCriteria = $searchCriteria;
		$this->_filterBuilder = $filterBuilder;
		$this->_sortOrder = $sortOrder;

		parent::__construct( $context );
	}

	/**
	 * result: http://take.ms/1rWgSt
	 *
	 * @return $this
	 */
	public function execute()
	{
		$firstCondition = $this->_filterBuilder->setField('sku')->setValue('0')->setConditionType('neq');
		$this->_searchCriteria->addFilters([$firstCondition->create()]);

		$secondCondition = $this->_filterBuilder->setField('type_id')->setValue(Type::TYPE_SIMPLE)->setConditionType('eq');
		$this->_searchCriteria->addFilters([$secondCondition->create()]);

		$sortCondition = $this->_sortOrder->setField('name')->setDirection(SortOrder::SORT_DESC);
		$this->_searchCriteria->addSortOrder($sortCondition);

		$this->_searchCriteria->setPageSize(2);
		$this->_searchCriteria->setCurrentPage(1);

		foreach ($this->_productRepository->getList($this->_searchCriteria->create())->getItems() as $_id => $product) {
			//var_dump($product->getData());
			$this->getResponse()->appendBody(
				$_id . ' : name: ' . $product->getName() . ' , price: ' . $product->getFinalPrice() . "<br />\n"
			);
		}
	}
}