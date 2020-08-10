<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


	function debug( $var)
	{
		$debug = debug_backtrace();
		echo "<pre>";
		echo $debug[0]['file']." ".$debug[0]['line']."<br><br>";
		print_r($var);
		echo "</pre>";
		echo "<br>";
	}

	function debug_cli( $var)
	{
		$debug = debug_backtrace();
		echo "<pre>";
		echo $debug[0]['file']." ".$debug[0]['line']."\n\n";
		print_r($var);
		echo "</pre>";
		echo "\n";
	}

	// Obtiene la ruta de los ficheros estaticos.
	function statics_url( $path)
	{

		$domain = get_domain(  base_url(), 0);

		if ( !file_exists( APP_ROOT.$domain))
		{
			$domain = config_item('default_domain');
		}

		return base_url().'statics/'.$domain."/".$path;
	}

	function MesNumberToWord( $mes)
	{
		switch ( $mes)
		{
			case '1': $mes_texto = "Enero"; break;
  		case '2': $mes_texto = "Febrero"; break;
			case '3': $mes_texto = "Marzo";  break;
			case '4': $mes_texto = "Abril";	break;
			case '5': $mes_texto = "Mayo"; break;
			case '6': $mes_texto = "Junio"; break;
			case '7': $mes_texto = "Julio"; break;
			case '8': $mes_texto = "Agosto";	break;
			case '9': $mes_texto = "Septiembre"; break;
			case '10': $mes_texto = "Octubre"; break;
			case '11': $mes_texto = "Noviembre"; break;
			case '12': $mes_texto = "Diciembre"; break;
		}

		return ( $mes_texto);
	}


	function RandomString( $n = 10)
	{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';

    for ($i = 0; $i < $n; $i++)
    {
        $randstring .= strtolower( $characters[rand(0, strlen($characters)-1)]);
    }

    return $randstring.date( 'is');
	}

	function getSlug($text)
	{
	  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);
	  $text = trim($text, '-');
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
	  $text = strtolower($text);
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  if (empty($text))
	  {
	    return 'n-a';
	  }
	  return $text;
	}