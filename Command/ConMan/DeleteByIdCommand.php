<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Command\ConMan;

use Exception;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Psr\Log\LoggerInterface;
use SageBytez\ConMan\Api\Data\ConManInterface;
use SageBytez\ConMan\Api\DeleteConManByIdInterface;
use SageBytez\ConMan\Model\ConManModel;
use SageBytez\ConMan\Model\ResourceModel\ConManResource;

/**
 * Delete ConMan by id Command.
 */
class DeleteByIdCommand implements DeleteConManByIdInterface
{
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @var ConManModel
     */
    private ConManModel $modelFactory;

    /**
     * @var ConManResource
     */
    private ConManResource $resource;

    /**
     * @param LoggerInterface $logger
     * @param ConManModel $modelFactory
     * @param ConManResource $resource
     */
    public function __construct(
        LoggerInterface    $logger,
        ConManModel $modelFactory,
        ConManResource     $resource
    )
    {
        $this->logger = $logger;
        $this->modelFactory = $modelFactory;
        $this->resource = $resource;
    }

    /**
     * @inheritDoc
     */
    public function execute(int $entityId): void
    {
        try {
            /** @var ConManModel $model */
            $model = $this->modelFactory;
            $this->resource->load($model, $entityId, ConManInterface::CON_MAN_ID);

            if (!$model->getData(ConManInterface::CON_MAN_ID)) {
                throw new NoSuchEntityException(
                    __('Could not find ConMan with id: `%id`',
                        [
                            'id' => $entityId
                        ]
                    )
                );
            }

            $this->resource->delete($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not delete ConMan. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotDeleteException(__('Could not delete ConMan.'));
        }
    }
}
