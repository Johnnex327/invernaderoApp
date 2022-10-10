<?php
include 'logo.php';
include 'barra.php';
?>


<div class="contenedor">
    <div class="container-reportes">
        <div class="encabezado-reportes">

            <div>
                <h3>Riegos realizadosd</h3>
            </div>

            <div>
                <h3>Humedad de Suelo</h3>
            </div>

            <div>
                <h3>Temperatura</h3>
            </div>

            <div>
                <h3>Humedad Relativa</h3>
            </div>


        </div>

        <!--  7 Dias -->

        <div>
            <div class="fondo-7dias">
                <h2 class="periodo">Ultimos 7 dias</h2>
                <div class="caja-riego">

                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/hsuelo.png">
                        <h3><?php echo $riegos_7dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                        <h3><span class="tipo">Riegos</span> <span class="dias">7 dias</span></h3>
                    </div>
                </div>

                <div class="caja-humedadSuelo">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/humedadSuelo.png">
                        <h3>%<?php echo $h_suelo_7dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                        <h3><span class="tipo">H. suelo </span><span class="dias">7 dias</span></h3>
                    </div>
                </div>

                <div class="caja-temperatura">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/temperatura.png">
                        <h3><?php echo $temperatura_7dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                        <h3><span class="tipo">Temp. </span><span class="dias">7 dias</span></h3>
                    </div>
                </div>

                <div class="caja-humedadRelativa">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/humedadRelativa.png">
                        <h3>%<?php echo $h_relativa_7dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                        <h3><span class="tipo">H. Relativa</span> <span class="dias">7 dias</span></h3>
                    </div>
                </div>
            </div>


        </div>

        <!-- 14 dias -->
        <div>
            <h2 class="periodo">Ultimos 14 dias</h2>
            <div class="fondo-14dias">
                <div class="caja-riego">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/hsuelo.png">
                        <h3><?php echo $riegos_14dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                    <h3><span class="tipo">Riegos</span> <span class="dias">14 dias</span></h3>
                    </div>
                </div>

                <div class="caja-humedadSuelo">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/humedadSuelo.png">
                        <h3>%<?php echo $h_suelo_14dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                    <h3><span class="tipo">H. suelo </span><span class="dias">14 dias</span></h3>
                    </div>
                </div>

                <div class="caja-temperatura">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/temperatura.png">
                        <h3>º<?php echo $temperatura_14dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                    <h3><span class="tipo">Temp. </span><span class="dias">14 dias</span></h3>
                    </div>
                </div>

                <div class="caja-humedadRelativa">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/humedadRelativa.png">
                        <h3>%<?php echo $h_relativa_14dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                    <h3><span class="tipo">H. Relativa</span> <span class="dias">14 dias</span></h3>
                    </div>
                </div>

            </div>
        </div>




        <!-- 30 dias -->

        <div>

            <div class="fondo-30dias">
            <h2 class="periodo">Ultimos 30 dias</h2>
                <div class="caja-riego">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/hsuelo.png">
                        <h3><?php echo $riegos_30dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                    <h3><span class="tipo">Riegos</span> <span class="dias">14 dias</span></h3>
                    </div>
                </div>

                <div class="caja-humedadSuelo">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/humedadSuelo.png">
                        <h3>%<?php echo $h_suelo_30dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                    <h3><span class="tipo">H. suelo </span> <span class="dias">30 dias</span></h3>
                    </div>
                </div>

                <div class="caja-temperatura">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/temperatura.png">
                        <h3>º<?php echo $temperatura_30dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                    <h3><span class="tipo">Temp. </span> <span class="dias">30 dias</span></h3>
                    </div>
                </div>

                <div class="caja-humedadRelativa">
                    <div class="elementos-caja-superior">
                        <img class="icon" src="build/img/humedadRelativa.png">
                        <h3>%<?php echo $h_relativa_30dias; ?></h3>
                    </div>

                    <div class="elementos-caja-inferior">
                    <h3><span class="tipo">H. Relativa</span><span class="dias">30 dias</span></h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include 'footer.php';
?>