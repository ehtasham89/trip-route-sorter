<?php namespace Ehtasham89\RouteSorter;

use Ehtasham89\RouteSorter\Contracts\Factories\TicketFactoryAbstract;
use Ehtasham89\RouteSorter\Tickets\Ticket;


class TicketFactory extends TicketFactoryAbstract{
    private static $ticketClass;
    /**
     * Creates an instance of a TicketAbstract.
     * @return CommonCard If $ticket['class] is not defined then it returns Ticket as default.
     * @param array $ticket
     */
    public static function create($ticket) {
        //if type is not setted then use CommonCard class.
        if (isset($ticket['class'])) {
            //then use the class for type of PlaneTicket, BusTicket etc
            try {
                self::$ticketClass = $ticket['class'];

                return new self::$ticketClass($ticket);
            } catch (\Exception $e) {
                throw new \Exception($ticket['class'] . ' class not found! ' . $e->getMessage());
            }
        } else {
            return new Ticket($ticket);
        }
    }
}