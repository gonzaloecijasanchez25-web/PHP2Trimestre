class Mascota {
    public $nombre;
    public $tipo;
    
    // Constructor para inicializar propiedades al crear el objeto
    public function __construct($nombre, $tipo) {
        $this->nombre = $nombre;
        $this->tipo = strtolower($tipo); // Normalizar a minúsculas
    }
    
    public function presentar() {
        echo "Hola, soy {$this->nombre} y soy un(a) {$this->tipo}.\n";
    }
    
    public function emitirSonido() {
        $sonidos = [
            'perro' => 'Guau guau!',
            'gato' => 'Miau miau!',
            'pájaro' => 'Pío pío!',
            'vaca' => 'Muuu!',
            'oveja' => 'Beee!'
        ];
        
        if (isset($sonidos[$this->tipo])) {
            echo $sonidos[$this->tipo] . "\n";
        } else {
            echo "Este animal no tiene un sonido definido.\n";
        }
    }
}

// Ahora es más fácil crear mascotas
$miMascota = new Mascota("Toby", "perro");
$miMascota->presentar();
$miMascota->emitirSonido();

$miGato = new Mascota("Misi", "gato");
$miGato->presentar();
$miGato->emitirSonido();