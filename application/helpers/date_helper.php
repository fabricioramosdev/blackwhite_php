<?php


if (!function_exists('parseDate')) {

  function parseDate($subject = '') {
    $pattern = '/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/';
    preg_match($pattern, $subject, $matches);

    if ( count($matches) > 0 ){
      return join("-", array_reverse(explode($matches[count($matches)-1], $matches[0])));
    }else{
      throw new Exception("Erro ao converter a string '$subject' para o formato de data");
    }

  }

  function parseDateTime($subject, $formatOrigem="d/m/Y H:i", $formatDestino="Y-m-d H:i:s") {
    $date = DateTime::createFromFormat($formatOrigem, $subject);

    if (method_exists($date, "format")){
      return $date->format($formatDestino);
    }else{
      return false;
    }

  }

  if (!function_exists('to_brazilian')) {

    function to_brazilian($str_date) {

      try {
        $date = new DateTime($str_date);
        return $date->format("d/m/Y");
      } catch (Exception $ex) {
        show_error("O valor <b>{$str_date}</b> não é uma data válida");
      }
    }

  }

  if (!function_exists('to_brazilian_datatime')) {

    function to_brazilian_datatime($str_date) {

      try {
        $date = new DateTime($str_date);
        return $date->format("d/m/Y H:i:s");
      } catch (Exception $ex) {
        show_error("O valor <b>{$str_date}</b> não é uma data válida");
      }
    }

  }


  if (!function_exists('to_mysql')) {

    function to_mysql($str_date) {

      try {
        $date = new DateTime($str_date);
        return $date->format("Y-m-d");
      } catch (Exception $ex) {
        show_error("O valor <b>{$str_date}</b> não é uma data válida");
      }
    }

  }

  if (!function_exists('to_mysql_datatime')) {

    function to_mysql_datatime($str_date) {

      try {
        $date = new DateTime($str_date);
        return $date->format("Y-m-d H:i:s");
      } catch (Exception $ex) {
        show_error("O valor <b>{$str_date}</b> não é uma data válida");
      }
    }

  }


  if (!function_exists('datediff')) {

    function datediff($interval, $datefrom, $dateto, $using_timestamps = false) {
      /*
      $interval can be:
      yyyy - Number of full years
      q - Number of full quarters
      m - Number of full months
      y - Difference between day numbers
      (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
      d - Number of full days
      w - Number of full weekdays
      ww - Number of full weeks
      h - Number of full hours
      n - Number of full minutes
      s - Number of full seconds (default)
      */

      if (!$using_timestamps) {
        $datefrom = strtotime($datefrom, 0);
        $dateto = strtotime($dateto, 0);
      }
      $difference = $dateto - $datefrom; // Difference in seconds

      switch ($interval) {

        case 'yyyy': // Number of full years

        $years_difference = floor($difference / 31536000);
        if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom) + $years_difference) > $dateto) {
          $years_difference--;
        }
        if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto) - ($years_difference + 1)) > $datefrom) {
          $years_difference++;
        }
        $datediff = $years_difference;
        break;

        case "q": // Number of full quarters

        $quarters_difference = floor($difference / 8035200);
        while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom) + ($quarters_difference * 3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
          $months_difference++;
        }
        $quarters_difference--;
        $datediff = $quarters_difference;
        break;

        case "m": // Number of full months

        $months_difference = floor($difference / 2678400);
        while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom) + ($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
          $months_difference++;
        }
        $months_difference--;
        $datediff = $months_difference;
        break;

        case 'y': // Difference between day numbers

        $datediff = date("z", $dateto) - date("z", $datefrom);
        break;

        case "d": // Number of full days

        $datediff = floor($difference / 86400);
        break;

        case "w": // Number of full weekdays

        $days_difference = floor($difference / 86400);
        $weeks_difference = floor($days_difference / 7); // Complete weeks
        $first_day = date("w", $datefrom);
        $days_remainder = floor($days_difference % 7);
        $odd_days = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?
        if ($odd_days > 7) { // Sunday
          $days_remainder--;
        }
        if ($odd_days > 6) { // Saturday
          $days_remainder--;
        }
        $datediff = ($weeks_difference * 5) + $days_remainder;
        break;

        case "ww": // Number of full weeks

        $datediff = floor($difference / 604800);
        break;

        case "h": // Number of full hours

        $datediff = floor($difference / 3600);
        break;

        case "n": // Number of full minutes

        $datediff = floor($difference / 60);
        break;

        default: // Number of full seconds (default)

        $datediff = $difference;
        break;
      }

      return $datediff;
    }

  }

  if (!function_exists('diffToNow')) {

    function diffToNow($data_inicial) {

      $data_final = date("Y-m-d H:i:s");

      $dStart = new DateTime($data_inicial);
      $dEnd = new DateTime($data_final);

      $dDiff = $dStart->diff($dEnd);

      if ($dDiff->y == 0 && $dDiff->m == 0 && $dDiff->days == 0 && $dDiff->h == 0 && $dDiff->i == 0) { //Diferença em segundos
        echo "Agora mesmo";
      } else if ($dDiff->y == 0 && $dDiff->m == 0 && $dDiff->d == 0 && $dDiff->h == 0) {
        if ($dDiff->i == 1) {
          echo "Há " . $dDiff->i . " minuto";
        } else {
          echo "Há " . $dDiff->i . " minutos";
        }
      } else if ($dDiff->y == 0 && $dDiff->m == 0 && $dDiff->d == 0) {
        if ($dDiff->h == 1) {
          echo "Há " . $dDiff->h . " hora";
        } else {
          echo "Há " . $dDiff->h . " horas";
        }
      } else if ($dDiff->y == 0) {
        if ($dDiff->days == 1) {
          echo "Há " . $dDiff->days . " dia";
        } else {
          echo "Há " . $dDiff->days . " dias";
        }
      } else {
        if ($dDiff->y == 1) {
          echo "Há " . $dDiff->y . " ano";
        } else {
          echo "Há " . $dDiff->y . " anos";
        }

        $dias = $dDiff->days - ( $dDiff->y * 365 );

        if ($dias > 0) {
          if ($dias == 1) {
            echo " e " . $dias . " dia";
          } else {
            echo " e " . $dias . " dias";
          }
        }
      }
    }

  }


  if (!function_exists('parseDate')) {

    function parseDate($subject = '') {
      $pattern = '/^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[1,3-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/';
      preg_match($pattern, $subject, $matches);

      if ( count($matches) > 0 ){
        return join("-", array_reverse(explode($matches[count($matches)-1], $matches[0])));
      }else{
        throw new Exception("Erro ao converter a string '$subject' para o formato de data");
      }

    }

    function parseDateTime($subject, $formatOrigem="d/m/Y H:i", $formatDestino="Y-m-d H:i:s") {
      $date = DateTime::createFromFormat($formatOrigem, $subject);

      if (method_exists($date, "format")){
        return $date->format($formatDestino);
      }else{
        return false;
      }
    }

  }

}
