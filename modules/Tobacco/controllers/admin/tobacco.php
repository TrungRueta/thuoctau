<?php
/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/28/15
 * Time: 3:51 AM
 */

class Tobacco extends Module_Admin {

    /**
     * The deported construct function
     * Should be called instead of parent::__construct by inherited classes
     *
     * @return mixed
     */
    protected function construct()
    {
        // TODO: Implement construct() method.
    }

    public function index() {
        $this->output('admin/tobacco');
    }
}