                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Datatables Header -->
                        <div class="content-header">
                            <div class="header-section">
                                <h1>
                                    <i class="fa fa-table"></i>Almacén<br><small>...</small>
                                </h1>
                            </div>
                        </div>
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Almacén</li>
                            <li><a href="">Lista de productos</a></li>
                        </ul>
                        <!-- END Datatables Header -->

                        <!-- Datatables Content -->
                        
                        <div class="block full">
                            <div class="block-title">
                                <h2><strong>Lista</strong> de Productos</h2>
                            </div>
                            <div class="table-responsive">
                                <form action="accion" method="POST">
                                <table id="tabla" class="table table-vcenter table-condensed table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Código</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Categoría</th>
                                            <th>Condición</th>
                                            <th>Stock</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($producto as $u):?>
                                        <tr>
                                            <td class="text-center"><?=$u->CODPROD ?></td> 
                                            <td class="text-center"><?=$u->NOMBRE?></td>
                                            <td class="text-center"><?=$u->DESCRIPCION?></td>
                                            
                                            <?php foreach($cat as $v):?>
                                            <?php if ($v->CODCAT==$u->CODCAT) { ?>
                                                <td class="text-center"><?= $v->NOMCAT ?></td>
                                            <?php break; } ?>
                                            <?php endforeach;?>
                                                
                                            <td class="text-center">

                                            <?php foreach($estadoprod as $e):?>
                                            <?php if ($e->CODESTADO==$u->CODESTADO) { ?>
                                                <?php if ($e->CODESTADO==2) { ?>
                                                    <span class="label label-warning"><?= $e->ESTADO ?></span>
                                                <?php }else if ($e->CODESTADO==3) { ?>
                                                    <span class="label label-danger"><?= $e->ESTADO ?></span>                                                    
                                                <?php }else{ ?>
                                                    <span class="label label-primary"><?= $e->ESTADO ?></span>
                                                <?php } ?>
                                            <?php break; } ?>
                                            <?php endforeach;?>



                                            </td>
                                            <td class="text-center"><?=$u->STOCK?></td>
                                            <td class="text-center">
                                            <div class="btn-group">
                                                <button data-toggle="tooltip" id="btnEstado" name="btnEstado" title="Activo / Inactivo" class="btn btn-xs btn-default" type="submit" value="<?= $u->CODPROD ?>"><i class="fa fa-bullseye"></i></button>
                                                <button data-toggle="tooltip" id="btnEditar" name="btnEditar" title="Editar" class="btn btn-xs btn-default" type="submit" value="<?= $u->CODPROD ?>"><i class="fas fa-edit"></i></button>
                                                <button data-toggle="tooltip" id="btnEliminar" name="btnEliminar" title="Eliminar" class="btn btn-xs btn-danger" type="submit" value="<?= $u->CODPROD ?>"><i class="fas fa-trash-alt"></i></button>

                                            </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                </form>
                            </div>
                        </div>
                        <!-- END Datatables Content -->
                    </div>
                    <!-- END Page Content -->