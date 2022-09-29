<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Agregar Empleado</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">

                                        <?php echo form_open_multipart('Empleados/agregarbd');?>
                                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" size="30"><br>
                                        <br><input type="text" name="apellidoPaterno" class="form-control" placeholder="Ingrese su apellido paterno" ><br>
                                        <br><input type="text" name="apellidoMaterno" class="form-control" placeholder="Ingrese su apellido materno" size="50"><br>
                                        <br><input type="text" name="ci" class="form-control" placeholder="Ingrese su ci" minlength="7" maxlength="24"><br>
                                        <br><input type="text" name="telefono" class="form-control" placeholder="Ingrese su telefono" minlength="8" maxlength="20"><br>
                                        <br><input type="text" name="tipo" class="form-control" placeholder="Ingrese el tipo de acceso" minlength="5" maxlength="20"><br>
                                        <br><input type="text" name="login" class="form-control" placeholder="Ingrese su login" minlength="5" maxlength="20"><br>
                                        <br><input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" minlength="8" maxlength="20">
                                        <br><button type="submit" class=" btn btn-primary">Agregar Empleado</button>

                                        <?php form_close();?>
                                        </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>


