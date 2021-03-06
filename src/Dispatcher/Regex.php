<?php

namespace Skansing\Escapology\Dispatcher;

use Skansing\Escapology\Dispatcher;

class Regex implements Dispatcher
{
    /**
     * @var string
     */
    private $uri;
    /**
     * @var string
     */
    private $verb;

  /**
   * @param string $verb The HTTP request method/verb
   * @param string $uri  The HTTP URI
   */
  public function __construct(
    $verb,
    $uri
  ) {
      $this->verb = $verb;
      $this->uri = $uri;
  }

  /**
   * Returns if the route was found or not.
   *
   * @param array $routesData
   *
   * @return int
   */
  public function dispatch($routesData)
  {
      if (empty($routesData)) {
          return self::NOT_FOUND;
      }

      return preg_match($routesData[$this->verb], $this->uri) ? self::FOUND : self::NOT_FOUND;
  }
}
