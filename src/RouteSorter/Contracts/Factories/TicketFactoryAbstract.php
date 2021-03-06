<?php namespace Ehtasham89\RouteSorter\Contracts\Factories;
/**
 * Abstract factory design pattern class for TicketFactory
 */

 /**
 * Extends this class in TicketFactory
 */
abstract class TicketFactoryAbstract {
    /**
     * TicketFactory class should use create() method.
     * @param array $card
     */
    abstract public static function create($card);
}