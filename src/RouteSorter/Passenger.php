<?php namespace Ehtasham89\RouteSorter;

use Ehtasham89\RouteSorter\Contracts\TravelorAbstract;

/**
 * Passenger class for travelor 
 */
class Passenger extends TravelorAbstract {
  
  /**
   * Name of the passenger.
   */
  protected $name;
  
  /**
   * Constructor
   * Sets the name as a passenger name.
   * @param string $name
   */
  public function create($name) {
    $this->name = $name;

    return $this;
  }
  
  /**
   * PHP Magic getter
   * @param string $property
   */
  public function __get($property)
  {
    if (property_exists($this, $property)) {
        return $this->$property;
    }
  }
  
}
