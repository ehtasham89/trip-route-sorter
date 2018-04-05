<?php namespace Ehtasham89\RouteSorter\Contracts\Interfaces;
/**
 * SortRouteArray helper implements it.
 */

/**
 * Interface for sorting array algorithms from source to destination.
 * 
 * SortRouteArray helper class should implement this interface.
 */

interface RouteSortInterface {
    /**
     * Sort method should implement.
     * @param array $items
     */
    public static function sortArray($items);
}