<?php

/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/28/15
 * Time: 7:08 AM
 * @property array Classes
 */

class Migrate {

    private $classes;
    private $connection;

    /**
     *
     */
    function __construct()
    {
        $this->classes = array(
            'brands' => CreateBrandsTable::class,
            'brands_media' => CreateBrandsMediaTable::class,
            'blends' => CreateBlendsTable::class,
            'blends_media' => createBlendsMediaTable::class
        );
        $this->connection = null;
    }

    /**
     * @return array
     */
    public function getClasses()
    {
        return $this->classes;
    }

    /**
     * @param $class
     */
    public function setClasses($class)
    {
        $this->classes[] = $class;
    }

    /**
     * @return null
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param null $connection
     */
    public function setConnection($connection)
    {
        $this->connection = $connection;
        // add connection into class
        foreach ($this->classes as $i => $class)
        {
            $this->classes[$i] = new $class($connection);
        }
    }

}