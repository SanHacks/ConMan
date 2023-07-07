<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Controller\Adminhtml\ConMan;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\DataObject;
use Magento\Framework\Exception\CouldNotSaveException;
use SageBytez\ConMan\Api\Data\ConManInterface;
use SageBytez\ConMan\Api\SaveConManInterface;

/**
 * Save ConMan controller action.
 */
class Save extends Action implements HttpPostActionInterface
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    public const ADMIN_RESOURCE = 'SageBytez_ConMan::management';

    /**
     * @var DataPersistorInterface
     */
    private DataPersistorInterface $dataPersistor;

    /**
     * @var SaveConManInterface
     */
    private SaveConManInterface $saveCommand;

    /**
     * @var ConManInterface
     */
    private ConManInterface $entityDataFactory;

    /**
     * @param Context $context
     * @param DataPersistorInterface $dataPersistor
     * @param SaveConManInterface $saveCommand
     * @param ConManInterface $entityDataFactory
     */
    public function __construct(
        Context                $context,
        DataPersistorInterface $dataPersistor,
        SaveConManInterface    $saveCommand,
        ConManInterface $entityDataFactory
    )
    {
        parent::__construct($context);
        $this->dataPersistor = $dataPersistor;
        $this->saveCommand = $saveCommand;
        $this->entityDataFactory = $entityDataFactory;
    }

    /**
     * Save ConMan Action.
     *
     * @return ResponseInterface|ResultInterface
     */
    public function execute(): ResultInterface|ResponseInterface
    {
        $resultRedirect = $this->resultRedirectFactory;
        $params = $this->getRequest()->getParams();

        try {
            /** @var ConManInterface|DataObject $entityModel */
            $entityModel = $this->entityDataFactory;
            $entityModel->addData($params['general']);
            $this->saveCommand->execute($entityModel);
            $this->messageManager->addSuccessMessage(
                __('The ConMan data was saved successfully')
            );
            $this->dataPersistor->clear('entity');
        } catch (CouldNotSaveException $exception) {
            $this->messageManager->addErrorMessage($exception->getMessage());
            $this->dataPersistor->set('entity', $params);

            //Set redirect back to edit form
        }

        return $resultRedirect->create();
    }
}
