<!-- Page content -->

<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-table"></i>Lista de Arrendatarios<br><small>...</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Personas Interesadas</li>
        <li><a href="">Lista Arrendatarios</a></li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->

    <div class="block full">
        <div class="block-title">
            <h2><strong>Lista</strong> Arrendatarios</h2>
        </div>
        <div class="table-responsive">
            <form method="POST">
                <table id="tabla" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Código</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Nro Documento</th>
                            <th>Sexo</th>
                            <th>Telef</th>
                            <th>Direccion</th>
                            <th>Email</th>
                            <th>Estado</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arrendatarios as $arre) : ?>
                            <tr>
                                <td class="text-center"><?= $arre->ID_VISITANTE ?></td>
                                <td class="text-center"><?= $arre->NOMB_PERSONA ?></td>
                                <td class="text-center"><?= $arre->APE_PERSONA ?></td>
                                <td class="text-center"><?= $arre->NRO_DOCUMENTO ?></td>
                                <td class="text-center"><?= $arre->SEXO ?></td>
                                <td class="text-center"><?= $arre->CELULAR ?></td>
                                <td class="text-center"><?= $arre->DIRECCION ?></td>
                                <td class="text-center"><?= $arre->EMAIL ?></td>
                                <?php if ($arre->ESTADO_USUARIO == 'HABILITADO') { ?>
                                    <td class="btn-class" align="center">
                                        <button type="button" data-estado="<?= $arre->ID_VISITANTE ?>" id="btnDesHab" title="DESHABILITAR" class="btn btn-md btn-danger btnDesHab"><i class="fas fa-check"></i> DESHABILITAR</button>
                                    </td>
                                <?php } else { ?>
                                    <td class="btn-class" align="center">
                                        <button type="button" data-estado="<?= $arre->ID_VISITANTE ?>" id="btnHab" title="HABILITAR" class="btn btn-md btn-success btnDesHab"><i class="fas fa-check"></i>HABILITAR</button>
                                    </td>
                                <?php } ?>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a id="btnRegistrar" name="btnEditar" title="Editar" class="btn btn-md btn-info" href="editar_arrendatario?id=<?= $arre->ID_VISITANTE  ?>"><i class="fas fa-edit"></i></a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a id="btnEliminar" name="btnEliminar" onclick="return confirm('¿Estas seguro de Eliminar?')" title="Eliminar" class="btn btn-md btn-danger" href="eliminar_arrendatario?id=<?= $arre->ID_VISITANTE ?>"><i class="fas fa-trash-alt"></i></a>
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
<script>
    $(document).ready(function() {

        $('.btnDesHab').on('click', function(e) {
            if ($(this).hasClass("btn-danger")) {

                $(this).removeClass('btn-danger');
                $(this).addClass('btn-success');
                $(this).html('<i class="fas fa-check"></i> HABILITAR');

                let codigo = $(this).data('estado');
                $.ajax({
                    type: 'POST',
                    url: "modificar_deshab",
                    data: {
                        codigo: codigo
                    },
                    success: function(data) {


                    }
                });
            } else {
                $(this).removeClass('btn-success');
                $(this).addClass('btn-danger');
                $(this).html('<i class="fas fa-check"></i> DESHABILITAR');

                let codigo = $(this).data('estado');
                $.ajax({
                    type: 'POST',
                    url: "modificar_hab",
                    data: {
                        codigo: codigo
                    },
                    success: function(data) {


                    }
                });
            }

        })
    })
</script>