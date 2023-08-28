<?php

namespace Amida\OneClickOrder\Api\Data;

interface OneClickOrderInterface
{

    public const ORDER_ID = "entity_id";

    public const ORDER_SKU = "sku";

    public const PRODUCT_ID = "product_id";

    public const TELEPHONE_NUMBER = "telephone_number";

    public const ORDER_CREATED = "order_created";

    /**
     * Get Order ID
     *
     * @return int
     */
    public function getOrderId(): int;

    /**
     * Set Order ID
     *
     * @param int $id
     * @return mixed
     */
    public function setOrderId(int $id);

    /**
     * Get Product SKU
     *
     * @return string
     */
    public function getOrderSku(): string;

    /**
     * Set Product SKU
     *
     * @param string $sku
     * @return mixed
     */
    public function setOrderSku(string $sku);

    /**
     * Get Product ID
     *
     * @return int
     */
    public function getProductId(): int;

    /**
     * Set Product ID
     *
     * @param int $productId
     * @return mixed
     */
    public function setProductId(int $productId);

    /**
     * Get customer's telephone number
     *
     * @return string
     */
    public function getTelephoneNumber(): string;

    /**
     * Set customer's telephone number
     *
     * @param string $telephoneNumber
     * @return mixed
     */
    public function setTelephoneNumber(string $telephoneNumber);

    /**
     * Get order creation date
     *
     * @return string
     */
    public function getOrderCreated(): string;

    /**
     * Set order creation date
     *
     * @param string $orderCreated
     * @return mixed
     */
    public function setOrderCreated(string $orderCreated);
}
