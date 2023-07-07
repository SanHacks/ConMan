<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use SageBytez\ConMan\Api\Data\ConManSearchResultsInterface;

/**
 * Get ConMan list by search criteria query.
 *
 * @api
 */
interface GetConManListInterface
{
    /**
     * Get ConMan list by search criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface|null $searchCriteria
     * @return \SageBytez\ConMan\Api\Data\ConManSearchResultsInterface
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): ConManSearchResultsInterface;
}
