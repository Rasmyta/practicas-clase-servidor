<?php

namespace Blackjack;

/**
 * Clase Jugador
 * @author Rasma Butkute
 */
class Jugador
{
    //Un array de Cartas en mano
    private $mano;

    public function __construct()
    {
        $this->mano = [];
    }

    /**
     * Get the value of mano
     */
    public function getMano()
    {
        return $this->mano;
    }

    /**
     * Set the value of mano
     *
     * @return  self
     */
    public function setMano($mano)
    {
        $this->mano = $mano;

        return $this;
    }

    /**
     * Añade una carta pasada como parámetro a la mano del jugador. 
     */
    public function nuevaCarta(Carta $carta)
    {
        return  array_unshift($this->mano, $carta);
    }

    /**
     * Calcule el valor de la mano del jugador, la suma del valor de sus cartas.
     */
    public function valorMano()
    {
        $valor = 0;
        foreach ($this->mano as $mano) {
            $valor += $mano->getValor();
        }
        return $valor;
    }

    public function cartasMano()
    {
        return count($this->mano);
    }

    public function __toString()
    {
        $result = "";
        foreach ($this->mano as $mano) {
            $result .= $mano . "<br>";
        }
        return $result;
    }

    
}
