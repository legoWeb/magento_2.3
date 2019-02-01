<?php
namespace Polushkin\CRUD\Model\ResourceModel;


class Item extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('polushkin_crud_item', 'item_id');
    }

}