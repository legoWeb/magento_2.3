<?php

namespace Polushkin\CRUD\Api\Data;

interface ItemInterface
{
    const ITEM_ID = 'item_id';
    const TITLE = 'tittle';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME = 'update_time';
    const IS_ACTIVE = 'is_active';

    public function getId();
    public function getTitle();
    public function getCreationTime();
    public function getUpdateTime();
    public function getIsActive();

    public function setId($id);
    public function setTitle($title);
    public function setCreationTime($creationTime);
    public function setUpdateTime($updateTime);
    public function setIsActive($isActive);

}