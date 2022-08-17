<?php
include 'logo.php';
include 'barra.php';
?>

<div class="contenedor">

    <div class="row">

        <div class="contenedor">
            <div class="card">
                <h3>HUMEDAD SUELO</h3>
                <h4 class="sub_medidor">Hilera 1</h4>
                <div class="card-content">
                    <div class="gauge-suelo gaugeMeter" data-animate_text_colors="true" data-theme="LightBlue-DarkBlue" data-width="16" data-style="Arch" data-animationstep="0"></div>
                </div>
                <p class="value-suelo">0 %</p>
            </div>
        </div>

        <div class="contenedor">
            <div class="card">
                <h3>HUMEDAD SUELO</h3>
                <h4 class="sub_medidor">Hilera 2</h4>
                <div class="card-content">
                    <div class="gauge-suelo2 gaugeMeters" data-animate_text_colors="true"data-theme="LightBlue-DarkBlue" data-width="16" data-style="Arch" data-animationstep="0"></div>
                </div>
                <p class="value-suelo2">0 %</p>
            </div>
        </div>

        <div class="contenedor">
            <div class="card">
                <h3>HUMEDAD SUELO</h3>
                <h4 class="sub_medidor">Hilera 3</h4>
                <div class="card-content">
                    <div class="gauge-suelo3 gaugeMeter" data-animate_text_colors="true" data-theme="LightBlue-DarkBlue" data-width="16" data-style="Arch" data-animationstep="0"></div>
                </div>
                <p class="value-suelo3">0 %</p>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="contenedor">
            <div class="card">
                <h3>HUMEDAD SUELO</h3>
                <h4 class="sub_medidor">Hilera 4</h4>
                <div class="card-content">
                    <div class="gauge-suelo4 gaugeMeter" data-animate_text_colors="true" data-theme="LightBlue-DarkBlue" data-width="16" data-style="Arch" data-animationstep="0"></div>
                </div>
                <p class="value-suelo4">0 %</p>
            </div>
        </div>

        <div class="contenedor">
            <div class="card">
                <h3>TEMPERATURA</h3>
                <h4 class="sub_medidor">Invernadero</h4>
                <div class="card-content">
                    <div class="gauge-temperature GaugeMeter gaugeMeter" data-animate_text_colors="true" data-theme="Green-Gold-Red" data-width="16" data-style="Arch" data-animationstep="0"></div>
                </div>
                <p class="value-temperature">0 C°</p>
            </div>
            
        </div>
        <div class="contenedor">
            <div class="card">
                <h3>HUMEDAD AIRE</h3>
                <h4 class="sub_medidor">Invernadero</h4>
                <div class="card-content">
                    <div class="gauge-humidity gaugeMeter" data-color="aqua" data-theme="DarkGreen-LightGreen" data-width="16" data-style="Arch" data-animationstep="0"></div>
                </div>
                <p class="value-humidity">0 %</p>
            </div>
        </div>

    </div>

    <div class="contenedor division">
        <fieldset class="informacion">
            <legend>Estado de riego</legend>

            <div class="elementos-estado-riego">
                <p>Riego Hilera 1: <span class="estado"> - </span></p>
                <p>Riego Hilera 2: <span class="estado2"> - </span></p>
                <p>Riego Hilera 3: <span class="estado3"> - </span></p>
                <p>Riego Hilera 4: <span class="estado4"> - </span></p>
                <!-- <p>Tiempo establecido: --:--</p>
                <p>Tiempo restante: --:--</p>
                <input type="submit" value="Iniciar Riego" class="boton-cancelar" onClick=location.href='/RIEGO=ON'> -->
            </div>
        </fieldset>

        <fieldset class="informacion">
            <legend>Recomendaciones</legend>
            <div>
                <h4><img class="icon" src="build/img/visto.png">Humedad de suelo: 35 - 50%</h4>
                <h4><img class="icon" src="build/img/visto.png">Temperatura: 21º - 30º</h4>
                <h4><img class="icon" src="build/img/visto.png">Humedad Relativa: 50% -80%</h4>
            </div>
        </fieldset>

    </div>
</div>

<?php
include 'footer.php';
?>


<script type='text/javascript' src="build/js/jquery-3.5.1.min.js"></script>
<script type='text/javascript' src="build/js/gauge-meter.js"></script>
<script>
    $(document).ready(function() {

        setInterval(charts, 4000);

    });

    function charts() {

        $.ajax({
            //Para local
            url: "http://localhost:3000/getData",
            /* url: "https://cryptic-meadow-83396.herokuapp.com/getData", */
            type: "GET",
            dataType: "json",
            success: function(data) {

                                    //Hilera 1
                /* ------------------------------------------------ */

                $(".gauge-suelo").gaugeMeter({
                    percent: data.h_suelo
                });
                $(".value-suelo").html(data.h_suelo + " %");


                                    //Hilera 2
                /* ------------------------------------------------ */

                $(".gauge-suelo2").gaugeMeter({
                    percent: data.h_suelo2
                });
                $(".value-suelo2").html(data.h_suelo2 + " %");


                                    //Hilera 3
                /* ------------------------------------------------ */

                $(".gauge-suelo3").gaugeMeter({
                    percent: data.h_suelo3
                });
                $(".value-suelo3").html(data.h_suelo3 + " %");


                                    //Hilera 4
                /* ------------------------------------------------ */

                $(".gauge-suelo4").gaugeMeter({
                    percent: data.h_suelo4
                });
                $(".value-suelo4").html(data.h_suelo4 + " %");
                
                /* ------------------------------------------------ */


                $(".gauge-temperature").gaugeMeter({
                    percent: data.temperatura * 100 / 50
                });
                $(".value-temperature").html(data.temperatura + " C°");


                $(".gauge-humidity").gaugeMeter({
                    percent: data.h_relativa
                });
                $(".value-humidity").html(data.h_relativa + " %");


                /* ------------------------------------------------ */

                $(".estado").html(data.estado);
                $(".estado2").html(data.estado2);
                $(".estado3").html(data.estado3);
                $(".estado4").html(data.estado4);
                

            }
        });

    }
</script>