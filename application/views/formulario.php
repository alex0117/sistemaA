<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Agregar Producto</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        
                      <?php echo form_open_multipart('productos/agregarbd');?>


                            <br><input type="text" name="codigo" class="form-control" placeholder="Ingrese el codigo"><br>
                            <br><input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre"><br>
                            <br><input type="text" name="descripcion" class="form-control" placeholder="Ingrese la descripcion"><br>
                            <br><input type="text" name="saldo" class="form-control" placeholder="Ingrese el saldo"><br>
                            <br><button type="submit" class=" btn btn-primary">Agregar Producto</button>

                            <?php form_close();?>   
                        </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>

