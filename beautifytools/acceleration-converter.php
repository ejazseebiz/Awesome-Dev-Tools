<?php
$plug_fl =  plugin_dir_url( __FILE__ );
$plug_dr =  plugin_dir_url( __DIR__ );
?>

<!-- <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/bootstrap.min.css" media="all" /> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/bootstrap-theme.min.css" media="all" /> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/unit_converter.css" media="all" /> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo $plug_fl; ?>css/common.css" media="all" /> -->

    <div class="card">
        <div class="card-body">
            <div class="well well-sm">
                <p>Acceleration Converter converts Meter per second squared, Foot per second squared, G, Galileo and Inch per second squared.</p>
                <form class="form-horizontal" action="#" method="post" name="unit_converter">
                    <fieldset>

                        <!-- Text input-->
                        <div class="form-group">
                            <div class="col-md-12">
                                <input data-prop="Acceleration" id="data" name="data" type="text" placeholder="Enter a number" class="form-control input-md">

                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <select id="from" name="from" class="form-control">
                                </select>
                            </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <select id="to" name="to" class="form-control">
                                </select>
                            </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="out" name="out" type="text" placeholder="" class="form-control input-md" disabled>

                            </div>
                        </div>

                        <!-- Button (Double) -->
                        <div class="form-group">
                            <div class="col-md-12">
                                <button id="convert" name="convert" class="btn btn-success">Convert</button>
                                <button id="clear" name="clear" class="btn btn-danger">Clear</button>
                            </div>
                        </div>

                    </fieldset>
                </form>
            </div>
        </div>
    </div>

	<script src="<?php echo $plug_fl; ?>js/jquery.min.js"></script>
    <script src="<?php echo $plug_fl; ?>js/unit_converter.js"></script>
    <script src="<?php echo $plug_fl; ?>js/common.js"></script>
