<?php

namespace Keha\Kernel;

class Kernel{

    public function __construct()
    {
        $this->loadConfiguration();
        $this->startSession();
        $this->routing();
    }

    private function routing():void
    {
        $router = new Router();
        $router->dispatch();
    }

    private function loadConfiguration():void
    {
        $dir = dirname(__DIR__).'/configuration';

        if ($handle = opendir($dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    include_once($dir.'/'.$entry);
                }
            }
            closedir($handle);
        }
    }

    private function startSession()
    {
        session_start();
        var_dump(session_status());
    }
}