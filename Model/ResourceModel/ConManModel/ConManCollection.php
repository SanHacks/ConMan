<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Model\ResourceModel\ConManModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use SageBytez\ConMan\Model\ConManModel;
use SageBytez\ConMan\Model\ResourceModel\ConManResource;

class ConManCollection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'con_man_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(ConManModel::class, ConManResource::class);
    }
}
