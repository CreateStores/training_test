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
 * Date: 24.11.17 Time: 20:20
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Registry\Controller\Index;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\Search\FilterGroup;
use Magento\Framework\Api\Search\FilterGroupBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/**
 * Class Customer
 * @package Training\Registry\Controller\Index
 */
class Customer extends Action
{
	/**
	 * @var CustomerRepositoryInterface
	 */
	protected $_customerRepository;

	/**
	 * @var SearchCriteriaBuilder
	 */
	protected $_searchCriteriaBuilder;

	/**
	 * @var FilterBuilder
	 */
	protected $_filterBuilder;


	protected $_filterGroupBuilder;

	/**
	 * Customer constructor.
	 *
	 * @param Context $context
	 * @param CustomerRepositoryInterface $customerRepository
	 * @param SearchCriteriaBuilder $searchCriteriaBuilder
	 * @param FilterBuilder $filterBuilder
	 * @param FilterGroupBuilder $filterGroupBuilder
	 */
	public function __construct(
		Context $context,
		CustomerRepositoryInterface $customerRepository,
		SearchCriteriaBuilder $searchCriteriaBuilder,
		FilterBuilder $filterBuilder,
		FilterGroupBuilder $filterGroupBuilder
	)
	{
		$this->_customerRepository    = $customerRepository;
		$this->_searchCriteriaBuilder = $searchCriteriaBuilder;
		$this->_filterBuilder         = $filterBuilder;
		$this->_filterGroupBuilder    = $filterGroupBuilder;

		parent::__construct( $context );
	}

	/**
	 * result: http://take.ms/mmypZ
	 */
	public function execute()
	{
		$one = $this->_filterBuilder->setField('email')->setValue('howikyj_test%')->setConditionType('like');
		$this->_filterGroupBuilder->addFilter($one->create());

		$two = $this->_filterBuilder->setField('lastname')->setValue('Chandler')->setConditionType('eq');
		$this->_filterGroupBuilder->addFilter($two->create());

		$this->_searchCriteriaBuilder->setFilterGroups([$this->_filterGroupBuilder->create()]);
		$customers = $this->_customerRepository->getList($this->_searchCriteriaBuilder->create())->getItems();

		$this->getResponse()->setHeader('content-type', 'text/plain');
		foreach ($customers as $_id => $customer) {
			$this->getResponse()->appendBody($_id . ' name: ' . $customer->getLastname() . ' , email: ' . $customer->getEmail() . "\n");
		}


	}
}