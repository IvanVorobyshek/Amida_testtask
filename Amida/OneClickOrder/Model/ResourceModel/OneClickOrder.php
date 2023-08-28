<?php

namespace Amida\OneClickOrder\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\AbstractModel;

class OneClickOrder extends AbstractDb
{
    /**
     * @var string
     */
    protected $_eventPrefix = 'one_click_order_resource_model';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('one_click_order', 'entity_id');
    }

    /**
     * Set date of creation before save
     *
     * @param AbstractModel $object
     * @return OneClickOrder
     */
    protected function _beforeSave(AbstractModel $object)
    {
        $object->setData('order_created', 0);
        return parent::_beforeSave($object);
    }
}
