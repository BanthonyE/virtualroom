<?php
if (isset($info)) {

    $id_anuncio = $info[0]->ID_ANUNCIO;
    $id_arrendador = $info[0]->ID_ARRENDADOR;
    $titulo_anuncio = $info[0]->TITULO_ANUNCIO;
    $descrip = $info[0]->DESCRIP_ANUNCIO;
    $fecha = $info[0]->FECHA_ANUNCIO;
    $estado = $info[0]->ESTADO_ANUNCIO;
    $id_inmueble = $info[0]->ID_INMUEBLE;
    $nom_inmueble = $info[0]->NOMB_INMUEBLE;
} else {
    $id_anuncio = '';
    $id_arrendador = '';
    $titulo_anuncio = '';
    $descrip = '';
    $fecha = '';
    $estado = '';
    $id_inmueble = '';
    $nom_inmueble = '';
}

?>
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
        <li><a href="">Registro de publicación</a></li>
    </ul>
    <div class="row">
        <div class="col-lg-6">
            <!-- Meta Data Block -->
            <div class="block">
                <!-- Meta Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-google"></i> <strong>Registrar Anuncio</strong>
                    </h2>
                </div>
                <!-- END Meta Data Title -->

                <!-- Meta Data Content -->
                <form action="grabar_anuncio" method="POST">
                    <div class="form-horizontal form-bordered">
                        <div class="form-group">
                            <input type="hidden" id="id_usuario" name="txtusuario" value="<?= $codigo_usuario ?>">
                            <input type="hidden" id="txtidanuncio" name="txtidanuncio" value="<?= $id_anuncio ?>">
                            <label class="col-md-3 control-label" for="product-name">Departamento: </label>
                            <div class="col-md-8">
                                <?php if ($id_anuncio != NULL) { ?>

                                    <div class="input-group">
                                        <input type="hidden" id="cboinmueble" name="cboinmueble" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $id_inmueble ?>">
                                        <input type="text" id="txtnombredepa" name="nombredepa" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $nom_inmueble ?>" disabled>
                                    </div>
                                <?php } else { ?>
                                    <select id="cboinmueble" name="cboinmueble" class="select-chosen" data-placeholder="Seleccionar Categoría.." style="width: 250px;">
                                        <option></option>
                                        <?php foreach ($inmueble as $u) : ?>

                                            <option value="<?= $u->ID_INMUEBLE ?>"><?= $u->NOMB_INMUEBLE ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php } ?>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-short-name">Título del anuncio: </label>
                            <div class="col-md-9">
                                <input type="text" id="txttitulo" name="txttitulo" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,60}" class="form-control" placeholder="minimo 2 caracteres" value="<?= $titulo_anuncio ?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-short-name">Descripcion: </label>
                            <div class="col-md-9">
                                <textarea id="txtdescripcion" name="txtdescripcion" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,60}" class="form-control" placeholder="minimo 2 caracteres" rows="3"><?= $descrip ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="txtfecha">Fecha:</label>
                            <div class="col-md-9">
                                <?php if ($fecha != NULL) { ?>
                                    <input type="text" class="form-control text-center" name="txtfecha" id="txtfecha" readonly value="<?= $fecha ?>" />

                                <?php } else { ?>
                                    <input type="text" class="form-control text-center" name="txtfecha" id="txtfecha" readonly value="<?= date("Y-m-d H:i:s") ?>" />
                                <?php } ?>
                            </div>
                        </div>

                        <?php if ($estado != NULL) { ?>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="txtestado">ESTADO:</label>
                                <div class="col-md-9">
                                    <select id="txtestado" name="txtestado" class="select-chosen" data-placeholder="Seleccionar Estado.." style="width: 250px;">
                                        <?php if ($estado == 1) { ?>
                                            <option value="<?= $estado ?>">ACTIVO</option>
                                            <option value="0">DESACTIVADO</option>
                                        <?php } else { ?>
                                            <option value="$estado">DESACTIVO</option>
                                            <option value="1">ACTIVADO</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        <?php } else { ?>
                            <input type="hidden" id="txtestado" name="txtestado" value="1">
                        <?php } ?>





                        <div class="form-group form-actions">
                            <div class="col-md-9 col-md-offset-3">
                                <button type="submit" onclick="return confirm('¿Estas seguro de que estan correctos los datos?')" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Meta Data Content -->
            </div>
            <!-- END Meta Data Block -->
        </div>

        <div id="vista_dep" name="vista_dep"></div>

    </div>
    <!-- END Product Edit Content -->
</div>
<!-- END Page Content -->