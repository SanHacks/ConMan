<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Query\ConMan;

use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaInterface;
use SageBytez\ConMan\Api\Data\ConManSearchResultsInterface;
use SageBytez\ConMan\Api\GetConManListInterface;
use SageBytez\ConMan\Mapper\ConManDataMapper;
use SageBytez\ConMan\Model\ResourceModel\ConManModel\ConManCollection;

/**
 * Get ConMan list by search criteria query.
 */
class GetListQuery implements GetConManListInterface
{
    /**
     * @var CollectionProcessorInterface
     */
    private CollectionProcessorInterface $collectionProcessor;

    /**
     * @var ConManCollection
     */
    private ConManCollection $entityCollectionFactory;

    /**
     * @var ConManDataMapper
     */
    private ConManDataMapper $entityDataMapper;

    /**
     * @var SearchCriteriaBuilder
     */
    private SearchCriteriaBuilder $searchCriteriaBuilder;

    /**
     * @var ConManSearchResultsInterface
     */
    private ConManSearchResultsInterface $searchResultFactory;

    /**
     * @param CollectionProcessorInterface $collectionProcessor
     * @param ConManCollection $entityCollectionFactory
     * @param ConManDataMapper $entityDataMapper
     * @param SearchCriteriaBuilder $searchCriteriaBuilder
     * @param ConManSearchResultsInterface $searchResultFactory
     */
    public function __construct(
        CollectionProcessorInterface        $collectionProcessor,
        ConManCollection             $entityCollectionFactory,
        ConManDataMapper                    $entityDataMapper,
        SearchCriteriaBuilder               $searchCriteriaBuilder,
        ConManSearchResultsInterface $searchResultFactory
    )
    {
        $this->collectionProcessor = $collectionProcessor;
        $this->entityCollectionFactory = $entityCollectionFactory;
        $this->entityDataMapper = $entityDataMapper;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->searchResultFactory = $searchResultFactory;
    }

    /**
     * @inheritDoc
     */
    public function execute(?SearchCriteriaInterface $searchCriteria = null): ConManSearchResultsInterface
    {
        $collection = $this->entityCollectionFactory;

        if ($searchCriteria === null) {
            $searchCriteria = $this->searchCriteriaBuilder->create();
        } else {
            $this->collectionProcessor->process($searchCriteria, $collection);
        }

        $entityDataObjects = $this->entityDataMapper->map($collection);

        $searchResult = $this->searchResultFactory;
        $searchResult->setItems($entityDataObjects);
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setSearchCriteria($searchCriteria);

        return $searchResult;
    }
}
