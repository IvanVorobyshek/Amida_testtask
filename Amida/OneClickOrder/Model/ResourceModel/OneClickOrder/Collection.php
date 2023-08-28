<?php

namespace Amida\OneClickOrder\Model\ResourceModel\OneClickOrder;

use Amida\OneClickOrder\Model\OneClickOrder as Model;
use Amida\OneClickOrder\Model\ResourceModel\OneClickOrder as ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'one_click_order_collection';

    /**
     * Initialize collection model.
     */
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
