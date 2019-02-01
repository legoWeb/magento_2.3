<?php

namespace Polushkin\CRUD\Model;

class Item extends \Magento\Framework\Model\AbstractModel
    implements \Polushkin\CRUD\Api\Data\ItemInterface, \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'polushkin_crud_item';

    protected function _construct()
    {
        $this->_init('Polushkin\Crud\Model\ResourceModel\Item');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }
}