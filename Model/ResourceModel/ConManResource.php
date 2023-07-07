<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use SageBytez\ConMan\Api\Data\ConManInterface;

class ConManResource extends AbstractDb
{
    /**
     * @var string
     */
    protected string $_eventPrefix = 'con_man_id';

    /**
     * Initialize resource model.
     */
    protected function _construct(): void
    {
        $this->_init('con_man', ConManInterface::CON_MAN_ID);
        $this->_useIsObjectNew = true;
    }
}
