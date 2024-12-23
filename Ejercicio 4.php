<?php
interface EstrategiaSalida {
    public function mostrarMensaje($mensaje);
}

class SalidaConsola implements EstrategiaSalida {
    public function mostrarMensaje($mensaje) {
        echo "Consola: $mensaje\n";
    }
}

class SalidaJSON implements EstrategiaSalida {
    public function mostrarMensaje($mensaje) {
        echo json_encode(["mensaje" => $mensaje]) . "\n";
    }
}

class SalidaArchivo implements EstrategiaSalida {
    public function mostrarMensaje($mensaje) {
        file_put_contents("mensaje.txt", $mensaje);
        echo "Veremos\n";
    }
}

class SistemaDeMensajes {
    private $estrategia;

    public function __construct(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function mostrar($mensaje) {
        $this->estrategia->mostrarMensaje($mensaje);
    }
}

$mensaje = "Veremos.";

$sistemaConsola = new SistemaDeMensajes(new SalidaConsola());
$sistemaConsola->mostrar($mensaje);

$sistemaJSON = new SistemaDeMensajes(new SalidaJSON());
$sistemaJSON->mostrar($mensaje);

$sistemaArchivo = new SistemaDeMensajes(new SalidaArchivo());
$sistemaArchivo->mostrar($mensaje);
?>
