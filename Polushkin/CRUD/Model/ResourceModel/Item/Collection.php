<?php

namespace Polushkin\CRUD\Model\ResourceModel\Item;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Polushkin\CRUD\Model\Item',
            'Polushkin\CRUD\Model\ResourceModel\Item');
    }

}