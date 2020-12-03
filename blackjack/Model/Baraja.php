<?php

namespace Blackjack;

/**
 * Clase Baraja
 * @author Rasma Butkute
 */

abstract class Baraja
{

    protected $mazo;

    public function __construct()
    {
        $this->mazo = [];
    }

    abstract protected function repartirCarta();

    public function barajar()
    {
        return shuffle($this->mazo);
    }

    public function listar()
    {
        foreach ($this->mazo as $mazo) {
            echo $mazo . "<br>";
        }
    }
}
