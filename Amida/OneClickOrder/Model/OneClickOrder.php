<?php

namespace Amida\OneClickOrder\Model;

use Amida\OneClickOrder\Model\ResourceModel\OneClickOrder as ResourceModel;
use Magento\Framework\Model\AbstractModel;
use Amida\OneClickOrder\Api\Data\OneClickOrderInterface;

class OneClickOrder extends AbstractModel implements OneClickOrderInterface
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'one_click_order_model';

    /**
     * Initialize magento model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }

    /**
     * Get order ID
     *
     * @return string
     */
    public function getOrderId(): int
    {
        $orderId = (int) $this->getData(self::ORDER_ID);
        return $orderId;
    }

    /**
     * Set order ID
     *
     * @param $id
     * @return OneClickOrder
     */
    public function setOrderId($id)
    {
        return $this->setData(self::ORDER_ID, (int) $id);
    }

    /**
     * Get order SKU
     *
     * @return string
     */
    public function getOrderSku(): string
    {
        $orderSku = $this->getData(self::ORDER_SKU);
        return $orderSku;
    }

    /**
     * Set order SKU
     *
     * @param string $sku
     * @return OneClickOrder
     */
    public function setOrderSku(string $sku)
    {
        return $this->setData(self::ORDER_SKU, $sku);
    }

    /**
     * Get Product ID
     *
     * @return int
     */
    public function getProductId(): int
    {
        $productId = (int) $this->getData(self::PRODUCT_ID);
        return $productId;
    }

    /**
     * Set Product ID
     *
     * @param int $productId
     * @return OneClickOrder
     */
    public function setProductId(int $productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * Get customer's telephone number
     *
     * @return string
     */
    public function getTelephoneNumber(): string
    {
        $telephoneNumber = $this->getData(self::TELEPHONE_NUMBER);
        return $telephoneNumber;
    }

    /**
     * Set customer's telephone number
     *
     * @param string $telephoneNumber
     * @return OneClickOrder
     */
    public function setTelephoneNumber(string $telephoneNumber)
    {
        return $this->setData(self::TELEPHONE_NUMBER, $telephoneNumber);
    }

    /**
     * Get order creation date
     *
     * @return string
     */
    public function getOrderCreated(): string
    {
        $orderCreated = $this->getData(self::ORDER_CREATED);
        return $orderCreated;
    }

    /**
     * Set order creation date
     *
     * @param string $orderCreated
     * @return OneClickOrder
     */
    public function setOrderCreated(string $orderCreated)
    {
        return $this->setData(self::ORDER_CREATED, $orderCreated);
    }
}
