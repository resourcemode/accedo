<?php
/**
 * Application Controller Loader
 *
 * @author     Michael <resourcemode@yahoo.com>
 */
$files = File::allFiles(app_path() . '/Http/Routes');

foreach ($files as $file) {
    require $file;
}
