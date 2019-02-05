<?php

namespace Polushkin\CRUD\Api\Data;

interface ItemInterface
{
    const ITEM_ID = 'item_id';
    const TITLE = 'title';
    const CREATION_TIME = 'creation_time';
    const UPDATE_TIME = 'update_time';
    const IS_ACTIVE = 'is_active';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getTitle();

    /**
     * @return mixed
     */
    public function getCreationTime();

    /**
     * @return mixed
     */
    public function getUpdateTime();

    /**
     * @return mixed
     */
    public function getIsActive();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @param $title
     * @return mixed
     */
    public function setTitle($title);

    /**
     * @param $creationTime
     * @return mixed
     */
    public function setCreationTime($creationTime);

    /**
     * @param $updateTime
     * @return mixed
     */
    public function setUpdateTime($updateTime);

    /**
     * @param $isActive
     * @return mixed
     */
    public function setIsActive($isActive);

}