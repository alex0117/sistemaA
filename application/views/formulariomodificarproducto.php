<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Modificar Empleado</h5>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">

                            <?php
                            foreach ($infoproducto->result() as $row) 
                            {
                                echo form_open_multipart('Productos/modificarbd');
                                ?>
                                    <input type="hidden" name="idProducto" class="form-control p-0 border-0"     placeholder="Ingrese la id"      value="<?php echo $row->idProducto; ?>"><br>
                                    <br><input type="text" name="codigo" class="form-control p-0 border-0"      placeholder="Ingrese el codigo"       value="<?php echo $row->codigo; ?>"><br>
                                    <br><input type="text" name="nombre" class="form-control p-0 border-0"         placeholder="Ingrese el nombre" value="<?php echo $row->nombre; ?>"><br>
                                    <br><input type="text" name="descripcion" class="form-control p-0 border-0"        placeholder="Ingrese la descripcion"value="<?php echo $row->descripcion; ?>"><br>
                                    <br><input type="text" name="saldo" class="form-control p-0 border-0"         placeholder="Ingrese el saldo"      value="<?php echo $row->saldo; ?>"><br>
                                    <br><input type="file" name="userfile"><br>
                                    <br><button type="submit" class=" btn btn-success">Aplicar cambios</button>
                                <?php 
                                echo form_close();
                                
                            }
                            ?>
                        </div>
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>


