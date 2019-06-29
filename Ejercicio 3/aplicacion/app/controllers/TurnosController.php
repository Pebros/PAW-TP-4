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
            if($_GET['id'] == $t->id){
                $turno = $t;
                $pathImage = '\\image\\'.$t->imagen_diagnostico;
                break;
            }
        }

        return view('turnos.resumen', compact('turno','pathImage'));
    }

    public function create()
    {
        $today =  date("Y-m-d");
        return view('turnos.create', compact('today'));
    }

    public function save()
    {
        $controles = [];

        if( !(isset($_POST['nombre_del_paciente']) &&
          preg_match('/^[A-Za-z]/',$_POST['nombre_del_paciente'])) )
        {
          $controles[] = "ERROR CAMPO: NOMBRE DEL PACIENTE";
        }

        if( !(isset($_POST['email']) &&
            preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',$_POST['email'])) )
        {
          $controles[] = "ERROR CAMPO: EMAIL";
        }

        if( !(isset($_POST['telefono']) &&
            is_numeric($_POST['telefono'])) )
        {
          $controles[] = "ERROR CAMPO: TELEFONO";
        }

        if(!empty($_POST['edad']))
        {
            if( !(is_numeric($_POST['edad'])) ||
                !(is_int((int) $_POST['edad'])) ||
                !($this->in_range($_POST['edad'],0,999)))
            {
              $controles[] = "ERROR CAMPO: EDAD";
            }
        }else{
            $_POST['edad'] = "0";
        }

        if(!empty($_POST['talla_de_calzado']))
        {
            if( !(is_numeric($_POST['talla_de_calzado'])) ||
                !(is_int((int) $_POST['talla_de_calzado'])) ||
                !($this->in_range($_POST['talla_de_calzado'],19,46)))
            {
              $controles[] = "ERROR CAMPO: TALLA DE CALZADO";
            }
        }else{
            $_POST['talla_de_calzado'] = "0";
        }

        if( !(isset($_POST['fecha_de_nacimiento']) &&
            $this->validar_fecha($_POST["fecha_de_nacimiento"])))
        {
          $controles[] = "ERROR CAMPO: FECHA DE NACIMIENTO";
        }

        if(!( isset($_POST['fecha_del_turno']) &&
            $this->validar_fecha($_POST["fecha_del_turno"])))
        {
          $controles[] = "ERROR CAMPO: FECHA DEL TURNO";
        }

        if( !empty($_POST['horario_del_turno'])){
            if( !$this->hourIsBetween('08:00','17:00', $_POST['horario_del_turno']))
            {
              $controles[] = "ERROR CAMPO: HORARIO DEL TURNO";
            }
        }else{
            $_POST['horario_del_turno'] = "00:00";
        }

        //dejo por defecto una para imagenes no encontradas
        $nombre_imagen = 'not_found.png';

        //Se hace aca el control de la imagen porque puede ser opcional, por lo que no seria un error que no la cargue
        if (!empty($_FILES['imagen_diagnostico']['tmp_name'])) {
            if( !($_FILES['imagen_diagnostico']['type'] === 'image/png' ||
                  $_FILES['imagen_diagnostico']['type'] === 'image/jpg' ||
                  $_FILES['imagen_diagnostico']['type'] === 'image/jpeg'))
          {
            $controles[] = "ERROR CAMPO: IMAGEN DIAGNOSTICO";
          }
        }

        if(empty($controles)){
            $turnos = $this->model->get();
            $contador = 1;
            if(!sizeof($turnos) == 0){
                $contador = end($turnos)->id + 1;
            }
            
            if(!empty($_FILES['imagen_diagnostico']['tmp_name'])){
                //me guardo el nombre y creo el archivo;
                $nombre_imagen = $contador.'_'.$_FILES['imagen_diagnostico']['name'];
                move_uploaded_file($_FILES['imagen_diagnostico']['tmp_name'], 'image\\'.$nombre_imagen);

            }

            $turno = array('nombre_del_paciente' => $_POST["nombre_del_paciente"],
                'email'=> $_POST["email"],
                'telefono' => $_POST["telefono"],
                'edad' => $_POST["edad"],
                'talla_de_calzado' => $_POST["talla_de_calzado"],
                'altura' => $_POST["altura"],
                'fecha_de_nacimiento' => $_POST["fecha_de_nacimiento"],
                'color_de_pelo' => $_POST["color_de_pelo"],
                'fecha_del_turno' => $_POST["fecha_del_turno"],
                'horario_del_turno' => $_POST["horario_del_turno"],
                'imagen_diagnostico' => $nombre_imagen);

            $this->model->insert($turno);
            return redirect('turnos');
        }else{
            $turno = array('nombre_del_paciente' => $_POST["nombre_del_paciente"],
                'email'=> $_POST["email"],
                'telefono' => $_POST["telefono"],
                'edad' => $_POST["edad"],
                'talla_de_calzado' => $_POST["talla_de_calzado"],
                'altura' => $_POST["altura"],
                'fecha_de_nacimiento' => $_POST["fecha_de_nacimiento"],
                'color_de_pelo' => $_POST["color_de_pelo"],
                'fecha_del_turno' => $_POST["fecha_del_turno"],
                'horario_del_turno' => $_POST["horario_del_turno"]);
            return view('turnos.create', compact('controles','turno'));
        }
    }

    private function validar_fecha($fecha){
        $valores = explode('-', $fecha);
        if(count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])){
            return true;
        }
        return false;
    }

    private function hourIsBetween($from, $to, $input) {
        $dateFrom = \DateTime::createFromFormat('!H:i', $from);
        $dateTo = \DateTime::createFromFormat('!H:i', $to);
        $dateInput = \DateTime::createFromFormat('!H:i', $input);
        if ($dateFrom > $dateTo) $dateTo->modify('+1 day');
        return ($dateFrom <= $dateInput && $dateInput <= $dateTo) || ($dateFrom <= $dateInput->modify('+1 day') && $dateInput <= $dateTo);
    }

    private function in_range($value, $min, $max){
        return ($value>$min) && ($value<$max);
    }
}
