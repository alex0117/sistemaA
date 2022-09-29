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
                            foreach ($infoempleado->result() as $row) 
                            {
                            echo form_open_multipart('Empleados/modificarbd');
                            ?>
                            <input type="hidden" name="idEmpleado" class="form-control" placeholder="Ingrese su id" value="<?php echo $row->idEmpleado; ?>"><br>
                            <br><input type="text" name="nombre" class="form-control" placeholder="Ingrese su nombre" value="<?php echo $row->nombre; ?>"><br>
                            <br><input type="text" name="apellidoPaterno" class="form-control" placeholder="Ingrese su apellido paterno" value="<?php echo $row->apellidoPaterno; ?>"><br>
                            <br><input type="text" name="apellidoMaterno" class="form-control" placeholder="Ingrese su apellido materno" value="<?php echo $row->apellidoMaterno; ?>"><br>
                            <br><input type="text" name="ci" class="form-control" placeholder="Ingrese su ci" value="<?php echo $row->ci; ?>"><br>
                            <br><input type="text" name="telefono" class="form-control" placeholder="Ingrese su telefono" value="<?php echo $row->telefono; ?>"><br>
                            <br><input type="text" name="tipo" class="form-control" placeholder="Ingrese su tipo de acceso" value="<?php echo $row->tipo; ?>"><br>
                            <br><input type="text" name="login" class="form-control" placeholder="Ingrese su login" value="<?php echo $row->login; ?>"><br>
                            <br><input type="password" name="password" class="form-control" placeholder="Ingrese su password" value="<?php echo ($row->password); ?>"><br>
                            <br><input type="file" name="userfile" class="form-control" placeholder="agreguar imagen" ><br>
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

