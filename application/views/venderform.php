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

            <?php echo form_open_multipart('Productos/listaxlsx');?>
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
              <div class="card-header">

  <?php echo form_open_multipart('usuarios/venderbd'); ?>

      <!-- inicio agrupado todo formulario -->

<div class="item form-group has-feedback" style="background-color:#ffffff;" style="color:whitesmoke;" style="text-align:center" align="right">
    <font color="white"> <br>

        <div class="col-md-12" align="center">
            <font color="000000">
              <h1></i>Formulario de venta</h1>
            </font> 
        </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label  label-align" for="FECHA">FECHA:</label>
        </div>

        <div class="col-md-5">
            <input type="date" name="Fecha" placeholder="Ingrese fecha" class="form-control has-feedback-left" required> <br>
        </div> 
    </div>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="TOTAL">TOTAL:</label>
        </div>

        <div class="col-md-5">
            <input type="double" name="Total" placeholder="Ingrese total" class="form-control has-feedback-left">
        </div> 
    </div> <br>


    <!------------ begin --------------->
    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="CLIENTE">CLIENTE:</label>
        </div>

      <div class="col-md-5">
        <select name="idCliente" class="form-control">
            <option>Seleccione un cliente</option>
          <?php
          foreach ($infoclientes->result() as $row)
          {
          ?>
            <option value="<?php echo $row->idCliente; ?>"><?php echo $row->ci; ?></option>
          <?php
          }
          ?>
         </select>
      </div> 
    </div><br>

    <div class="row">
        <div class="col-md-4">
          <label class="col-form-label label-align" for="USUARIO">USUARIO:</label>
        </div>

      <div class="col-md-5">
        <select name="idUsuario" class="form-control">
            <option>Seleccione usuario</option>   
          <?php
          foreach ($infousuarios->result() as $urow)
          {
          ?>
            <option value="<?php echo $urow->idEmpleado; ?>"><?php echo $urow->nombre; ?></option>
          <?php
          }
          ?>
        </select>
      </div> 

      <div class="col-md-5">
        <select name="idProducto" class="form-control">
            <option>Seleccione Producto</option>   
          <?php
          foreach ($infousuarios->result() as $urow)
          {
          ?>
            <option value="<?php echo $urow->idProducto; ?>"><?php echo $urow->nombre; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
    </div><br> <!------------ fin --------------->

  </font>
    <div class="col-md-12" align="center" style="background-color:#fa7a50;">
        <button type="submit" class="btn btn-outline-success">AGREGAR NUEVA VENTA</button>
        <?php echo form_close(); ?>
    </div> <br>
</div><!------------ fin --------------->

          </div>
        </div>
      </div>
    </div>
  </div>
</div>