<?php
if (isset($usuario)) {
    $id_usuario = $usuario[0]->ID_USUARIO;
    $id_persona = $usuario[0]->ID_PERSONA;
    $nombre = $usuario[0]->NOMB_PERSONA;
    $apellido = $usuario[0]->APE_PERSONA;
    $nro_documento = $usuario[0]->NRO_DOCUMENTO;
    $id_tipodocumento = $usuario[0]->ID_TIPODOCUMENTO;
    $sexo = $usuario[0]->SEXO;
    $telefono = $usuario[0]->CELULAR;
    $direccionper = $usuario[0]->DIRECCION;
    $correo = $usuario[0]->EMAIL;
    $pass_usu = $usuario[0]->PASS_USUARIO;
    $nomb_usu = $usuario[0]->NOMB_USUARIO;
    $id_tipousuario = $usuario[0]->ID_TIPOUSUARIO;
} else {
    $id_usuario = '';
    $id_persona = '';
    $nombre = '';
    $apellido = '';
    $nro_documento = '';
    $id_tipodocumento = '';
    $sexo = '';
    $telefono = '';
    $direccionper = '';
    $correo = '';
    $pass_usu = '';
    $nomb_usu = '';
    $id_tipousuario = '';
}
$uri = $this->uri->segment(1);
?>

<!-- Page content -->
<div id="page-content">
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
        <li><a href="">Registrar Usuarios</a></li>
    </ul>
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8">
            <!-- Meta Data Block -->
            <div class="block">
                <!-- Meta Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-google"></i> <strong>Registrar Usuario</strong>
                    </h2>
                </div>
                <!-- END Meta Data Title -->

                <!-- Meta Data Content -->
                <form action="grabar_usuario" method="POST">
                    <input type="hidden" id="txtidusuario" name="txtidusuario" value="<?= $id_usuario ?>">
                    <input type="hidden" id="txtidpersona" name="txtidpersona" value="<?= $id_persona ?>">

                    <div class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tipo de Usuario</label>
                            <div class="col-md-8">
                                <select id="product-category" name="cbotipo_usuario" class="select-chosen" style="width: 250px;" data-placeholder="Seleccionar Condición..">
                                    <?php if ($id_tipousuario != null) { ?>
                                        <?php if ($id_tipousuario == 1) { ?>
                                            <option value="<?= $id_tipousuario ?>">Administrador</option>
                                            <option value="2">Arrendador</option>
                                        <?php } else { ?>
                                            <option value="<?= $id_tipousuario ?>">Arrendador</option>
                                            <option value="1">Administrador</option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option value="1">Administrador</option>
                                        <option value="2">Arrendador</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombre de Usuario</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtusu" class="form-control" placeholder="Ingresar Nombre de usuario" value="<?= $nomb_usu ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Contraseña</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtpass" class="form-control" value="<?= $pass_usu ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombres</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtnombre" class="form-control" value=" <?= $nombre ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Apellidos</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtapellido" class="form-control" value=" <?= $apellido ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tipo de documento</label>
                            <div class="col-md-8">
                                <select id="product-category" name="cbotipo_documento" class="select-chosen" style="width: 250px;" data-placeholder="Seleccionar Condición..">
                                    <?php foreach ($tipo_documento as $u) { ?>
                                        <option value="<?= $u->ID_TIPODOCUMENTO ?>" <?= ($u->ID_TIPODOCUMENTO == $id_tipodocumento ? 'selected' : '') ?>><?= $u->NOMB_TIPODOCUMENTO ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Numero de Documento</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtdni" class="form-control" value=" <?= $nro_documento ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Sexo</label>
                            <div class="col-md-8">
                                <select id="product-category" name="cbosexo" class="select-chosen" data-placeholder="Seleccionar Condición.." style="width: 250px;">
                                    <?php if ($sexo != null) { ?>
                                        <?php if ($sexo == 'Masculino') { ?>
                                            <option value="<?= $sexo ?>"><?= $sexo ?></option>
                                            <option value="Femenino">Femenino</option>
                                        <?php } else { ?>
                                            <option value="<?= $sexo ?>"><?= $sexo ?></option>
                                            <option value="Masculino">Masculino</option>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Celular</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtcel" class="form-control" value="<?= $telefono ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Direccion</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtdireccion" class="form-control" value="<?= $direccionper ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtemail" class="form-control" value="<?= $correo ?>">
                            </div>
                        </div>

                        <div class="form-group form-actions">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" onclick="return confirm('¿Estas seguro que los datos estan correctos?')" name="upload" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reiniciar</button>
                            </div>
                        </div>
                    </div>
                    <!-- END Meta Data Content -->
                </form>

                <!-- END Meta Data Content -->
            </div>
            <!-- END Meta Data Block -->
        </div>
        <div class="col-lg-2">
        </div>

        <div id="vista_dep" name="vista_dep"></div>

    </div>
    <!-- END Product Edit Content -->
</div>
<!-- END Page Content -->