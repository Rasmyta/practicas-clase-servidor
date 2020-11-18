<?php
	
	class CuentaBancaria {

		protected $numeroCuenta;
		protected $saldo;
		protected $tarjetaDebito;
		protected $tarjetaCredito;
		protected $comisionesAnual;

		public function __construct($unNumeroCuenta,$unSaldo) {
			$this->numeroCuenta = $unNumeroCuenta;
			$this->saldo = $unSaldo;
			$this->tarjetaCredito = false;
			$this->tarjetaDebito = false;
			$this->comisionesAnual = 100;
		}

		public function ingresar($cantidad) {
			$this->saldo += $cantidad;
		}

		public function retirar($cantidad) {
			if (($this->saldo - $cantidad) > 0) {
				$this->saldo -= $cantidad;
			} else {
				echo "No puedes retirar tanto dinero, tu saldo es de $this->saldo";
			}
		}

		public function getNumeroCuenta() {
			return $this->numeroCuenta;
		}

		public function getSaldo() {
			return $this->saldo;
		}

		public function getTarjetaCredito() {
			return $this->tarjetaCredito;
		}

		public function getTarjetaDebito() {
			return $this->tarjetaDebito;
		}

		public function getComisiones() {
			return $this->comisionesAnual;
		}

		public function setTarjetaCredito($bool) {
			$this->tarjetaCredito = $bool;
		}

		public function setTarjetaDebito($bool) {
			$this->tarjetaDebito = $bool;
		}

		public function mostrar() {
			echo "Cuenta: ".$this->getNumeroCuenta()." Saldo: ".$this->getSaldo()."€ Comisiones: ".$this->getComisiones()."€  ";
			if ($this->getTarjetaCredito()) {
				echo "Tarjeta crédito disponible ";
			} else {
				echo "Tarjeta crédito no disponible ";
			}
			if ($this->getTarjetaDebito()) {
				echo "Tarjeta débito disponible ";
			} else {
				echo "Tarjeta débito no disponible ";
			}

		}		
	}


	/* CUENTA DE AHORRO */
	final class CuentaAhorro extends CuentaBancaria {
		private $tipoInteres;
		private $comisionesModif;

		public function __construct($unTipoInteres,$unNumeroCuenta,$unSaldo) {
			parent::__construct($unNumeroCuenta,$unSaldo);
			$this->tipoInteres = $unTipoInteres;
			$this->comisionesModif = 0.5;
		}

		public function getComisiones() {
			return parent::getComisiones() * $this->comisionesModif;
		}

		public function getTipoInteres() {
			return $this->tipoInteres;
		}

		public function mostrar() {
			echo parent::mostrar()." Tipo Interés: ".$this->tipoInteres;
		}

	}

	/* CUENTA JOVEN */
	final class CuentaJoven extends CuentaBancaria {		
		private $comisionesModif;

		public function __construct($unNumeroCuenta,$unSaldo, $unComisionesModif=0) {
			parent::__construct($unNumeroCuenta,$unSaldo);
			$this->setTarjetaDebito(true);
			$this->comisionesModif = $unComisionesModif;
		}

		public function getComisiones() {
			return parent::getComisiones() * $this->comisionesModif;
		}		
	}

	/* CUENTA CORRIENTE */
	final class CuentaCorriente extends CuentaBancaria {
		private $comisionesModif;

		public function __construct($unNumeroCuenta,$unSaldo) {
			parent::__construct($unNumeroCuenta,$unSaldo);
			$this->setTarjetaDebito(true);
			$this->setTarjetaCredito(true);
			$this->comisionesModif = 0.3;
		}

		public function getComisiones() {
			return parent::getComisiones() * $this->comisionesModif;
		}

	}

	/* PRUEBA */
	$micuentacorriente = new CuentaCorriente("34569832",20000);
	$micuentacorriente->ingresar(5000);
	$micuentacorriente->retirar(1500);
	$micuentacorriente->mostrar();

	echo "<br>";

	$micuentaahorro = new CuentaAhorro(0.05,"34577112",30000);
	$micuentaahorro->ingresar(5000);
	$micuentaahorro->retirar(6500);
	$micuentaahorro->mostrar();






?>