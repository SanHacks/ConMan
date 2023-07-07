<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Model;

use Magento\Framework\Model\AbstractModel;
use SageBytez\ConMan\Model\ResourceModel\ConManResource;

class ConManModel extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'con_man';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct(): void
    {
        $this->_init(ConManResource::class);
    }
}
