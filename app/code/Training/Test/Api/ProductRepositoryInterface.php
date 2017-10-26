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
 * Date: 26.10.17 Time: 12:33
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Test\Api;
/**
 * interface ProductRepositoryInterface
 */
interface ProductRepositoryInterface
{
	/**
	 * Create product
	 *
	 * @param \Magento\Catalog\Api\Data\ProductInterface $product
	 * @param bool $saveOptions
	 * @return \Magento\Catalog\Api\Data\ProductInterface
	 * @throws \Magento\Framework\Exception\InputException
	 * @throws \Magento\Framework\Exception\StateException
	 * @throws \Magento\Framework\Exception\CouldNotSaveException
	 */
	public function save(\Magento\Catalog\Api\Data\ProductInterface $product, $saveOptions = false);

	/**
	 * Get info about product by product SKU
	 *
	 * @param string $sku
	 * @param bool $editMode
	 * @param int|null $storeId
	 * @param bool $forceReload
	 * @return \Magento\Catalog\Api\Data\ProductInterface
	 * @throws \Magento\Framework\Exception\NoSuchEntityException
	 */
	public function get($sku, $editMode = false, $storeId = null, $forceReload = false);

	/**
	 * Get info about product by product id
	 *
	 * @param int $productId
	 * @param bool $editMode
	 * @param int|null $storeId
	 * @param bool $forceReload
	 * @return \Magento\Catalog\Api\Data\ProductInterface
	 * @throws \Magento\Framework\Exception\NoSuchEntityException
	 */
	public function getById($productId, $editMode = false, $storeId = null, $forceReload = false);

	/**
	 * Delete product
	 *
	 * @param \Magento\Catalog\Api\Data\ProductInterface $product
	 * @return bool Will returned True if deleted
	 * @throws \Magento\Framework\Exception\StateException
	 */
	public function delete(\Magento\Catalog\Api\Data\ProductInterface $product);

	/**
	 * @param string $sku
	 * @return bool Will returned True if deleted
	 * @throws \Magento\Framework\Exception\NoSuchEntityException
	 * @throws \Magento\Framework\Exception\StateException
	 */
	public function deleteById($sku);

	/**
	 * Get product list
	 *
	 * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
	 * @return \Magento\Catalog\Api\Data\ProductSearchResultsInterface
	 */
	public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);
}