<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Command\ConMan;

use Exception;
use Magento\Framework\Exception\CouldNotSaveException;
use Psr\Log\LoggerInterface;
use SageBytez\ConMan\Api\Data\ConManInterface;
use SageBytez\ConMan\Api\SaveConManInterface;
use SageBytez\ConMan\Model\ConManModel;
use SageBytez\ConMan\Model\ResourceModel\ConManResource;

/**
 * Save ConMan Command.
 */
class SaveCommand implements SaveConManInterface
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
    public function execute(ConManInterface $conMan): int
    {
        try {
            /** @var ConManModel $model */
            $model = $this->modelFactory;
            $model->addData($conMan->getData());
            $model->setHasDataChanges(true);

            if (!$model->getData(ConManInterface::CON_MAN_ID)) {
                $model->isObjectNew(true);
            }
            $this->resource->save($model);
        } catch (Exception $exception) {
            $this->logger->error(
                __('Could not save ConMan. Original message: {message}'),
                [
                    'message' => $exception->getMessage(),
                    'exception' => $exception
                ]
            );
            throw new CouldNotSaveException(__('Could not save ConMan.'));
        }

        return (int)$model->getData(ConManInterface::CON_MAN_ID);
    }
}
