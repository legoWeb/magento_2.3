<?php

namespace Polushkin\CRUD\Model;


class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'polushkin_crud_post';

    protected $_cacheTag = 'polushkin_crud_post';

    protected $_eventPrefix = 'polushkin_crud_post';

    protected function _construct()
    {
        $this->_init('Polushkin\CRUD\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}