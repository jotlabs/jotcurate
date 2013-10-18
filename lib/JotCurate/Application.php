<?php

namespace JotCurate;

use JotApp\ApplicationBase;

class Application extends ApplicationBase {
    protected $appModelClass     = 'JotCurate\ApplicationModel';
    protected $featureFlagsClass = 'JotCurate\FeatureFlags';

    protected $controllers = array(
        'content' => 'JotCurate\Controllers\NoteController'
    );

}

?>
