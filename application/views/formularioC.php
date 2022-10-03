<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Agregar Cliente</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">

                                        <?php echo form_open_multipart('Cliente/agregarbd');?>
                                            <input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" size="30"><br>
                                        <br><input type="text" name="apellidoPaterno" class="form-control" placeholder="Ingrese su apellido paterno" ><br>
                                        <br><input type="text" name="apellidoMaterno" class="form-control" placeholder="Ingrese su apellido materno" size="50"><br>
                                        <br><input type="text" name="ci" class="form-control" placeholder="Ingrese su ci" minlength="7" maxlength="24"><br>
                                        <br><input type="text" name="telefono" class="form-control" placeholder="Ingrese su telefono" minlength="8" maxlength="20"><br>
                                        <br><button type="submit" class=" btn btn-primary">Agregar Cliente</button>

                                        <?php form_close();?>
                                        </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>


