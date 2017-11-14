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
 * Date: 14.11.17 Time: 21:32
 * @category    CreateStores
 * @package
 * @copyright   Copyright (c) 2017 CreateStores Inc. (http://www.createstores.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Training\Orm\Model\Eav\Entity\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

/**
 * Class Select
 * @package Training\Orm\Model\Eav\Entity\Attribute\Source
 */
class Select extends AbstractSource
{
	/**
	 * result: http://take.ms/8fCQx
	 *
	 * @return array|null
	 */
	public function getAllOptions()
	{
		if ($this->_options === null) {

			for ($i = 0; $i < 11; $i++) {
				$this->_options[] = ['label' => __('#' . $i), 'value' => $i];
			}

		}
		return $this->_options;
	}
}