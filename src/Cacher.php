<?php

namespace Skansing\Escapology;

interface Cacher
{
    public function set($key, $value);

    public function get($key);
}
