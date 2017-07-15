	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar nuevo empleado</h4>
		  </div>
		  <div class="modal-body">
			<form class="form-horizontal" method="post" id="guardar_empleado" name="guardar_empleado">
			<div id="resultados_ajax"></div>
			
			
			  <div class="form-group">
				<label for="nombres" class="col-sm-3 control-label">RUT</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="rut" name="rut" placeholder="RUT" pattern="[K0-9-]{10}" title="Ejemplo: 11111111-K"required>
				</div>
			  </div>
			  	<div class="form-group">
				<label for="nombres" class="col-sm-3 control-label">Nombres</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="apellidos" class="col-sm-3 control-label">Apellidos</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
				</div>
			  </div>
			  
			  <div class="form-group">
				<label for="telefono" class="col-sm-3 control-label">Telefono</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" pattern="[0-9]{9,10}" title="Telefono ( solo numeros, Max 10 caracteres)"required>
				</div>
			  </div> 
			  
			  	<div class="form-group">
				<label for="direccion" class="col-sm-3 control-label">Dirección</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
				</div>
			  </div>
			  
			  	<div class="form-group">
				<label for="cargo" class="col-sm-3 control-label">Cargo</label>
				<div class="col-sm-8">
				  <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo" required>
				</div>
			  </div>
			 
			 
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			<button type="submit" class="btn btn-primary" id="guardar_empleado">Guardar datos</button>
		  </div>
		  </form>
		</div>
	  </div>
	</div>
	<?php
		}
	?>