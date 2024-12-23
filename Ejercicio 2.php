<?php
interface SistemaOperativo {
    public function abrirArchivo($archivo);
}

class Windows7 implements SistemaOperativo {
    public function abrirArchivo($archivo) {
        return "Abriendo archivo $archivo en Windows 7";
    }
}

class Windows10 {
    public function abrirArchivoDesdeWindows7($archivo) {
        return "Compatibilidad activada: Abriendo archivo $archivo en Windows 10";
    }
}

class Windows11 {
    public function abrirArchivoDesdeWindows7($archivo) {
        return "Compatibilidad activada: Abriendo archivo $archivo en Windows 11";
    }
}

class Windows10Adapter implements SistemaOperativo {
    private $windows10;

    public function __construct(Windows10 $windows10) {
        $this->windows10 = $windows10;
    }

    public function abrirArchivo($archivo) {
        return $this->windows10->abrirArchivoDesdeWindows7($archivo);
    }
}


class Windows11Adapter implements SistemaOperativo {
    private $windows11;

    public function __construct(Windows11 $windows11) {
        $this->windows11 = $windows11;
    }

    public function abrirArchivo($archivo) {
        return $this->windows11->abrirArchivoDesdeWindows7($archivo);
    }
}


$archivo = "documento.docx";

// Windows 7
$windows7 = new Windows7();
echo $windows7->abrirArchivo($archivo) . "\n";

// Windows 10 
$windows10 = new Windows10();
$adapter10 = new Windows10Adapter($windows10);
echo $adapter10->abrirArchivo($archivo) . "\n";

// Windows 11
$windows11 = new Windows11();
$adapter11 = new Windows11Adapter($windows11);
echo $adapter11->abrirArchivo($archivo) . "\n";
?>
