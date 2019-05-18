<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Turnos;

class TurnosController extends Controller
{
    public function __construct()
    {
        $this->model = new Turnos();
    }

    /**
     * Show all task
     */
    public function index()
    {
        $turnos = $this->model->get();
        return view('turnos', compact('turnos'));
    }

    public function resumen()
    {
        $turno;
        $pathImage;
        $turnos = $this->model->get();
        foreach ($turnos as $t) {
            if ($_GET['id'] == $t->id) {
                $turno = $t;
                $pathImage = $t->imagen_diagnostico . $t->tipoImagen;                
                break;
            }
        }
        return view('turnos.resumen', compact('turno', 'pathImage'));
    }

    public function create()
    {
        $today =  date("Y-m-d");
        return view('turnos.create', compact('today'));
    }

    public function delete(){

        $parametro='id';
        $valor=$_GET['id'];
        $turno=$this->model->delete($parametro,$valor);
        return $this->index();
    }


    public function edit()
    {
        $turnos = $this->model->get();
        foreach ($turnos as $t) {
            if ($_GET['id'] == $t->id) {
                $turno = $t;
                break;
            }
        }
        $today =  date("Y-m-d");
        return view('turnos.update', compact('today','turno'));
    }


    public function update(){
        echo "llego aca";
        $parametro='id';
        $valor=$_POST['id'];
        $controles = [];

        if (!(isset($_POST['nombre_del_paciente']) &&
            preg_match('/^[A-Za-z]/', $_POST['nombre_del_paciente']))) {
            $controles[] = "ERROR CAMPO: NOMBRE DEL PACIENTE";
        }

        if (!(isset($_POST['email']) &&
            preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_POST['email']))) {
            $controles[] = "ERROR CAMPO: EMAIL";
        }

        if (!(isset($_POST['telefono']) &&
            is_numeric($_POST['telefono']))) {
            $controles[] = "ERROR CAMPO: TELEFONO";
        }

        if (!(isset($_POST['talla_de_calzado']) &&
            is_numeric($_POST['talla_de_calzado']) &&
            is_int((int)$_POST['talla_de_calzado']) &&
            $this->in_range($_POST['talla_de_calzado'], 19, 46))) {
            $controles[] = "ERROR CAMPO: TALLA DE CALZADO";
        }


        if (!(isset($_POST['fecha_de_nacimiento']) &&
            $this->validar_fecha($_POST["fecha_de_nacimiento"]))) {
            $controles[] = "ERROR CAMPO: FECHA DE NACIMIENTO";
        }

        if (!(isset($_POST['fecha_del_turno']) &&
            $this->validar_fecha($_POST["fecha_del_turno"]))) {
            $controles[] = "ERROR CAMPO: FECHA DEL TURNO";
        }

        if (!(isset($_POST['horario_del_turno']) &&
            $this->hourIsBetween('08:00', '17:00', $_POST['horario_del_turno']))) {
            $controles[] = "ERROR CAMPO: HORARIO DEL TURNO";
        }


