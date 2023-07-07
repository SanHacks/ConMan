<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Api;

use Magento\Framework\Exception\CouldNotSaveException;
use SageBytez\ConMan\Api\Data\ConManInterface;

/**
 * Save ConMan Command.
 *
 * @api
 */
interface SaveConManInterface
{
    /**
     * Save ConMan.
     * @param \SageBytez\ConMan\Api\Data\ConManInterface $conMan
     * @return int
     * @throws CouldNotSaveException
     */
    public function execute(ConManInterface $conMan): int;
}
