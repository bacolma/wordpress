<?php
/*
Plugin Name: Plugin Base
Description: Plugin Base
Author: Marcos Colchado
Version: 0.0.1
 */

if( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) ){
    exit;
}
/**
 * Base configuration for ramp_lifechart
 *
 * @var array $config_ramp_lifechart
 * @since Ramp lifechart 0.0.2
 */

$config_plugin_base = [
    "version" => "0.0.1",
    "basename" => "plugin_base",
    "base-namespace" => "Pluginbase",
    "plugin-name" => "Plugin Base",
    "text-domain" => 'plugin_base',
    'slug' => 'plugin_base',
    'core-folder' => 'core',
    'libs-folder' => 'libs',
    'assets-folder' => 'assets',
    'php-version-required' => '7.1',
];

/**
 * Ramp lifechart constants
 *
 * @since Ramp lifechart 0.0.1
 */

require_once dirname( __FILE__ ) . '/' . $config_plugin_base['core-folder'] . '/constants.php';

/**
 * Ramp lifechart autoload class
 *
 * @since Ramp lifechart 0.0.1
 */

require_once dirname( __FILE__ ) . '/' . $config_plugin_base['core-folder'] . '/autoload.class.php';

/**
 * Include Xbox Framewotk Library
 *
 * @author CodexHelp | https://codecanyon.net/user/codexhelp
 * @link   https://codecanyon.net/item/xbox-framework-create-meta-boxes-theme-options-admin-pages-for-wordpress/19250995
 */
include dirname( __FILE__ ) . '/libs/xbox/xbox.php';

/**
 * Call to run function of autoload class
 *
 * @param array $config_ramp_lifechart Base configuration array
 *
 * @since Ramp lifechart 0.0.1
 */
Pluginbase\Core\Autoload::run( $config_plugin_base );

/**
 * * Create instance of that Pluginbase
 *
 * @param array $config_plugin_base Base configuration array
 *
 * @since Ramp lifechart 0.0.1
 */
$plugin_base = new Pluginbase\Core\PluginBase( $config_plugin_base );
