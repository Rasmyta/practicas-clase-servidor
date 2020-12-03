<?php

namespace Blackjack;

/**
 * Clase Carta
 * @author Rasma Butkute
 */

class Carta
{

    private $palo;
    private $figura;

    //Constructor
    public function __construct($figura = "", $palo = "")
    {
        $this->palo = $palo;
        $this->figura = $figura;
    }

    //Getters
    public function getPalo()
    {
        return $this->palo;
    }

    public function getFigura()
    {
        return $this->figura;
    }

    //Setters
    public function setPalo($unPalo)
    {
        $this->palo = $unPalo;
    }

    public function setFigura($unaFigura)
    {
        $this->figura = $unaFigura;
    }

    //

    /**
     * Devuelve el valor de una carta. 
     */
    public function getValor()
    {
        $valores = [
            "A" => 11, "2" => 2, "3" => 3, "4" => 4, "5" => 5, "6" => 6, "7" => 7,
            "8" => 8, "9" => 9, "10" => 10, "J" => 10, "Q" => 10, "K" => 10
        ];

        foreach ($valores as $clave => $valor) {
            if ($clave == $this->getFigura()) {
                return $valor;
            }
        }
    }

    public function __toString()
    {
        return $this->figura . $this->palo;
    }
}
