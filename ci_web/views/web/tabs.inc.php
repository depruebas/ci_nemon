<?php
  //debug ( $trazado);

?>
<div class="text-center">
  <p class="lead title">TROZEADO DE FACTURAS POR INTERVALO DE TIEMPO</p>
  </div>
  <br>
  <form class="form-inline" action=/trocear method="POST">
    <div class="form-group mx-sm-3 mb-2">
      <label for="inputPassword2" class="">Fecha de inicio:&nbsp;</label>
      <input type="text" class="form-control" id="frm_ini" name="frm_ini" placeholder="" value="01/01/2019">
    </div>
    <div class="form-group mx-sm-3 mb-2">
      <label for="inputPassword2" class="">Fecha de fin:&nbsp;</label>
      <input type="text" class="form-control" id="frm_fin" name="frm_fin" placeholder="" value="31/12/2019">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Trocear facturas</button>
  </form>
  <hr></hr>

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Listado de Facturas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Trazado mes natural</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Acumulado CUPS</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active text-center" id="home" role="tabpanel" aria-labelledby="home-tab">
  <br>

  <?php

    if ( !empty( $listados))
    {
      echo '
        <table class="table">
          <thead>
            <tr>
              <th>CUPS</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Kwh</th>
            </tr>
          </thead>
          <tbody>
      ';

      foreach ($listados as $value)
      {
        echo '
           <tr>
              <td>'.$value['cups'].'</td>
              <td>'.$value['fecha_ini'].'</td>
              <td>'.$value['fecha_fin'].'</td>
              <td>'.$value['Kwh'].'</td>
            </tr>
        ';
      }

      echo '</tbody></table>';
    }
    else
    {
      echo 'No hay resultados a mostrar en el listado';
    }

  ?>


  </div>
  <div class="tab-pane fade text-center" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <br>
    <?php

    if ( !empty( $trazado))
    {
      echo '
        <table class="table">
          <thead>
            <tr>
              <th>CUPS</th>
              <th>Fecha Inicio</th>
              <th>Fecha Fin</th>
              <th>Kwh Factura</th>
              <th>Días Factura</th>
              <th>Kwh Día</th>
              <th>Días Período</th>
              <th>Kwh Período</th</th>
            </tr>
          </thead>
          <tbody>
      ';

      foreach ($trazado as $value)
      {
        echo '
           <tr>
              <td>'.$value['cups'].'</td>
              <td>'.$value['fecha_ini'].'</td>
              <td>'.$value['fecha_fin'].'</td>
              <td>'.$value['kwh_factura'].'</td>
              <td>'.$value['dias_factura'].'</td>
              <td>'.$value['kwh_dia'].'</td>
              <td>'.$value['dias_periodo'].'</td>
              <td>'.$value['kwh_periodo'].'</td>
            </tr>
        ';
      }

      echo '</tbody></table>';
    }
    else
    {
      echo 'No hay resultados a mostrar en el trazado';
    }

  ?>

  </div>
  <div class="tab-pane fade text-center" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <br>
    <?php

      if ( !empty( $Kwh_total))
      {
        echo "Total acumulado CUP: " . $Kwh_total;
      }
      else
      {
        echo 'No hay resultados a mostrar en el acumulado';
      }

    ?>

  </div>
</div>