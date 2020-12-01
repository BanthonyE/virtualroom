<?php
    $uri = $this->uri->segment(1);
?>

<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class=" <?php if (($uri == 'registrar_usu')) { ?> active <?php } ?>">
                <a href="registrar_usu"><i class="fa fa-user"></i> Registrar Usuario</a>
            </li>
            <li class=" <?php if (($uri == 'ver_usuarios')) { ?> active <?php } ?>">
                <a href="ver_usuarios"><i class="fa fa-users"></i> Ver Usuario</a>
            </li>
        </ul>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Usuarios</li>
        <li><a href="">Lista Usuarios</a></li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->

    <div class="block full">
        <div class="block-title">
            <h2><strong>Lista</strong> Usuarios</h2>
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
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Estado</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usu) : ?>
                            <tr>
                                <td class="text-center"><?= $usu->ID_USUARIO ?></td>
                                <td class="text-center"><?= $usu->NOMB_PERSONA ?></td>
                                <td class="text-center"><?= $usu->APE_PERSONA ?></td>
                                <td class="text-center"><?= $usu->NRO_DOCUMENTO ?></td>
                                <td class="text-center"><?= $usu->SEXO ?></td>
                                <td class="text-center"><?= $usu->CELULAR ?></td>
                                <td class="text-center"><?= $usu->DIRECCION ?></td>
                                <td class="text-center"><?= $usu->EMAIL ?></td>
                                <td class="text-center"><?= $usu->NOMB_USUARIO ?></td>
                                <td class="text-center"><?= $usu->PASS_USUARIO ?></td>
                                <?php if ($usu->ESTADO_USUARIO == 'HABILITADO') { ?>
                                    <td class="btn-class" align="center">
                                        <button type="button" data-estado="<?= $usu->ID_USUARIO ?>" id="btnDesHab" title="DESHABILITAR" class="btn btn-md btn-danger btnDesHab"><i class="fas fa-check"></i> DESHABILITAR</button>
                                    </td>
                                <?php } else { ?>
                                    <td class="btn-class" align="center">
                                        <button type="button" data-estado="<?= $usu->ID_USUARIO ?>" id="btnHab" title="HABILITAR" class="btn btn-md btn-success btnDesHab"><i class="fas fa-check"></i>HABILITAR</button>
                                    </td>
                                <?php } ?>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a id="btnRegistrar" name="btnEditar" title="Editar" class="btn btn-md btn-info" href="editar_usuario?id=<?= $usu->ID_USUARIO  ?>"><i class="fas fa-edit"></i></a>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a id="btnEliminar" name="btnEliminar" onclick="return confirm('¿Estas seguro de Eliminar?')" title="Eliminar" class="btn btn-md btn-danger" href="eliminar_usuario?id=<?= $usu->ID_USUARIO ?>"><i class="fas fa-trash-alt"></i></a>
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
                    url: "modificar_usu_deshab",
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
                    url: "modificar_usu_hab",
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