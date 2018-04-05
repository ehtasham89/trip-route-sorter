# trip-route-sorter
##Description 
Trip boarding card route sorter for random cards. 

### Dependencies
- PHP 5.6

### Extending class
* RouteArraySord: can be use for any kind of array sort.
* TicketAbstract: Default class for cards is (Ticket) but you can use any new class for different type of card and extends with (TicketAbstract)
* TravelorAbstract: can be use for any kind of new transportable.
* SortInterface: can be use for new algorithm
* TicketFactoryAbstract: Abstract factory design pattern class for TicketFactory

test 
----------------------------------------------
$ php test/index.php


Docs 
----------------------------------------------
### Add bootstrap file.
    require_once 'src/bootstrap.php';

### Use following classes
    use Ehtasham89\RouteSorter\RouteManager;
    use Ehtasham89\RouteSorter\Passenger;
    use Ehtasham89\RouteSorter\TicketFactory;

### Create some tickets
    $tickets = [
        [
        'source' => 'Union Metro Station',
        'destination' => 'Dubai Airport',
        'vehicle' => 'metro',
        'seat' => null,
        'gate' => null
        ],
        [
            'source' => 'Al-Majaz, Sharjah',
            'destination' => 'Union Metro Station',
            'vehicle' => 'bus',
            'seat' => null,
            'gate' => null
        ]
    ];



