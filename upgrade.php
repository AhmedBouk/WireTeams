<?php

include('incs/header.dash.php');
include('incs/pdo.php');
include('methode/methode.serv.php');
include('methode/methode.analyse.php');
include('incs/functions.php');
?>


    <body class="">
<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
    <div class="logo-image-small">
        <img src="assets/img/logo.png">
    </div>

    <!--menu gauche pannel-->
<?php include('views/panel.view.php'); ?>
    <!--menu gauche pannel-->

    <!-- Navbar -->
<?php include('views/nav.view.php'); ?>
    <!-- End Navbar -->



    <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title table-success"> Protocols</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table class="table table-striped nc-tablet-2>


                                            <thead class="text-primary">
                                            <th>Protocol</th>
                                            <th>eth src</th>
                                            <th>eth dst</th>
                                            <th>Ip src</th>
                                            <th>Ip dst</th>
                                            </thead>

                                            <tbody>
                                            <?php
                                            $elementparpage = 50;
                                            $retourTotal=0;

                                            if (!empty($_GET['id'])) {
                                                foreach ($jsons as $json) {
                                                    $retourTotal = $retourTotal+1;
                                                    //Nous allons maintenant compter le nombre de pages.
                                                    if($retourTotal <= $elementparpage){
                                                        $nombreDePages=ceil($retourTotal/$elementparpage);

                                                        echo '<tr>';
                                                        echo '<td>'.$json['_source']['layers']['frame']['frame.protocols'].'</td>';
                                                        echo '<td>'.$json['_source']['layers']['eth']['eth.src'].'</td>';
                                                        echo '<td>'.$json['_source']['layers']['eth']['eth.dst'].'</td>';
                                                        echo '<td>'.$json['_source']['layers']['ip']['ip.src'].'</td>';
                                                        echo '<td>'.$json['_source']['layers']['ip']['ip.dst'].'</td>';
                                                        echo '</tr>';
                                                        $protocols = countprotocol($json,$protocols);
                                                    }
                                                }
                                            }
                                            echo $retourTotal;

                                            ?>

                                            </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title table-success">total frames</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <?php
                                    foreach ($protocols as $key => $value) {

                                        echo $key.' : '.$value.'<br/>';
                                    } ?>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title table-success">total frames</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <?php

                                foreach ($protocols as $key => $value) {

                                    echo $key.' : '.$value.'<br/>';
                                }
                                ?>
                                <!--Load the AJAX API-->
                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script type="text/javascript">

                                    // Load the Visualization API and the corechart package.
                                    google.charts.load('current', {'packages':['corechart']});

                                    // Set a callback to run when the Google Visualization API is loaded.
                                    google.charts.setOnLoadCallback(drawChart);

                                    // Callback that creates and populates a data table,
                                    // instantiates the pie chart, passes in the data and
                                    // draws it.
                                    function drawChart() {

                                        // Create the data table.
                                        var data = new google.visualization.DataTable();
                                        data.addColumn('string', 'Topping');
                                        data.addColumn('number', 'Slices');
                                        data.addRows([
                                            <?php foreach ($protocols as $key => $value){ echo "['" . $key . "'," . $value . "],";} ?>
                                            // ['Protocole', 30],
                                            // ['ip', 70]

                                        ]);

                                        // Set chart options
                                        var options = {'title':'Pourcentage des protocols',
                                            'width':800,
                                            'height':700,
                                            colors: ['#d62222', '#b28d8d', '#ec8f6e', '#71dd37', '#f6c7b6','#1ae0c6','#301c1c','#dbcc46','#0b1eed','#ca14e2'],

                                        };

                                        // Instantiate and draw our chart, passing in some options.
                                        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                                        chart.draw(data, options);

                                    }

                                </script>

                                <button class="btn active button info " type="button"  name="button" value="button">Graphic</button>

                                <!--Div that will hold the pie chart-->
                                <div id="chart_div"></div>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('incs/footer.dash.php'); ?>