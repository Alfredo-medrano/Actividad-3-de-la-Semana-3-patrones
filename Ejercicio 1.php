<?php
interface Personaje {
    public function obtenerNombre();
    public function ataque();
    public function velocidad();
}

class Esqueleto implements Personaje {
    public function obtenerNombre() {
        return "Esqueleto";
    }

    public function ataque() {
        return "Golpe con huesos";
    }

    public function velocidad() {
        return "Velocidad baja";
    }
}

class Zombi implements Personaje {
    public function obtenerNombre() {
        return "Zombi";
    }

    public function ataque() {
        return "Mordisco";
    }

    public function velocidad() {
        return "Velocidad lenta";
    }
}


class PersonajeFactory {
    public static function crearPersonaje($nivel) {
        if ($nivel == 'fácil') {
            return new Esqueleto();
        } elseif ($nivel == 'difícil') {
            return new Zombi();
        } else {
            throw new Exception("Nivel desconocido");
        }
    }
}

try {
    $personaje = PersonajeFactory::crearPersonaje('fácil');
    echo "Personaje: " . $personaje->obtenerNombre() . "\n";
    echo "Ataque: " . $personaje->ataque() . "\n";
    echo "Velocidad: " . $personaje->velocidad() . "\n";

    $personajeDificil = PersonajeFactory::crearPersonaje('difícil');
    echo "Personaje: " . $personajeDificil->obtenerNombre() . "\n";
    echo "Ataque: " . $personajeDificil->ataque() . "\n";
    echo "Velocidad: " . $personajeDificil->velocidad() . "\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
?>
