<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-table"></i>Lista de Personas Interesadas<br><small>...</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Interesados</li>
        <li><a href="">Ver personas</a></li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->

    <div class="block full">
        <div class="block-title">
            <h2><strong>Lista</strong> Personas Interesadas</h2>
        </div>
        <div class="table-responsive">
            <form method="POST">
                <table id="tabla" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Código</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telef</th>
                            <th>Codigo Anuncio</th>
                            <th>Nombre Departamento</th>
                            <th>Descripcion</th>
                            <th>Fecha enviada</th>
                            <th>Estado</th>
                            <th class="text-center">Eliminar</th>
                            <th class="text-center">Registrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($visitantes as $vist) : ?>
                            <tr>
                                <td class="text-center"><?= $vist->ID_VISITANTE ?></td>
                                <td class="text-center"><?= $vist->NOMB_VISITANTE ?></td>
                                <td class="text-center"><?= $vist->CORREO_VISITANTE ?></td>
                                <td class="text-center"><?= $vist->TELEF_VISITANTE ?></td>
                                <td class="text-center"><?= $vist->ID_ANUNCIO ?></td>
                                <td class="text-center"><?= $vist->NOMB_INMUEBLE ?></td>
                                <td class="text-center"><?= $vist->DESCRIPCION ?></td>
                                <td class="text-center"><?= $vist->FECHA ?></td>
                                <?php if ($vist->ESTADO == 1) { ?>
                                    <td class="btn-class" align="center">
                                        <button type="button" data-estado="<?= $vist->ID_VISITANTE ?>" id="btnEditar" title="Revisado" class="btn btn-md btn-success btnEditar"><i class="fas fa-check"></i> Revisado</button>
                                    </td>
                                <?php } else { ?>
                                    <td class="btn-class" align="center">
                                        <button type="button" data-estado="<?= $vist->ID_VISITANTE ?>" id="btnEditar" title="No Revisado" class=" btn btn-md btn-danger btnEditar"><i class="fas fa-check"></i> No revisado</button>
                                    </td>
                                <?php } ?>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a id="btnEliminar" name="btnEliminar" onclick="return confirm('¿Estas seguro de Eliminar?')" title="Eliminar" class="btn btn-md btn-danger" href="eliminar_visitante?id=<?= $vist->ID_VISITANTE ?>"><i class="fas fa-trash-alt"></i></a>
                                    </div>

                                </td>
                                
                                <?php $cont=0; foreach ($arrendatarios as $a) {
                                    
                                    if($a->EMAIL == $vist->CORREO_VISITANTE){
                                        $cont++;
                                    }                               
                                } ?>

                                
                                <td class="text-center">
                                    <div class="btn-group">
                                        <?php if($cont == 0) { ?>
                                            <a id="btnRegistrar" name="btnRegistrar" title="Registrar" class="btn btn-md btn-info" href="registrar_arrendatario?id=<?= $vist->ID_VISITANTE ?>"><i class="fas fa-file-alt"></i></a>                                            
                                        <?php }else{ ?> 

                                        <?php } ?>    
                                    </div>
                                </td>                                      
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->