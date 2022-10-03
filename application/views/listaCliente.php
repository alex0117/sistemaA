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
            <a class="navbar-brand" href="#1"><h3>Lista de clientes</h3></a>

            <?php echo form_open_multipart('cliente/listaxlsx');?>
                <button type="submit"  name="btn2" class="btn btn-success">Ver lista de cliente XLSX</button>
                <?php echo form_close();?><br>

                <?php echo form_open_multipart('cliente/deshabilitados');?>
                <button type="submit" class="btn btn-warning">Ver Cliente deshabilitado</button>
                <?php echo form_close();?><br>

                <?php echo form_open_multipart('cliente/agregar');?>
                <button type="submit" class="btn btn-primary">Agregar Cliente</button>
                <?php echo form_close();?>

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
              <div class="card-header">

                <table class="table">
                        <thead >
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido paterno</th>
                                <th scope="col">Apellido materno</th>
                                <th scope="col">Ci</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Creado</th>
                                <th scope="col">Actualizado</th>
                                <th scope="col">Modificar</th>
                                <th scope="col">Eliminar</th>
                                <th scope="col">Deshabilitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $indice=1;
                                foreach ($clientes->result() as $row) 
                                {
                                    ?> 
                                    <tr>
                                        <th scope="row"><?php echo $indice;?></th>
                                            <td><?php echo $row->nombre;?></td>
                                            <td><?php echo $row->apellidoPaterno;?></td>
                                            <td><?php echo $row->apellidoMaterno;?></td>
                                            <td><?php echo $row->ci;?></td>
                                            <td><?php echo $row->telefono;?></td>
                                            <td><?php echo formatearFecha($row->fechaRegistro);?></td>
                                            <td><?php echo formatearFecha($row->fechaActualizacion);?></td>
                                            <td>   
                                            <?php echo form_open_multipart('cliente/modificar');?>
                                            <input type="hidden" name="idCliente" value="<?php echo $row->idCliente;?>">
                                            <input type="submit" name="buttony" value="Modificar" class="btn btn-success"></input>
                                            <?php echo form_close();?>
                                            </td>    
                                            <td>   
                                            <?php echo form_open_multipart('cliente/eliminarbd');?>
                                            <input type="hidden" name="idCliente" value="<?php echo $row->idCliente;?>">
                                            <input type="submit" name="buttonx" value="Eliminar" class="btn btn-danger"></input>
                                            <?php echo form_close();?>
                                            </td>
                                            <td>   
                                            <?php echo form_open_multipart('cliente/deshabilitarbd');?>
                                            <input type="hidden" name="idCliente" value="<?php echo $row->idCliente;?>">
                                            <input type="submit" name="buttonz" value="Deshabilitar" class="btn btn-warning"></input>
                                            <?php echo form_close();?>
                                            </td>              
                                   </tr>
                                    <?php
                                $indice++;
                                }
                            ?>
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
