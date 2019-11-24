<?php

include('incs/header.dash.php');
include('incs/pdo.php');
include('methode/methode.serv.php');
include('methode/methode.analyse.php');
include('incs/functions.php');
?>

<?php
if(is_logged()){ ?>

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

<!--    ajout de server-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title table-success "> Add Server</h4>
                        </div>
                            <div class="card-body">
                                <form class="" action="dashboard.php" method="post">

                                        <div class="form-group">
                                                <label for="name">Name server</label>
                                                <span><?php if(!empty($errors['name'])) {echo $errors['name'];} ?></span>
                                                <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" type="text" class="form-control"  name="name" value="">
                                        </div>

                                         <div class="form-group">
                                                <label for="ip">IP Server</label>
                                                <span><?php if(!empty($errors['ip'])) {echo $errors['ip'];} ?></span>
                                                <input type="text" name="ip" class="form-control" value="">
                                        </div>

                                         <div class="form-group">
                                                <label for="mask">server network mask</label>
                                                <span><?php if(!empty($errors['mask'])) {echo $errors['mask'];} ?></span>
                                                <input type="text" name="mask" class="form-control" value="">
                                         </div>

                                         <div class="form-group">
                                                <label for="mac">Mac Address</label>
                                                <span><?php if(!empty($errors['mac'])) {echo $errors['mac'];} ?></span>
                                                <input type="text" name="mac" class="form-control" value="">
                                         </div>

                                            <input type="submit" name="submitted" class="btn active button info " value="Send">
                                 </form>


                            </div>
                        </div>
                    </div>
                </div>

<!--end ajout de server-->

<!--affiche de server-->
              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header">
                                <h4 class="card-title"> Servers </h4>
                          </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover" >
                                            <thead class=" text-primary">
                                                <tr class="table-success">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">IP Server</th>
                                                    <th scope="col">server network mask</th>
                                                    <th scope="col">Mac Address</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>

                                              <tbody>
                                                    <?php foreach ($servers as $server) { ?>
                                                        <tr>
                                                            <th scope="row"><?= $server['id']; ?></th>
                                                            <td><?= $server['name']; ?></td>
                                                            <td><?= $server['ip']; ?></td>
                                                            <td><?= $server['mask']; ?></td>
                                                            <td><?= $server['mac']; ?></td>
                                                            <td><a href="dashboard.php?id=<?= $server['id']; ?>" onclick="return confirm('Are you sure to delete this server ? ')">Delete</a></td>
                                                        </tr>
                                                    <?php } ?>
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<!--end affiche server-->



        <div class="row">

          <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header">

              </div>
              <div class="card-body">

              </div>
              <div class="card-footer">
                <div class="chart-legend">


<!--                  upload de fichier  -->

                    <?php require ('methode/methode.upload.php'); ?>

<!--                    end upload-->

                </div>
                <hr/>

              </div>
            </div>
          </div>
        </div>


        <?php include('incs/footer.dash.php'); }
else {
    header("Location: index.php");
}
?>