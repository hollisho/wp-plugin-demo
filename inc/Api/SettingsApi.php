<?php

namespace hollisho\wp\plugin\inc\Api;

class SettingsApi
{
    public array $admin_pages = [];

    public array $admin_subpages = [];

    public function register()
    {
        if (!empty($this->admin_pages)) {
            add_action('admin_menu', [$this, 'addAdminMenu']);
        }
    }


    public function addPages(array $pages): SettingsApi
    {
        $this->admin_pages = $pages;
        return $this;
    }

    public function withSubPage(string $title = null, $callback = null): SettingsApi
    {
        if (empty($this->admin_pages)) {
            return $this;
        }

        $admin_pages = $this->admin_pages[0];

        $subpages = [
            [
                'parent_slug' => $admin_pages['menu_slug'],
                'page_title' => $admin_pages['page_title'],
                'menu_title' => __($title) ?: $admin_pages['menu_title'],
                'capability' => $admin_pages['capability'],
                'menu_slug' => $admin_pages['menu_slug'] . '_' . $title,
                'callback' => $callback ?: $admin_pages['callback']
            ]
        ];

        $this->admin_subpages = $subpages;
        return $this;
    }

    public function addAdminMenu()
    {
        foreach ($this->admin_pages as $page) {
            add_menu_page(
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],
                $page['icon_url'],
                $page['position']
            );
        }

        foreach ($this->admin_subpages as $page) {
            add_submenu_page(
                $page['parent_slug'],
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback']
            );
        }
    }
}