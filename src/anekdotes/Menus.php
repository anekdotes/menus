<?php
/*
 * This file is part of the Menus package.
 *
 * (c) Anekdotes Communication inc. <info@anekdotes.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Anekdotes\Menus;

use Anekdotes\Support\Arr;
use Anekdotes\Support\Str;

class Menus
{
    /**
   * Array containing all menu's link of different levels.
   *
   * @var array
   */
  private static $menuItems = [];

  /**
   * Add a menu's link to the array.
   *
   * @param string  $title     link title
   * @param string  $url       link url
   * @param string  $icon      link icon
   * @param int $level     link level
   * @param int $priority  link priority (for order purposes)
   * @param string  $namespace link title
   */
  public static function addItem($title, $url, $icon, $level = 1, $priority = 0, $namespace = '')
  {
      $uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
      $classes = '';

      if ($level == 1 && Str::contains($uri, $url)) {
          $classes = 'active';
      } 
      elseif ($level > 1 && $uri == $url) {
          $classes = 'active';
      }

      static::$menuItems[$level][] = [
          'title'     => $title,
          'namespace' => $namespace,
          'url'       => $url,
          'icon'      => $icon,
          'priority'  => $priority,
          'classes'   => $classes,
      ];
  }

  /**
   * Remove a menu's link to the array.
   *
   * @param int $level     link level
   * @param int $priority  link priority
   */
  public static function removeItem($level = 1, $priority = 0)
  {
      if (isset(static::$menuItems[$level])) {
          foreach (static::$menuItems[$level] as $index => $menu) {
              if ($menu['priority'] == $priority) {
                  unset(static::$menuItems[$level][$index]);

                  break;
              }
          }
      }
  }

  /**
   * Find a menu's link from the array.
   *
   * @param int $level     link level
   * @param int $priority  link priority
   */
  public static function find($level = 1, $priority = 0)
  {
      if (isset(static::$menuItems[$level])) {
          foreach (static::$menuItems[$level] as $index => $menu) {
              if ($menu['priority'] == $priority) {
                  return static::$menuItems[$level][$index];
              }
          }
      }
  }

  /**
   * Get all menu's link ordered by $sort parameter (default: SORT_ASC).
   *
   * @param  constant $sort sort constant
   *
   * @return array All menu's link
   */
  public static function main($sort = SORT_ASC)
  {
      return Arr::sortByKey(static::$menuItems[1], 'priority', $sort);
  }

  /**
   * Get all menu's link ordered by $sort parameter (default: SORT_ASC).
   *
   * @param  constant $sort sort constant
   *
   * @return array All menu's link
   */
  public static function clear()
  {
      static::$menuItems = [];
  }

  /**
   * Get all menu's link by $namespace and by $level.
   *
   * @param  string $namespace namespace to get
   * @param  int $level     level to get
   *
   * @return array All menu's link for a given $namespace
   */
  public static function get($namespace = '', $level = 1)
  {
      if (isset(static::$menuItems[$level])) {
          $items = array_filter(static::$menuItems[$level], function ($a) use ($namespace) {
              if ($a['namespace'] == $namespace) {
                  return $a;
              }
          });

          usort($items, function($a, $b) {
            return ($a['priority'] < $b['priority']) ? -1 : 1;
          });

          return $items;
      }

      return [];
  }
}
