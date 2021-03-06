<?php

namespace Sunnysideup\CleanerTinyMCEConfig\Forms;


use SilverStripe\Core\Injector\Injector;
use SilverStripe\Core\Config\Config;

use SilverStripe\Forms\HTMLEditor\HTMLEditorField;



class HTMLEditorFieldShort extends HTMLEditorField
{

    private static $config_class = 'Sunnysideup\CleanerTinyMCEConfig\Forms\HTMLEditorFieldShort_Config';

    private static $number_of_rows = 7;

    private static $default_config_name = 'cms';

    public static function create(...$args){
        $args = func_get_args();

        // Class to create should be the calling class if not Object,
        // otherwise the first parameter
        $class = 'SilverStripe\Forms\HTMLEditor\HTMLEditorField';

        $obj = Injector::inst()->createWithArgs($class, $args);

        $configClass = Config::inst()->get(HtmlEditorFieldShort::class, 'config_class');
        $configClassObject = Injector::inst()->get($configClass);

        $configName = Config::inst()->get(HtmlEditorFieldShort::class, 'default_config_name');
        $configClassObject->setConfig($configName);

        $rows = $configClassObject->getNumberOfRows();
        if(! $rows) {
            $rows = Config::inst()->get(HtmlEditorFieldShort::class, 'number_of_rows');
        }
        $obj->setRows($rows);

        return $obj;
    }



}
