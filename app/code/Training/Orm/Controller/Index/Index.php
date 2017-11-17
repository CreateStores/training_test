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
 * Date: 17.11.17 Time: 23:18
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Orm\Controller\Index;

use Magento\Catalog\Model\ProductRepository;
use Magento\Eav\Model\Entity\Attribute;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/**
 * Class Index
 * @package Training\Orm\Controller\Index
 */
class Index extends Action
{
	/**
	 * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
	 */
	protected $_productCollectionFactory;

	/**
	 * @var Attribute
	 */
	protected $_attribute;

	/**
	 * @var ProductRepository
	 */
	protected $_productRepository;

	/**
	 * @var SearchCriteriaBuilder
	 */
	protected $_searchCriteriaBuilder;

	/**
	 * Index constructor.
	 *
	 * @param Context $context
	 * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
	 * @param Attribute $attribute
	 * @param ProductRepository $productRepository
	 * @param SearchCriteriaBuilder $searchCriteriaBuilder
	 */
	public function __construct(
		Context $context,
	    \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
		Attribute $attribute,
		ProductRepository $productRepository,
		SearchCriteriaBuilder $searchCriteriaBuilder
	) {
		$this->_productCollectionFactory = $productCollectionFactory;
		$this->_attribute = $attribute;
		$this->_productRepository = $productRepository;
		$this->_searchCriteriaBuilder = $searchCriteriaBuilder;

		parent::__construct( $context );
	}

	/**
	 * result: http://take.ms/qrH3C
	 *
	 * @return $this
	 */
	public function execute()
	{
		$attributeCode = 'material_multiselect';

		$attribute = $this->_attribute->loadByCode(\Magento\Catalog\Model\Product::ENTITY, $attributeCode);
		$id = $attribute->getSource()->getOptionId('Steel');

//		$productCollection = $this->_productCollectionFactory->create();
//		$productCollection->addAttributeToFilter($attributeCode, ['like' => array('%' . $id . '%')] );
//
//		echo '<pre>';
//		foreach ($productCollection as $product) {
//			var_dump($product->getData());
//		}


		$this->_searchCriteriaBuilder->addFilter($attributeCode, array('%' . $id . '%'), 'like');

		echo '<pre>';
		foreach ($this->_productRepository->getList($this->_searchCriteriaBuilder->create())->getItems() as $product) {
			var_dump($product->getData());
		}

		exit('exit');
	}
}