<?php

namespace Amida\OneClickOrder\Api;

use Amida\OneClickOrder\Api\Data\OneClickOrderInterface;

interface OneClickOrderRepositoryInterface
{

    /**
     * Get order
     *
     * @param int $id
     * @return OneClickOrderInterface
     */
    public function get(int $id): OneClickOrderInterface;

    /**
     * Get order's list
     *
     * @return array
     */
    public function getList(): array;

    /**
     * Save order
     *
     * @param OneClickOrderInterface $order
     * @return bool
     */
    public function save(OneClickOrderInterface $order): bool;

    /**
     * Delete order
     *
     * @param OneClickOrderInterface $order
     * @return bool
     */
    public function delete(OneClickOrderInterface $order): bool;

    /**
     * Delete order by ID
     *
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;
}
