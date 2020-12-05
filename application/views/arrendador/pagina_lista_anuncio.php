<!-- Page content -->
<div id="page-content">
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="<?php if ($this->uri->segment(1) == 'registrar_pub') { ?> active <?php } ?>">
                <a href="registrar_pub"><i class="fas fa-edit"></i> Registrar Anuncio</a>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'ver_pub') { ?> active <?php } else { ?> <?php } ?>">
                <a href="ver_pub"><i class="fas fa-clipboard-list"></i> Lista de Anuncios</a>
            </li>
        </ul>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Publicaciones</li>
        <li><a href="">Listado de publicacines</a></li>
    </ul>
    <div class="block full">
        <div class="block-title">
            <h2><strong>Lista</strong> de Publicaciones</h2>
        </div>
        <div class="table-responsive">
            <form action="accion" method="POST">
                <table id="tabla" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Código</th>
                            <th class="text-center">Tíulo</th>
                            <th class="text-center">Descripción </th>
                            <th class="text-center">Fecha Creada</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center">Nombre del Inmueble</th>
                            <th class="text-center">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($publicacion as $pub) : ?>
                            <tr>
                                <td class="text-center"><?= $pub->ID_ANUNCIO ?></td>
                                <td class="text-center"><?= $pub->NOMB_ANUNCIO ?></td>
                                <td class="text-center"><?= $pub->DESCRIP_ANUNCIO ?></td>
                                <td class="text-center"><?= $pub->FECHA_ANUNCIO ?></td>
                                <?php if ($pub->ESTADO_ANUNCIO == 1) { ?>
                                    <td class="text-center">ACTIVO</td>
                                <?php } else { ?>
                                    <td class="text-center">DESACTIVADO</td>
                                <?php } ?>
                                <td class="text-center"><?= $pub->NOMB_INMUEBLE ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a data-toggle="tooltip" id="btnEditar" name="btnEditar" title="Editar" class="btn btn-xs btn-default" href="modificar_anuncio?id=<?= $pub->ID_ANUNCIO ?>"><i class="fas fa-edit"></i></a>
                                        <a data-toggle="tooltip" onclick="return confirm('¿Estas seguro de Eliminar este anuncio?')" id="btnEliminar" name="btnEliminar" title="Eliminar" class="btn btn-xs btn-danger" href="eliminar_anuncio?id=<?= $pub->ID_ANUNCIO ?>"><i class="fas fa-trash-alt"></i></a>
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