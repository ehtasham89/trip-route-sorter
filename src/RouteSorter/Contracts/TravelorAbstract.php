<?php namespace Ehtasham89\RouteSorter\Contracts;
/**
 * Abstract class for Passenger
 * It can be extends for any kind of transportable, ship, bags etc.
 */

/**
 * Abstract class for any kind of travelor object.
 * To ship, travel or moving a vehicle from a place to another place you can extend it.
 */
abstract class TravelorAbstract {
    /**
     * create method should implement.
     * @param array $name
     */
    abstract public function create($name);
}
