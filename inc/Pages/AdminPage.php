<?php

namespace hollisho\wp\plugin\inc\Pages;

use hollisho\wp\plugin\inc\Api\SettingsApi;

class AdminPage
{
    public SettingsApi $settings;

    public function __construct()
    {
        $this->settings = new SettingsApi();
    }

    public function register()
    {
        $this->settings->addPages([
            [
                'page_title' => __('Hollis WP Plugin'),
                'menu_title' => __('Hollis Plugin'),
                'capability' => 'manage_options',
                'menu_slug' => 'hollis_wp_plugin',
                'callback' => function ()  {
                    echo 1111;
                },
                'icon_url' => 'dashicons-admin-customizer',
                'position' => 100
            ]
        ])->register();
    }

}