<?php
# Constant for path to sqlite databases for unit tests
define('UNITTEST_DB_PATH', dirname(dirname(__FILE__)) . '/var/unittest-db/');
define('UNITTEST_DB',      UNITTEST_DB_PATH . 'jotcurate.db');
define('TMP_DB_PATH',      dirname(dirname(__FILE__)) . '/tmp/unittest-db/');

# Use composer's autoloader
require 'vendor/autoload.php';

class UnitTestUtils {

    function createDsn() {
        if (!file_exists(TMP_DB_PATH)) {
            mkdir(TMP_DB_PATH);
        }

        $tmpDb = TMP_DB_PATH . 'unittest-' . time() . '.db';
        copy(UNITTEST_DB, $tmpDb);

        return 'sqlite:' . $tmpDb;
    }

}

?>
