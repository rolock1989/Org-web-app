<?php
class Evento {
    public $descripcion;
    public $tipo;
    public $lugar;
    public $fecha;
    public $hora;

    public function __construct($descripcion, $tipo, $lugar, $fecha, $hora) {
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->lugar = $lugar;
        $this->fecha = $fecha;
        $this->hora = $hora;
    }

    // Método para mostrar la información del evento
    public function mostrarInfo() {
        return "<h3>{$this->descripcion}</h3>
                <p>Tipo: {$this->tipo}</p>
                <p>Lugar: {$this->lugar}</p>
                <p>Fecha: {$this->fecha}</p>
                <p>Hora: {$this->hora}</p>";
    }

    // Método para filtrar eventos por tipo
    public static function filtrarPorTipo($eventos, $tipo) {
        return array_filter($eventos, function($evento) use ($tipo) {
            return $evento->tipo === $tipo;
        });
    }
}
?>
