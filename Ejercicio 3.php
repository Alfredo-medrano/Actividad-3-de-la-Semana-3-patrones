<?php
interface Personaje {
    public function ataque();
    public function velocidad();
    public function obtenerNombre();
}
class Guerrero implements Personaje {
    public function ataque() {
        return "Ataque básico";
    }

    public function velocidad() {
        return "Velocidad media";
    }

    public function obtenerNombre() {
        return "Guerrero";
    }
}

class Arquero implements Personaje {
    public function ataque() {
        return "Disparo con arco";
    }

    public function velocidad() {
        return "Velocidad alta";
    }

    public function obtenerNombre() {
        return "Arquero";
    }
}

class DecoradorArma implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }

    public function ataque() {
        return $this->personaje->ataque();
    }

    public function velocidad() {
        return $this->personaje->velocidad();
    }

    public function obtenerNombre() {
        return $this->personaje->obtenerNombre();
    }
}

class EspadaDecorator extends DecoradorArma {
    public function ataque() {
        return parent::ataque() . " con espada";
    }

    public function velocidad() {
        return parent::velocidad();
    }

    public function obtenerNombre() {
        return parent::obtenerNombre() . " con Espada";
    }
}

class FlechaDecorator extends DecoradorArma {
    public function ataque() {
        return parent::ataque() . " con flecha";
    }

    public function velocidad() {
        return parent::velocidad();
    }

    public function obtenerNombre() {
        return parent::obtenerNombre() . " con Flecha";
    }
}


$guerrero = new Guerrero();
$guerreroConEspada = new EspadaDecorator($guerrero);
echo "Personaje: " . $guerreroConEspada->obtenerNombre() . "\n";
echo "Ataque: " . $guerreroConEspada->ataque() . "\n";
echo "Velocidad: " . $guerreroConEspada->velocidad() . "\n";

$arquero = new Arquero();
$arqueroConFlecha = new FlechaDecorator($arquero);
echo "Personaje: " . $arqueroConFlecha->obtenerNombre() . "\n";
echo "Ataque: " . $arqueroConFlecha->ataque() . "\n";
echo "Velocidad: " . $arqueroConFlecha->velocidad() . "\n";
?>
