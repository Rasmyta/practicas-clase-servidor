<?php
namespace Blackjack;

/**
 * Class Partida
 * @author Rasma Butkute
 */
class VistaPartida {

    public static function renderPartida($partida) {

        echo "<section>";
        echo $partida->getJugador();
        echo "</section>";


        echo "<section>";
        echo $partida->getCrupier();
        echo "</section>";

    }

}


?>