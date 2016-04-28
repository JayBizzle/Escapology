<?php

namespace Skansing\Escapology\Cacher;

use Skansing\Escapology\Cacher;

class File implements Cacher
{
    /**
   * @param string $key  File to save the cached data
   * @param value $value Cached data
   */
  public function set($key, $value)
  {
      file_put_contents(
      $key,
      '<?php return '.var_export($value, true).';'
    );
  }

  /**
   * @param  string $key File to get cached data
   *
   * @return mixed False if not cache is found
   */
  public function get($key)
  {
      if (file_exists($key) === false) {
          return false;
      }

      return require $key;
  }
}
