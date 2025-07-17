<?php

namespace Amida\OneClickOrder\Model;

use Amida\OneClickOrder\Api\OneClickOrderRepositoryInterface;

use Amida\OneClickOrder\Api\Data\OneClickOrderInterface;
use Amida\OneClickOrder\Model\ResourceModel\OneClickOrder\CollectionFactory;
use Amida\OneClickOrder\Model\OneClickOrderFactory;
use Amida\OneClickOrder\Model\ResourceModel\OneClickOrder as OneClickOrderResource;
use Magento\Framework\Exception\LocalizedException;

class OneClickOrderRepository implements OneClickOrderRepositoryInterface
{

    /**
     * @param CollectionFactory $collectionFactory
     * @param OneClickOrderFactory $oneClickOrderFactory
     * @param OneClickOrderResource $oneClickOrderResource
     */
    public function __construct(
        CollectionFactory $collectionFactory,
        OneClickOrderFactory $oneClickOrderFactory,
        OneClickOrderResource $oneClickOrderResource
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->oneClickOrderFactory = $oneClickOrderFactory;
        $this->oneClickOrderResource = $oneClickOrderResource;
    }

    /**
     * Get list of orders
     *
     * @return array
     */
    public function getList(): array
    {
        return $this->collectionFactory->create()->getItems();
    }

    /**
     * Get order
     *
     * @param int $id
     * @return OneClickOrderInterface
     * @throws LocalizedException
     */
    public function get(int $id): OneClickOrderInterface
    {
        $order = $this->oneClickOrderFactory->create();
        $this->oneClickOrderResource->load($order, $id);
        if (!$order->getId()) {
            throw new LocalizedException(__('Requested order does not exist'));
        }
        return $order;
    }

    /**
     * Delete order
     *
     * @param OneClickOrderInterface $order
     * @return bool
     * @throws LocalizedException
     */
    public function delete(OneClickOrderInterface $order): bool
    {
        try {
            $this->oneClickOrderResource->delete($order);
        } catch (\Exception $e) {
            throw new LocalizedException(__('Unable to remove order #%1', $order->getId()));
        }
        return true;
    }

    /**
     * Delete order by ID
     *
     * @param int $id
     * @return bool
     * @throws LocalizedException
     */
    public function deleteById(int $id): bool
    {
        return $this->delete($this->get($id));
    }

    /**
     * Save order
     *
     * @param OneClickOrderInterface $order
     * @return bool
     * @throws LocalizedException
     */
    public function save(OneClickOrderInterface $order): bool
    {
        try {
            $this->oneClickOrderResource->save($order);
        } catch (\Exception $exception) {
            throw new LocalizedException(__('Unable to save order #%1', $order->getId()));
        }
        return true;
    }
}
