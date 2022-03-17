<?php
class myDBC{
 
    public $mysqli=null;
 
    public function __construct(){
 
        include_once 'dbconfig.php';
        $this->mysqli = new mysqli('localhost', 'root', '', 'inapam');
 
        if ($this->mysqli->connect_errno){
            echo "Error MySQLi: ("&nbsp. $this->mysqli->connect_errno.") " . $this->mysqli->connect_error;
            exit();
        }
        $this->mysqli->set_charset("utf8");
    }
 
    public function __destruct(){
        $this->CloseDB();
    }
 
    public function runQuery($qry){
        $result = $this->mysqli->query($qry);
        return $result;
    }
 
    public function CloseDB(){
        $this->mysqli->close();
    }
 
    public function clearText($text){
        $text = trim($text);
        return $this->mysqli->real_escape_string($text);
    }
 
    public function subirTodo($nick, $mail, $edad, $ruta){
 
        $q = "INSERT INTO imagenes (nombre, email, edad, ruta) VALUES ('$nick', '$mail', '$edad', '$ruta')";
        $result = $this->mysqli->query($q);
 
        if($result){ //Si resultado es true, se agregó correctamente
                    echo'<script type="text/javascript">
                        alert("Agregado Exitosamente a la BD");
                        window.location="http://localhost/subirArchivos/index.php"
                        </script>';
        }
        else{ //Si hubo error al insertar, se avisa
                echo'<script type="text/javascript">
                     alert("Chispas... Algo anda mal");
                     window.location="http://localhost/subirArchivos/index.php"
                     </script>';
        }
 
    }
 
    public function seleccionar_images(){
        $q = "select ruta from imagenes";
 
        $result = $this->mysqli->query($q);
 
        //Array asociativo que contendrá los datos
        $valores = array();
 
        //Si no hay resultados
        //Se avisa al usuario y se redirige al index de la aplicación
        if( $result->num_rows == 0)
        {
            echo'<script type="text/javascript">
              alert("Ningun registro");
            </script>';
            return false;
        }
      //En otro caso, se recibe la información y se
      //se regresa un array con los datos de la consulta
      else{
            while($row = mysqli_fetch_assoc($result)){
                //Se agrega cada valor en el array
                array_push($valores, $row);
            }
      }
        //Regresa array asociativo
        return $valores;
    }
 
     public function seleccionar_datos(){
        $q = "SELECT ruta, nombre, email, edad FROM imagenes";
 
        $result = $this->mysqli->query($q);
 
        //Array asociativo que contendrá los datos
        $valores = array();
 
        //Si no hay resultados
        //Se avisa al usuario y se redirige al index de la aplicación
        if( $result->num_rows == 0)
        {
            echo'<script type="text/javascript">
              alert("Ningun registro");
            </script>';
            return false;
        }
      //En otro caso, se recibe la información y se
      //se regresa un array con los datos de la consulta
      else{
            while($row = mysqli_fetch_assoc($result)){
                //Se agrega cada valor en el array
                array_push($valores, $row);
            }
      }
        //Regresa array asociativo
        return $valores;
    }
 
    public function contar_registros(){
        $q = "SELECT nombre FROM imagenes";
 
        $result = $this->mysqli->query($q);
 
        return $this->mysqli->affected_rows;
    }
}
?>