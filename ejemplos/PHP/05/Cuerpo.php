<?
class Cuerpo {
    private $lineas = NULL;
    public function __construct() {
        $this->lineas = array ();
    }

    public function insertar_parrafo($line) {
        $this->lineas[] = $line;
    }

}