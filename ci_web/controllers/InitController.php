<?php defined('BASEPATH') OR exit('No direct script access allowed');

class InitController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
  }

  public function index()
  {

      $datos = array(
        'listados' => array(),
        'trazado' => array(),
        'Kwh_total' => '',
      );


    $vista = array(
      'vista' => 'web/index.php',
      'params' => $datos,
      'layout' => 'ly_home.php',
      'titulo' => 'TITULO',
      'metas' => array(
        'description' => '',
        'keywords' => '',
        'author' => '',
      ),
      'metas_og' => array(),
    );

    $this->layouts->view ( $vista);

  }

  public function trocear()
  {

    $fini = explode ( "/", $_POST['frm_ini']);
    $ffin = explode ( "/", $_POST['frm_fin']);

    $cups = strtoupper( RandomString( 20));


    $Kwh_total = 0;
    for ( $mes = intval( $fini[1]); $mes <= $ffin[1]; $mes++)
    {

      $kwh = rand( 1, 100);
      $Kwh_total += $kwh;

      $numero_dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $fini[2]);


      if ( $mes == intval($fini[1]))
      {
        $day_ini = intval($fini[0]);
        $day_fin = $numero_dias_mes;
      }
      elseif ( $mes == intval($ffin[1]))
      {
        $day_ini = '1';
        $day_fin = intval($ffin[0]);

        $numero_dias_mes = intval($ffin[0]);
      }
      else
      {
        $day_ini = '01';
        $day_fin = $numero_dias_mes;
      }

      $di = $day_ini . "/" . $mes . "/" . $fini[2];
      $df = $day_fin . "/" . $mes . "/" . $ffin[2];




      $listados[] = array(
        'cups' => $cups,
        'fecha_ini' =>  $di,
        'fecha_fin' => $df,
        'Kwh' => $kwh
      );

      $trazado[] = array(
        'cups' => $cups,
        'fecha_ini' => $di,
        'fecha_fin' => $df,
        'kwh_factura' => $kwh,
        'dias_factura' => $numero_dias_mes,
        'kwh_dia' => $kwh / $numero_dias_mes,
        'dias_periodo' => $numero_dias_mes,
        'kwh_periodo' => $kwh
      );

    }



    $datos = array(
      'listados' => $listados,
      'trazado' => $trazado,
      'Kwh_total' => $Kwh_total,
    );


    $vista = array(
      'vista' => 'web/trazado.php',
      'params' => $datos,
      'layout' => 'ly_home.php',
      'titulo' => 'TITULO',
      'metas' => array(
        'description' => '',
        'keywords' => '',
        'author' => '',
      ),
      'metas_og' => array(),
    );

    $this->layouts->view ( $vista);

  }
}