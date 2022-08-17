<?php
include 'logo.php';
include 'barra.php';
?>

<form class="contenedor" method="POST" action="">

    <div>

        <!-- <div class="div-configuracion">
            <p>Tiempo de riego (Horas): </p>
            <input type="text" name="tiempo_riego" placeholder="Ingresar tiempo de regado" value="<?php echo s($configuracion[0]->tiempo_riego); ?>">
        </div>

        <div class="div-configuracion">
            <p>Frecuencia de escaneado de sensor: </p>
            <input type="datetime" name="frecu_escaneado" placeholder="Minutos" value="<?php echo s($configuracion[0]->frecu_escaneado); ?>">
        </div>
 -->
        <div class="div-configuracion">
            <p>Porcentaje de humedad de suelo mínimo: </p>
            <input type="number" name="porc_minimo" placeholder="Ingresar porcentaje minimo de suelo" value="<?php echo s($configuracion[0]->porc_minimo); ?>">
        </div>

       <!--  <div class="div-configuracion">
            <p>Porcentaje de humedad suelo máximo: </p>
            <input type="datetime" name="porc_maximo" placeholder="Ingresar porcentaje maximo de suelo" value="<?php echo s($configuracion[0]->porc_maximo); ?>">
        </div> -->

        <div class="div-configuracion">
            <p>Notificar inicio de riego: </p>
            <div>
                <select name="noti_riego">
                    <?php
                    if ($configuracion[0]->noti_riego === "activado") {
                    ?>
                        <option value="activado" selected>Activado</option>
                        <option value="desactivado">Desactivado</option>
                    <?php
                    } else {
                    ?>
                        <option value="desactivado" selected>Desactivado</option>
                        <option value="activado">Activado</option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>


    </div>

    <input class="contenedor boton-guardar" type="submit" value="Guardar">
</form>

<?php
    include 'footer.php';
?>