        if (empty($controles)) {
            $turnos = $this->model->get();
            $contador = 1;
            if (!sizeof($turnos) == 0) {
                $contador = end($turnos)->id + 1;
            }
            $turno = array(
                'nombre_del_paciente' => $_POST["nombre_del_paciente"],
                'email' => $_POST["email"],
                'telefono' => $_POST["telefono"],
                'edad' => $_POST["edad"],
                'talla_de_calzado' => $_POST["talla_de_calzado"],
                'altura' => $_POST["altura"],
                'fecha_de_nacimiento' => $_POST["fecha_de_nacimiento"],
                'color_de_pelo' => $_POST["color_de_pelo"],
                'fecha_del_turno' => $_POST["fecha_del_turno"],
                'horario_del_turno' => $_POST["horario_del_turno"],
            );
            $this->model->update($turno,$parametro,$valor);
            return redirect('turnos');
        } else {
            echo $controles;
        }
    }

    public function save()
    {
        $controles = [];

        if (!(isset($_POST['nombre_del_paciente']) &&
            preg_match('/^[A-Za-z]/', $_POST['nombre_del_paciente']))) {
            $controles[] = "ERROR CAMPO: NOMBRE DEL PACIENTE";
        }

        if (!(isset($_POST['email']) &&
            preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_POST['email']))) {
            $controles[] = "ERROR CAMPO: EMAIL";
        }

        if (!(isset($_POST['telefono']) &&
            is_numeric($_POST['telefono']))) {
            $controles[] = "ERROR CAMPO: TELEFONO";
        }

        if (!(isset($_POST['talla_de_calzado']) &&
            is_numeric($_POST['talla_de_calzado']) &&
            is_int((int)$_POST['talla_de_calzado']) &&
            $this->in_range($_POST['talla_de_calzado'], 19, 46))) {
            $controles[] = "ERROR CAMPO: TALLA DE CALZADO";
        }


        if (!(isset($_POST['fecha_de_nacimiento']) &&
            $this->validar_fecha($_POST["fecha_de_nacimiento"]))) {
            $controles[] = "ERROR CAMPO: FECHA DE NACIMIENTO";
        }

        if (!(isset($_POST['fecha_del_turno']) &&
            $this->validar_fecha($_POST["fecha_del_turno"]))) {
            $controles[] = "ERROR CAMPO: FECHA DEL TURNO";
        }

        if (!(isset($_POST['horario_del_turno']) &&
            $this->hourIsBetween('08:00', '17:00', $_POST['horario_del_turno']))) {
            $controles[] = "ERROR CAMPO: HORARIO DEL TURNO";
        }
        //dejo por defecto una para imagenes no encontradas
        //$nombre_imagen = 'not_found.png';

        //Se hace aca el control de la imagen porque puede ser opcional, por lo que no seria un error que no la cargue
        $data;
        $tipo;
        if (!isset($_POST["imagen_diagnostico"])) {
            // Verificamos si el tipo de archivo es un tipo de imagen permitido.
            // y que el tamaño del archivo no exceda los MB
            $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
            $limite_kb = 10000;

            if (in_array($_FILES['imagen_diagnostico']['type'], $permitidos) && $_FILES['imagen_diagnostico']['size'] <= $limite_kb * 1024) {

                // Archivo temporal
                $imagen_temporal = $_FILES['imagen_diagnostico']['tmp_name'];

                // Tipo de archivo
                $tipo = $_FILES['imagen_diagnostico']['type'];

                // Leemos el contenido del archivo temporal en binario.
                $fp = fopen($imagen_temporal, 'r+b');
                $data = fread($fp, filesize($imagen_temporal));
                fclose($fp);

                //Podríamos utilizar también la siguiente instrucción en lugar de las 3 anteriores.
                // $data=file_get_contents($imagen_temporal);

                // Escapamos los caracteres para que se puedan almacenar en la base de datos correctamente.
                //$data = mysql_escape_string($data);

                // Insertamos en la base de datos.

            } else {
                $controles["typeErr"] = "La imagen no es del tipo  o excede el tamaño permitido";
            }
        } else {
            $controles["imageErr"] = "Ocurrió un error al cargar la imagen";
        }

        if (empty($controles)) {
            $turnos = $this->model->get();
            $contador = 1;
            if (!sizeof($turnos) == 0) {
                $contador = end($turnos)->id + 1;
            }
            $turno = array(
                'nombre_del_paciente' => $_POST["nombre_del_paciente"],
                'email' => $_POST["email"],
                'telefono' => $_POST["telefono"],
                'edad' => $_POST["edad"],
                'talla_de_calzado' => $_POST["talla_de_calzado"],
                'altura' => $_POST["altura"],
                'fecha_de_nacimiento' => $_POST["fecha_de_nacimiento"],
                'color_de_pelo' => $_POST["color_de_pelo"],
                'fecha_del_turno' => $_POST["fecha_del_turno"],
                'horario_del_turno' => $_POST["horario_del_turno"],
                'imagen_diagnostico' => $data,
                'tipoImagen'=>$tipo
            );
            $this->model->insert($turno);
            return redirect('turnos');
        } else {
            echo $controles['imageErr'];
        }
    }

    private function validar_fecha($fecha)
    {
        $valores = explode('-', $fecha);
        if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
            return true;
        }
        return false;
    }

    private function hourIsBetween($from, $to, $input)
    {
        $dateFrom = \DateTime::createFromFormat('!H:i', $from);
        $dateTo = \DateTime::createFromFormat('!H:i', $to);
        $dateInput = \DateTime::createFromFormat('!H:i', $input);
        if ($dateFrom > $dateTo) $dateTo->modify('+1 day');
        return ($dateFrom <= $dateInput && $dateInput <= $dateTo) || ($dateFrom <= $dateInput->modify('+1 day') && $dateInput <= $dateTo);
    }

    private function in_range($value, $min, $max)
    {
        return ($value > $min) && ($value < $max);
    }
}
