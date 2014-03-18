<?php

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    public function __construct() {
        // Get the Throttle Provider
        $throttleProvider = Sentry::getThrottleProvider();

// Disable the Throttling Feature
        $throttleProvider->disable();
    }

    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

}
