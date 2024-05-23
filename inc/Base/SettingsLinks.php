<?php

namespace hollisho\wp\plugin\inc\Base;

class SettingsLinks extends BaseController
{
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", [$this, 'settingsLink']);
    }

    public function settingsLink($links)
    {
        $settingsLink = '<a href="admin.php?page=hollis_wp_plugin">' . __('Settings') . '</a>';
        $links[] = $settingsLink;
        return $links;
    }
}