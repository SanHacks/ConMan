<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * ConMan entity search result.
 */
interface ConManSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Set items.
     *
     * @param \SageBytez\ConMan\Api\Data\ConManInterface[] $items
     *
     * @return ConManSearchResultsInterface
     */
    public function setItems(array $items): ConManSearchResultsInterface;

    /**
     * Get items.
     *
     * @return \SageBytez\ConMan\Api\Data\ConManInterface[]
     */
    public function getItems(): array;
}
