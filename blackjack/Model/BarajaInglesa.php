<?php

namespace Blackjack;

/**
 * Clase BarajaInglesa
 * @author Rasma Butkute
 */

class BarajaInglesa extends Baraja
{
    //Clubs, Diamonds, Hearts, Spades
    private static $palos = ["C", "D", "H", "S"];
    private static $figuras = ["A", "2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K"];

    public function __construct()
    {
        parent::__construct();
        $this->generarMazo();
    }

    /**
     * Devuelve una carta del mazo, de la parte superior, y la elimina de la baraja. 
     */
    public function repartirCarta()
    {
        return array_shift($this->mazo);
    }

    /**
     * Genera el mazo con 52 cartas. 
     */
    private function generarMazo()
    {
        foreach (self::$palos as $palo) {
            foreach (self::$figuras as $figura) {
                $this->mazo[] = new Carta($figura, $palo);
            }
        }
    }
}
