<?php
namespace hollisho\wp\plugin\inc;

use hollisho\wp\plugin\inc\Base\SettingsLinks;
use hollisho\wp\plugin\inc\Pages\AdminPage;

/**
 * Copyright © TeamOne
 * @author Hollis
 * @desc 插件初始化入口
 * Class Init
 * @package hollisho\wp\plugin\inc
 */
class Init
{
    /**
     * Copyright © TeamOne
     * @return string[]
     * @author Hollis
     * @desc 获取注册的服务
     */
    public static function getService(): array
    {
        return [
            AdminPage::class,
            SettingsLinks::class,
        ];
    }

    /**
     * Copyright © TeamOne
     * @return void
     * @author Hollis
     * @desc 装载已注册的服务
     */
    public static function registerService()
    {
        foreach (self::getService() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    public static function instantiate($class)
    {
        return new $class;
    }
}