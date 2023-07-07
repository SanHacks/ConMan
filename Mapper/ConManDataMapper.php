<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Mapper;

use Magento\Framework\DataObject;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use SageBytez\ConMan\Api\Data\ConManInterface;
use SageBytez\ConMan\Model\ConManModel;

/**
 * Converts a collection of ConMan entities to an array of data transfer objects.
 */
class ConManDataMapper
{
    /**
     * @var ConManInterface
     */
    private ConManInterface $entityDtoFactory;

    /**
     * @param ConManInterface $entityDtoFactory
     */
    public function __construct(
        ConManInterface $entityDtoFactory
    )
    {
        $this->entityDtoFactory = $entityDtoFactory;
    }

    /**
     * Map magento models to DTO array.
     *
     * @param AbstractCollection $collection
     *
     * @return array|ConManInterface[]
     */
    public function map(AbstractCollection $collection): array
    {
        $results = [];
        /** @var ConManModel $item */
        foreach ($collection->getItems() as $item) {
            /** @var ConManInterface|DataObject $entityDto */
            $entityDto = $this->entityDtoFactory;
            $entityDto->addData($item->getData());

            $results[] = $entityDto;
        }

        return $results;
    }
}
