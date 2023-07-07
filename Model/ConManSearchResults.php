<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Model;

use Magento\Framework\Api\SearchResults;
use SageBytez\ConMan\Api\Data\ConManSearchResultsInterface;

/**
 * ConMan entity search results implementation.
 */
class ConManSearchResults extends SearchResults implements ConManSearchResultsInterface
{
    /**
     * Set items list.
     *
     * @param array $items
     *
     * @return ConManSearchResultsInterface
     */
    public function setItems(array $items): ConManSearchResultsInterface
    {
        return parent::setItems($items);
    }

    /**
     * Get items list.
     *
     * @return array
     */
    public function getItems(): array
    {
        return parent::getItems();
    }
}
