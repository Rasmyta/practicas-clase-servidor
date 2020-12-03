<?php

namespace Blackjack;

/**
 * Class Partida
 * @author Rasma Butkute
 */
class Partida
{

    private $jugadores;
    private $baraja;

    public function __construct()
    {
        $this->jugadores = ["jugador" => new Jugador(), "crupier" => new Jugador()];
        $this->baraja = new BarajaInglesa();
    }

    public function getJugadores()
    {
        return $this->jugadores;
    }

    public function getJugador()
    {
        return $this->jugadores['jugador'];
    }

    public function getCrupier()
    {
        return $this->jugadores['crupier'];
    }

    public function getBaraja()
    {
        return $this->baraja;
    }

    /**
     * Asigna una carta a mano de jugador y devuleve el nombre de esta carta. 
     */
    public function asignarCarta(Jugador $jugador)
    {
        $carta = $this->baraja->repartirCarta();
        $jugador->nuevaCarta($carta);

        return $carta;
    }


    public function iniciarJuego()
    {
        $this->baraja->barajar();
        $crupier = $this->jugadores['crupier'];
        $jugador = $this->jugadores['jugador'];



        return "";
    }
}
