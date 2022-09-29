<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#1"><h3>Lista de Producto</h3></a>

            <?php

use LDAP\Result;

 echo form_open_multipart('Productos/listaxlsx');?>
                <button type="submit"  name="btn2" class="btn btn-success">Ver lista de Productos XLSX</button>
                <?php echo form_close();?><br>

                <?php echo form_open_multipart('Productos/deshabilitados');?>
                <button type="submit" class="btn btn-warning">Ver Productos deshabilitado</button>
                <?php echo form_close();?><br>

                <?php echo form_open_multipart('Productos/agregar');?>
                <button type="submit" class="btn btn-primary">Agregar Producto</button>
                <?php echo form_close();?><br>
            </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">

            <div class="col-md-12">
              <div class="card-header">
                  <div class="col-md-6">
                              <h2>Cliente</h2>
                              <select class="form-control" name="" id="hola">

                              <?php
                              
                              include 'conexion.php';
                              $consulta="SELECT * FROM cliente";
                              $ejecutar=mysqli_query($conexion,$consulta) or die (mysqli_error($conexion));


                              ?>
                              <?php foreach ($ejecutar as $opciones):?>
                                
                                <option value=<?php echo $opciones['nombre'] ?>><?php echo $opciones['nombre'] ?></option>

                              <?php endforeach ?>  

                                
                              </select>
                  </div>

<br>
<h2>Productos</h2>
                  <div class="col-md-6">

              <form action="" method="GET">
                <input type="text" id="query" name="query" class="form-control" maxlength="12"><br>
                <input type="submit" id="buscar" value="Buscar">
              </form>
              <br><br>
              <p>Producto : </p>
                            <?php
                              if ($result) {
                                foreach ($result -> result() as $row) {
                                  
                                  
                                  echo $row->nombre."</p> ";
                                  echo $row->codigo."</p> ";
                                  echo $row->descripcion."</p> ";

                                }
                                
                              }
                            ?>
                            
                         </div>

                   </div>
               </div>
                            

                <table class="table">
                        <thead >
                            <tr>
                            
                                <th scope="col">ci</th>
                                <th scope="col">nombre</th>
                                <th scope="col">apellido paterno</th>
                                <th scope="col">apellido materno</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
              
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->