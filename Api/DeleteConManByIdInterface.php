<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Api;

use Magento\Framework\Exception\CouldNotDeleteException;

/**
 * Delete ConMan by id Command.
 *
 * @api
 */
interface DeleteConManByIdInterface
{
    /**
     * Delete ConMan.
     * @param int $entityId
     * @return void
     * @throws CouldNotDeleteException
     */
    public function execute(int $entityId): void;
}
