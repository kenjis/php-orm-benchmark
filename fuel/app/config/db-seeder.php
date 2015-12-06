<?php
/**
 * Fuel DB Seeder
 *
 * @package    db-seeder
 * @author     webfatorial
 * @link       https://github.com/webfatorial/fuel-db-seeder
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade Fuel DB Seeder without losing your custom config.
 */

return array(

    /**
     * Sets the calling order of seed classes,
     * in this example, UserSeeder will be called after PageSeeder
     */
    'order' => array(
        'Comment',
    ),
);
