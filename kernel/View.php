<?php

namespace Keha\Kernel;

class View {

    public function render(string $template, array $values) {
        extract($values);
        include_once('./Templates/'.$template);
        
    }
}