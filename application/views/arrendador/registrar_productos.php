 <div id="page-content">
 	<!-- eCommerce Product Edit Header -->

 	<!-- END eCommerce Product Edit Header -->

 	<!-- Product Edit Content -->
 	<!-- Page content -->
 	<div class="row">

 		<div class="col-lg-6">
 			<!-- Meta Data Block -->
 			<div class="block">
 				<!-- Meta Data Title -->
 				<div class="block-title">
 					<h2><i class="fa fa-google"></i> <strong>Registrar</strong> Productos</h2>
 				</div>
 				<!-- END Meta Data Title -->

 				<!-- Meta Data Content -->
 				<form action="registroProducto" method="POST">
 					<div class="form-horizontal form-bordered">

 						<div class="form-group">
 							<label class="col-md-3 control-label" for="product-name">Nombre</label>
 							<div class="col-md-9">
 								<input type="text" id="product-name" name="txtnombre" required
 									title='Nombre del Producto' class="form-control" placeholder="Ingresar nombre..">
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-md-3 control-label" for="product-short-description">Descripción</label>
 							<div class="col-md-9">
 								<textarea id="product-short-description" name="txtdescripcion" required
 									title='Descripción del Producto' class="form-control"
 									placeholder="Escriba descripción del producto.." rows="3"></textarea>
 							</div>
 						</div>
 						<div class="form-group">
 							<label class="col-md-3 control-label" for="product-category">Categoría</label>
 							<div class="col-md-8">
 								<select id="cbocat" name="cbocat" multiple required class="select-chosen"
 									data-placeholder="Seleccionar Categoría.." style="width: 250px;">
 									<option></option>
 									<?php foreach($cat as $u):?>
 									<option value="<?= $u->CODCAT ?>"><?= $u->NOMCAT ?></option>
 									<?php endforeach;?>
 								</select>
 							</div>

 						</div>
 						<div class="form-group">
 							<label class="col-md-3 control-label" for="product-price">Stock</label>
 							<div class="col-md-8">
 								<div class="input-group">
 									<input type="text" id="product-price" name="txtstock" required
 										title='Cantidad del Producto' class="form-control"
 										placeholder="Ingresar Cantidad">
 								</div>
 							</div>
 						</div>


 						<div class="form-group">
 							<label class="col-md-3 control-label" for="product-category">Condición</label>
 							<div class="col-md-8">
 								<select id="product-category" name="cbocondicion" required
 									title='Condición del Producto' class="select-chosen"
 									data-placeholder="Seleccionar Condición.." style="width: 250px;">
 									<option></option>
 									<option value="Inactivo">Inactivo</option>
 									<option value="Activo">Activo</option>
 								</select>
 							</div>
 						</div>

 						<div class="form-group form-actions">
 							<div class="col-md-9 col-md-offset-3">
 								<button type="submit" name="btnGuardar" id="btnRegistrarProducto" value="44"
 									class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
 								<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i>
 									Reiniciar</button>
 							</div>
 						</div>
 					</div>
 				</form>
 				<!-- END Meta Data Content -->
 			</div>
 			<!-- END Meta Data Block -->

 		</div>

 		<div class="col-lg-6">
 			<!-- Meta Data Block -->
 			<div class="block">
 				<!-- Meta Data Title -->
 				<div class="block-title">
 					<h2><i class="fa fa-google"></i> <strong>Registrar</strong> Categoria de productos</h2>
 				</div>
 				<!-- END Meta Data Title -->

 				<!-- Meta Data Content -->
 				<form action="registroCategoria" method="POST" name="formCategoria">
 					<div class="form-horizontal form-bordered">
 						<div class="form-group">
 							<center>
 								<strong>Nombre de la categoría del producto</strong>
 								<div class="col-md-12">
 									<input type="text" id="txtnomcat" name="txtnomcat" required
 										title='Nombre del la Categoría' class="form-control"
 										placeholder="Escriba la categoría..">
 								</div>
 							</center>

 						</div>
 						<div class="form-group">
 							<label class="col-md-3 control-label" for="product-meta-description">Descripción</label>
 							<div class="col-md-9">
 								<textarea id="txtdescat" name="txtdescat" required title='Descripción del la Categoría'
 									class="form-control" rows="6"
 									placeholder="Escriba descripción de la categoría.."></textarea>
 							</div>
 						</div>
 						<div class="form-group form-actions">
 							<div class="col-md-9 col-md-offset-3">
 								<button type="submit" id="btnRegistrarCategoriaProducto"
 									class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
 								<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i>
 									Reiniciar</button>
 							</div>
 						</div>
 					</div>
 				</form>
 				<!-- END Meta Data Content -->
 			</div>
 			<!-- END Meta Data Block -->
 		</div>
 	</div>
 	<!-- END Product Edit Content -->
 </div>
