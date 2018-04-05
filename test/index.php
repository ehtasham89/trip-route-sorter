<?php
/**
 * This is test file for Trip Route Sorter 
 */

/**
 * Include bootstrap file to init autoload class for Route Sorter.
 */
require_once "../src/bootstrap.php";

/**
 * Classes use in test.
 */
use Ehtasham89\RouteSorter\RouteManager;
use Ehtasham89\RouteSorter\Passenger;
use Ehtasham89\RouteSorter\TicketFactory;
use Ehtasham89\RouteSorter\Contracts\TravelorAbstract;
use Ehtasham89\RouteSorter\Contracts\TicketAbstract;


/**
 * Init classes objects.
 */
$passenger = new Passenger();
$ticketFactory = new TicketFactory();
$routeManager = new RouteManager();

/**
 * Sample boarding cards.
 */
$testBoardingCards = [
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
    ],
    [
        'source' => 'Dubai Airport',
        'destination' => 'Istanbul Airport',
        'vehicle' => 'plane',
        'seat' => '44B',
        'gate' => null
    ],
    [
        'source' => 'Amsterdam Airport',
        'destination' => 'NewYork Airport',
        'vehicle' => 'plane',
        'seat' => '11A',
        'gate' => null
    ],
    [
        'source' => 'Istanbul Airport',
        'destination' => 'Amsterdam Airport',
        'vehicle' => 'plane',
        'seat' => '9C',
        'gate' => 'T4'
    ]
];

/**
 * $passenger should be an instance of Passenger 
 */
$passenger = $passenger->create('Ehtasham');

$boardingCards = [];

/**
 * Create set of boarding cards.
 */
foreach ($testBoardingCards as $bCard) {
    array_push($boardingCards, $ticketFactory->create($bCard));
}


echo "<<< Route Sorter Test >>>" . PHP_EOL;
echo "--------------------------" . PHP_EOL;

echo "Passenger Test Start... " . PHP_EOL;

if ($passenger instanceof TravelorAbstract) {
    echo 'Test Pass = [Passenger Name => ' . $passenger->name . ']: person class extended the TravelorAbstract' . PHP_EOL;
} else {
    throw new \Exception($passenger->name . ' person class should extends TravelorAbstract');
}

echo "Add Boarding Card Test Start... " . PHP_EOL;

foreach ($boardingCards as $card) {
    if ($card instanceof TicketAbstract) {
        echo 'Test Pass: (' . $card->getSource() . ' to ' . $card->getDestination() . ') card extended the CardAbstract' . PHP_EOL;
    } else {
        throw new \Exception('('. $card->getSource() . ' to ' . $card->getDestination() . ') card should extends the CardAbstract');
    }
}

/**
 * Assign passenger and tickets to routeManager
*/
$routeManager->setPassenger($passenger)->setTickets($boardingCards);

/**
 * Get passenger from route manager
*/
$passenger = $routeManager->getPassenger();

/**
 * Get sorted boarding cards from route manager
*/
$tripRoute = $routeManager->sortTickets()->getTickets();

/**
 * $passanger should be "Usman"
 */
echo PHP_EOL . 'Passengers assignment test start...' . PHP_EOL;

if ($passenger != 'Ehtasham') {
    echo "error: ({$passenger}) should be 'Ehtasham'" . PHP_EOL;
} else {
    echo 'Test Pass: ($passenger) is "Ehtasham"' . PHP_EOL;
}
  
echo PHP_EOL . 'Boarding cards sort test start...' . PHP_EOL;
echo PHP_EOL . '=================================>' . PHP_EOL;

if (count($tripRoute)) { 
    foreach ($tripRoute as $key => $route) {
        $nextSource = isset($tripRoute[$key+1]) ? $tripRoute[$key+1]->getSource() : $route->getDestination();
        
        if ($route->getDestination() == $nextSource) {
            echo 'Test Pass: ' . $route->getSource() . ' to ' . $route->getDestination() . ' by ' . $route->getVehicle();
            echo $route->getGate() ? ', gate ' . $route->getGate() : '';
            echo $route->getSeat() ? ', seat ' . $route->getSeat() : '';
            echo PHP_EOL;
        } else {
            echo 'Error: Wrong Route: ' . $route->getSource() . ' to ' . $route->getDestination() . ' by ' . $route->getVehicle();
            echo PHP_EOL;
        }

        if ($key == count($tripRoute) - 1 ) {
            echo 'Test Pass: You arrived to final destination.' . PHP_EOL;
            echo '=================================>' . PHP_EOL;

            break;
        }
    }
} else {
    throw new \Exception('$tripRoute should have some tickets');
}

