<?php namespace Ehtasham89\RouteSorter\Helpers;
/**
 * Usage:
 * SortRouteArray::sortArray($array);
 * 
 * Description: 
 * 
 * Mandatory object members. 
 * 1. Route start from: $item->getSource()
 * 2. Route end to: $item->getDestination()
 * 
 * If there is no member which has same destination value equal to any other ticket element's source value
 * then its the last element of the array.
 * Otherwise there should be other member which has same value in its source.
 * 
 * @param $items an array which has array members which contains at least 2 members
 */

use Ehtasham89\RouteSorter\Contracts\Interfaces\RouteSortInterface;

/**
 * Sorts an array depends their source and destination.
 */
class SortRouteArray implements RouteSortInterface {
  
  /**
   * Stores an array which contain all tickets as unordered
   */
  protected static $items;
  
  /**
   * Stores an array which contains all tickets as ordered
   */
  protected static $arranged = [];
  
  /**
   * Stores an array which will check in second or third step.
   */
  protected static $temp = [];
  
  /**
   * Sorts and returns the array
   * @param array $items
   * @return array
   */
  public static function sortArray($items){
    
    self::$items = $items;

    // take an element from $items and push it to self::$arranged array
    if (count(self::$arranged) == 0) {
        array_push(self::$arranged, array_shift(self::$items));
    }

    foreach (self::$items as $key => $item) {
      if (!$item->getSource() || !$item->getDestination()) {
        throw new \Exception("source and destination members are mandatory");
      }
      
      $source = reset(self::$arranged);
      $source = $source->getSource();
      
      $destination = end(self::$arranged);
      $destination = $destination->getDestination();
      
      if ($destination == $item->getSource() || $source == $item->getDestination()) {
        
        if ($destination == $item->getSource()) {
          array_push(self::$arranged, $item);
        }
        
        if ($source == $item->getDestination()) {
          array_unshift(self::$arranged, $item);
        }
        
        if (isset(self::$temp[$key])) {
          unset(self::$temp[$key]);
        }
      } else {
        array_push(self::$temp, $item);
      }
    }
    
    if (count(self::$temp) > 0) {
      self::sortArray(self::$temp);
    }
    
    return self::$arranged;
  }
}


