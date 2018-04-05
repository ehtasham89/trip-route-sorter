<?php namespace Ehtasham89\RouteSorter\Contracts;
/**
 * Abstract class for Ticket
 * 
 */

/**
 * Extends by Ticket. 
 * When you add new kind of Ticket class you should extends it by TicketAbstract.
 */
abstract class TicketAbstract {
    /**
     * Ticket class should use these methods. 
    */
    abstract public function getSource();
    abstract public function getDestination();
}
