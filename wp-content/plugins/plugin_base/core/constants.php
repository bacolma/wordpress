<?php

/**
 * Declare constants
 *
 * @since Ramp Lifechart 0.0.1
 */

define( 'PLUGIN_BASE_VERSION', $config_plugin_base['version'] );

define( 'PLUGIN_BASE_SLUG', $config_plugin_base['slug'] );

define( 'PLUGIN_BASE_TEXT_DOMAIN', $config_plugin_base['text-domain'] );

define( 'PLUGIN_BASE_BASE_NAMESPACE', $config_plugin_base['base-namespace'] );

define( 'PLUGIN_BASE_DIR', dirname( dirname( __FILE__ ) ) );

define( 'PLUGIN_BASE_URL', plugins_url( '', dirname( __FILE__ ) ) );

define( 'PLUGIN_BASE_CORE_DIR', trailingslashit( PLUGIN_BASE_DIR ) . $config_plugin_base['core-folder'] );

define( 'PLUGIN_BASE_CORE_URL', trailingslashit( PLUGIN_BASE_URL ) . $config_plugin_base['core-folder'] );

define( 'PLUGIN_BASE_ASSETS_DIR', trailingslashit( PLUGIN_BASE_DIR ) . $config_plugin_base['assets-folder'] );

define( 'PLUGIN_BASE_ASSETS_URL', trailingslashit( PLUGIN_BASE_URL ) . $config_plugin_base['assets-folder'] );

define( 'PLUGIN_BASE_LIBS_DIR', trailingslashit( PLUGIN_BASE_DIR ) . $config_plugin_base['libs-folder'] );

define( 'PLUGIN_BASE_LIBS_URL', trailingslashit( PLUGIN_BASE_URL ) . $config_plugin_base['libs-folder'] );

define( 'PLUGIN_BASE_BASENAME_DIR', trailingslashit( PLUGIN_BASE_DIR ) . $config_plugin_base['basename'] );

define( 'PLUGIN_BASE_BASE_PHP_DIR', trailingslashit( PLUGIN_BASE_DIR ) . $config_plugin_base['slug'] . ".php" );
