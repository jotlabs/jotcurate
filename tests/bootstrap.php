<?php
# Constant for path to sqlite databases for unit tests
define('UNITTEST_DB_PATH', dirname(dirname(__FILE__)) . '/var/unittest-db/');
define('UNITTEST_DB',      UNITTEST_DB_PATH . 'jotcurate.db');

# Use composer's autoloader
require 'vendor/autoload.php';

class UnitTestUtils {

    function createDsn() {
        // TODO: Break this out into copying the starting point database and using that
        return 'sqlite:' . UNITTEST_DB;
    }

}

?>
