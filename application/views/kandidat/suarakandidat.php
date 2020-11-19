<div id="page-head">

<div class="pad-all text-center">
    <h3>Jumlah Suara - Kandidat (<?= $profile['username']; ?>).</h3>
    <p1>Lihat Total Suara Anda</p>
</div>
</div>

<!--Page content-->
<!--===================================================-->
<div id="page-content">

  <!--Guege server load-->
 					        <!--===================================================-->
 					        <div class="panel panel-colorful panel-purple">
 					            <div class="pad-all text-center">

 					                <!--Gauge placeholder-->
 					                <canvas id="demo-gauge" height="120" class="canvas-responsive"></canvas>
 					                <p>
 					                    <span id="demo-gauge-text" class="text-lg text-semibold"></span>% Dari Semua Pemilih
 					                </p>
 					            </div>
 					            <div class="pad-ver bg-trans-dark">
 					                <ul class="list-unstyled row text-center">
 					                    <li class="col-xs-12">
 					                        <p class="ti-bar-chart icon-2x"></p>
 					                        Total Suara Anda : 2 Suara
 					                    </li>
 					                </ul>
 					            </div>
 					        </div>
 					        <!--===================================================-->
 					        <!--End Guege server load-->

</div>
<!--===================================================-->
<!--End page content-->

<!--jQuery [ REQUIRED ]-->
<script src="<?php echo base_url('assets');?>/js/jquery.min.js"></script>

        <script type="text/javascript">
        $(document).on('nifty.ready', function() {
            // GAUGE PLUGIN
            // =================================================================
            // Require Gauge.js
            // -----------------------------------------------------------------
            // http://bernii.github.io/gauge.js/
            // =================================================================
            var opts = {
                lines: 10, // The number of lines to draw
                angle: 0, // The length of each line
                lineWidth: 0.41, // The line thickness
                pointer: {
                    length: 0.75, // The radius of the inner circle
                    strokeWidth: 0.035, // The rotation offset
                    color: 'rgba(0, 0, 0, 0.38)' // Fill color
                },
                limitMax: 'true', // If true, the pointer will not go past the end of the gauge
                colorStart: '#fff', // Colors
                colorStop: '#fff', // just experiment with them
                strokeColor: '#914887', // to see which ones work best for you
                generateGradient: true
            };


            var target = document.getElementById('demo-gauge'); // your canvas element
            var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
            gauge.maxValue = 100; // set max gauge value
            gauge.animationSpeed = 32; // set animation speed (32 is default value)
            gauge.set(88); // set actual value
            gauge.setTextField(document.getElementById("demo-gauge-text"));



        });
        </script>

            <!--NiftyJS [ RECOMMENDED ]-->
            <script src="<?php echo base_url('assets');?>/js/nifty.min.js"></script>

            <!--Gauge js [ OPTIONAL ]-->
            <script src="<?php echo base_url('assets');?>/plugins/gauge-js/gauge.min.js"></script>
