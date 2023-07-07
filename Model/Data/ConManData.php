<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Model\Data;

use Magento\Framework\DataObject;
use SageBytez\ConMan\Api\Data\ConManInterface;

class ConManData extends DataObject implements ConManInterface
{
    /**
     * Getter for ConManId.
     *
     * @return int|null
     */
    public function getConManId(): ?int
    {
        return $this->getData(self::CON_MAN_ID) === null ? null
            : (int)$this->getData(self::CON_MAN_ID);
    }

    /**
     * Setter for ConManId.
     *
     * @param int|null $conManId
     *
     * @return void
     */
    public function setConManId(?int $conManId): void
    {
        $this->setData(self::CON_MAN_ID, $conManId);
    }

    /**
     * Getter for ProductId.
     *
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->getData(self::PRODUCT_ID) === null ? null
            : (int)$this->getData(self::PRODUCT_ID);
    }

    /**
     * Setter for ProductId.
     *
     * @param int|null $productId
     *
     * @return void
     */
    public function setProductId(?int $productId): void
    {
        $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * Getter for StoreId.
     *
     * @return int|null
     */
    public function getStoreId(): ?int
    {
        return $this->getData(self::STORE_ID) === null ? null
            : (int)$this->getData(self::STORE_ID);
    }

    /**
     * Setter for StoreId.
     *
     * @param int|null $storeId
     *
     * @return void
     */
    public function setStoreId(?int $storeId): void
    {
        $this->setData(self::STORE_ID, $storeId);
    }

    /**
     * Getter for CustomerId.
     *
     * @return int|null
     */
    public function getCustomerId(): ?int
    {
        return $this->getData(self::CUSTOMER_ID) === null ? null
            : (int)$this->getData(self::CUSTOMER_ID);
    }

    /**
     * Setter for CustomerId.
     *
     * @param int|null $customerId
     *
     * @return void
     */
    public function setCustomerId(?int $customerId): void
    {
        $this->setData(self::CUSTOMER_ID, $customerId);
    }

    /**
     * Getter for CustomerGroup.
     *
     * @return int|null
     */
    public function getCustomerGroup(): ?int
    {
        return $this->getData(self::CUSTOMER_GROUP) === null ? null
            : (int)$this->getData(self::CUSTOMER_GROUP);
    }

    /**
     * Setter for CustomerGroup.
     *
     * @param int|null $customerGroup
     *
     * @return void
     */
    public function setCustomerGroup(?int $customerGroup): void
    {
        $this->setData(self::CUSTOMER_GROUP, $customerGroup);
    }

    /**
     * Getter for Category.
     *
     * @return string|null
     */
    public function getCategory(): ?string
    {
        return $this->getData(self::CATEGORY);
    }

    /**
     * Setter for Category.
     *
     * @param string|null $category
     *
     * @return void
     */
    public function setCategory(?string $category): void
    {
        $this->setData(self::CATEGORY, $category);
    }
}
