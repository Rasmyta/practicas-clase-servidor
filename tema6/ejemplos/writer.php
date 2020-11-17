<?php 

interface Writer {
    public function write(Articulo $obj);
}

class CXMLWriter implements Writer {
    public function write(Articulo $obj) {
        $ret = '<article>';
        $ret .= '<title>' . $obj->titulo . '</title>';
        $ret .= '<author>' . $obj->autor . '</author>';
        $ret .= '<date>' . $obj->fecha . '</date>';
        $ret .= '<category>' . $obj->categoria . '</category>';
        $ret .= '</article>';
        return $ret;
    }
}

class CJSONWriter implements Writer {
    public function write(Articulo $obj) {
        $array = array('article' => $obj);
        return json_encode($array);
    }
}

class Articulo {
    public $titulo;
    public $autor;
    public $fecha;
    public $categoria;
 
    public function  __construct($titulo, $autor, $fecha, $categoria = 0) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->fecha = $fecha;
        $this->categoria = $categoria;
    }

    //Type Hinting diciendo que puede recibir objetos que implementen el interfaz Writer
    public function write(Writer $writer) {
        return $writer->write($this);
    }
}

//Prueba
$unArticulo = new Articulo('Polimorfismo', 'Javier', time(), 0);
echo $unArticulo->write(new CXMLWriter());
echo $unArticulo->write(new CJSONWriter());

?>