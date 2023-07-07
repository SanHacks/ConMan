<?php
/*
 * *
 *  * Copyright © Gundo Sifhufhi. All rights reserved.
 *  * See Github_Sanhacks.txt for license details.
 *
 */

namespace SageBytez\ConMan\Api\Data;

interface ConManInterface
{
    /**
     * String constants for property names
     */
    public const CON_MAN_ID = "con_man_id";
    public const PRODUCT_ID = "product_id";
    public const STORE_ID = "store_id";
    public const CUSTOMER_ID = "customer_id";
    public const CUSTOMER_GROUP = "customer_group";
    public const CATEGORY = "category";

    /**
     * Getter for ConManId.
     *
     * @return int|null
     */
    public function getConManId(): ?int;

    /**
     * Setter for ConManId.
     *
     * @param int|null $conManId
     *
     * @return void
     */
    public function setConManId(?int $conManId): void;

    /**
     * Getter for ProductId.
     *
     * @return int|null
     */
    public function getProductId(): ?int;

    /**
     * Setter for ProductId.
     *
     * @param int|null $productId
     *
     * @return void
     */
    public function setProductId(?int $productId): void;

    /**
     * Getter for StoreId.
     *
     * @return int|null
     */
    public function getStoreId(): ?int;

    /**
     * Setter for StoreId.
     *
     * @param int|null $storeId
     *
     * @return void
     */
    public function setStoreId(?int $storeId): void;

    /**
     * Getter for CustomerId.
     *
     * @return int|null
     */
    public function getCustomerId(): ?int;

    /**
     * Setter for CustomerId.
     *
     * @param int|null $customerId
     *
     * @return void
     */
    public function setCustomerId(?int $customerId): void;

    /**
     * Getter for CustomerGroup.
     *
     * @return int|null
     */
    public function getCustomerGroup(): ?int;

    /**
     * Setter for CustomerGroup.
     *
     * @param int|null $customerGroup
     *
     * @return void
     */
    public function setCustomerGroup(?int $customerGroup): void;

    /**
     * Getter for Category.
     *
     * @return string|null
     */
    public function getCategory(): ?string;

    /**
     * Setter for Category.
     *
     * @param string|null $category
     *
     * @return void
     */
    public function setCategory(?string $category): void;
}
