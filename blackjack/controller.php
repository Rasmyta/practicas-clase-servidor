<?php
session_start();

    include_once('Model/Partida.php');
    include_once('Model/Baraja.php');
    include_once('Model/BarajaInglesa.php');
    include_once('Model/Carta.php');
    include_once('Model/Jugador.php');
    include_once('Views/VistaPartida.php');
    use Blackjack\Partida;
    use Blackjack\VistaPartida;
    use Blackjack\Baraja;
    use Blackjack\BarajaInglesa;
    use Blackjack\Carta;
    use Blackjack\Jugador;

    if (isset($_SESSION['partida'])) {
        $partida = unserialize($_SESSION['partida']);

        $partida->asignarCarta($partida->getJugador());
        $partida->asignarCarta($partida->getCrupier());

        VistaPartida::renderPartida($partida);

        $_SESSION['partida'] = serialize($partida);
    } else {
        $partida = new Partida();

        $partida->asignarCarta($partida->getJugador());
        $partida->asignarCarta($partida->getCrupier());

        VistaPartida::renderPartida($partida);
                
        $_SESSION['partida'] = serialize($partida);
    }




?>