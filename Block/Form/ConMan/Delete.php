<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Block\Form\ConMan;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use SageBytez\ConMan\Api\Data\ConManInterface;

/**
 * Delete entity button.
 */
class Delete extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve Delete button settings.
     *
     * @return array
     */
    public function getButtonData(): array
    {
        if (!$this->getConManId()) {
            return [];
        }

        return $this->wrapButtonSettings(
            __('Delete')->getText(),
            'delete',
            sprintf("deleteConfirm('%s', '%s')",
                __('Are you sure you want to delete this conman?'),
                $this->getUrl(
                    '*/*/delete',
                    [ConManInterface::CON_MAN_ID => $this->getConManId()]
                )
            ),
            [],
            20
        );
    }
}
