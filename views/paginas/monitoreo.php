<?php
include 'logo.php';
include 'barra.php';
?>

<div class="contenedor">
    
    <div class="row">

        <div class="contenedor">
            <div class="card">
                <h3>HUMEDAD SUELO</h3>
                <div class="card-content">
                    <div class="gauge-suelo gaugeMeter" data-theme="blue" data-width="16" data-style="Arch" data-animationstep="0"></div>
                </div>
                <p class="value-suelo">0 %</p>
            </div>
        </div>

        <div class="contenedor">
            <div class="card">
                <h3>TEMPERATURA</h3>
                <div class="card-content">
                    <div class="gauge-temperature GaugeMeter gaugeMeter" data-theme="green" data-width="16" data-style="Arch" data-animationstep="0"></div>
                </div>
                <p class="value-temperature">0 C°</p>
            </div>
        </div>
        <div class="contenedor">
            <div class="card">
                <h3>HUMEDAD AIRE</h3>
                <div class="card-content">
                    <div class="gauge-humidity gaugeMeter" data-theme="blue" data-width="16" data-style="Arch" data-animationstep="0"></div>
                </div>
                <p class="value-humidity">0 %</p>
            </div>
        </div>

    </div>
    <div class="contenedor division">
        <fieldset class="informacion">
            <legend>Estado de riego</legend>
            
            <div class="elementos-estado-riego">
                <p>Estado: </p>
                <p>Tiempo establecido:</p>
                <p>Tiempo restante:</p>
                <input type="submit" value="Cancelar riego" class="boton-cancelar">
            </div>
        </fieldset>

        <fieldset class="informacion">
            <legend>Recomendaciones</legend>
            <div>
            <h4><img class="icon" src="build/img/visto.png">Humedad de suelo: 30 - 40%</h4>
            <h4><img class="icon" src="build/img/visto.png">Temperatura: 21º - 30º</h4>
            <h4><img class="icon" src="build/img/visto.png">Humedad Relativa: 50% -70%</h4>
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

        setInterval(charts, 1500);

    });

    function charts() {
        $.ajax({
            
            url: "http://cryptic-meadow-83396.herokuapp.com/getData",
            type: "POST",
            dataType: "json",
            success: function(data) {

                $(".gauge-suelo").gaugeMeter({
                    percent: data.h_suelo
                });
                $(".value-suelo").html(data.h_suelo + " %");


                $(".gauge-temperature").gaugeMeter({
                    percent: data.temperatura * 100 / 50
                });
                $(".value-temperature").html(data.temperatura + " C°");

                
                $(".gauge-humidity").gaugeMeter({
                    percent: data.h_relativa
                });
                $(".value-humidity").html(data.h_relativa + " %");
        
            }
        });

    }
</script>