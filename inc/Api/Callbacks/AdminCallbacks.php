<?php

namespace hollisho\wp\plugin\inc\Api\Callbacks;

use hollisho\wp\plugin\inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
    public function adminDashboard()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }

    public function subMenu()
    {
        return require_once("$this->plugin_path/templates/admin.php");
    }
}