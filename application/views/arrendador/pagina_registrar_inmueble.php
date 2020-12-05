<?php
if (isset($info)) {

    $id_inmueble = $info[0]->ID_INMUEBLE;
    $nombre = $info[0]->NOMB_INMUEBLE;
    $piso = $info[0]->PISO;
    $direccion = $info[0]->DIRECCION;
    $numdireccion = $info[0]->NRO_DIRECCION;
    $numhabitaciones = $info[0]->NRO_HABITACIONES;
    $numbaños = $info[0]->NRO_BAÑOS;
    $metrosc = $info[0]->METROS_CUADRADOS;
    $precio = $info[0]->PRECIO_MES;
    $descrip = $info[0]->DESCRIP_INMUEBLE;
    $servicios = $info[0]->SERVICIOS_INMUEBLE;
    $id_distrito = $info[0]->ID_DISTRITO;
    $id_provincia = $info[0]->ID_PROVINCIA;
    $distrito = $info[0]->NOMB_DISTRITO;
    $id_departamento = $info[0]->ID_DEPARTAMENTO;
} else {
    $id_inmueble = '';
    $nombre = '';
    $piso = '';
    $direccion = '';
    $numdireccion = '';
    $numhabitaciones = '';
    $numbaños = '';
    $metrosc = '';
    $precio = '';
    $id_provincia = '';
    $descrip = '';
    $servicios = '';
    $id_distrito = '';
    $distrito = '';
    $id_departamento = '';
}

?>
<!-- Page content -->
<div id="page-content">
    <!-- Datatables Header -->
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="<?php if ($this->uri->segment(1) == 'registrar_depart') { ?> active <?php } ?>">
                <a href="registrar_depart"><i class="fas fa-edit"></i> Registrar Departamento</a>
            </li>
            <li class="<?php if ($this->uri->segment(1) == 'ver_depart') { ?> active <?php } else { ?> <?php } ?>">
                <a href="ver_depart"><i class="fas fa-clipboard-list"></i> Lista de Departamento</a>
            </li>
        </ul>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Departamentos</li>
        <li><a href="">Registro de departamento</a></li>
    </ul>
    <!-- END Datatables Header -->

    <div id="page-content">
        <!-- eCommerce Product Edit Header -->

        <!-- END eCommerce Product Edit Header -->

        <!-- Product Edit Content -->
        <!-- Page content -->
        <div class="row">

            <div class="col-lg-12">
                <!-- Meta Data Block -->
                <div class="block">
                    <!-- Meta Data Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-google"></i> <strong>Registrar Departamento</strong></h2>
                    </div>
                    <!-- END Meta Data Title -->

                    <!-- Meta Data Content -->
                    <form action="grabar_departamento" method="POST">

                        <div class="form-horizontal form-bordered">

                            <div class="col-lg-6">
                                <input type="hidden" id="id_usuario" name="id_usuario" value="<?= $codigo_usuario ?>">
                                <input type="hidden" id="id_distrito" name="id_provincia" value="<?= $id_distrito ?>">
                                <input type="hidden" id="nom_distrito" name="nom_distrito" value="<?= $distrito ?>">
                                <input type="hidden" id="id_inmb" name="id_inmb" value="<?= $id_inmueble ?>">
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-name">Nombre Departamento: </label>
                                    <div class="col-md-9">
                                        <input type="text" id="txtnomb_inmueble" name="txtnomb_inmueble" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,-]{2,48}" class="form-control" placeholder="Ingrese minimo 2 caracteres.." value="<?= $nombre ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-short">Numero de pisos: </label>
                                    <div class="col-md-9">
                                        <input type="text" id="txtpisos" name="txtnumpisos" required pattern="[0-9]{1,2}" class="form-control" placeholder="maximo 2 digitos" value="<?= $piso ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-short-name">Direccion: </label>
                                    <div class="col-md-9">
                                        <textarea id="Direccion" name="txtdireccion" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" class="form-control" placeholder="Ingrese minimo 2 caracteres.." rows="3"><?= $direccion ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-price">Numero de Direccion: </label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="txtnumdirec" name="txtnumdirec" required pattern="[0-9]{1,4}" class="form-control" placeholder="maximo 4 digitos" value="<?= $numdireccion ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-price">Numero de Habitaciones: </label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="txtnumhab" name="txtnumhab" required pattern="[0-9]{1,2}" class="form-control" placeholder="maximo 2 digitos" value="<?= $numhabitaciones ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-price">Numero de Baños: </label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="txtnumbañ" name="txtnumbañ" required pattern="[0-9]{1,2}" class="form-control" placeholder="maximo 2 digitos" value="<?= $numbaños ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-price">Metros Cuadrados: </label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="txtmetros" name="txtmetros" required pattern="[0-9]{1,3}" class="form-control" placeholder="maximo 3 digitos" value="<?= $metrosc ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-price">Precio por Mes: </label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" id="txtprecio" name="txtprecio" required pattern="[0-9]{1,4}" class="form-control" placeholder="maximo 4 digitos" value="<?= $precio ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-short-name">Descripcion del Departamento: </label>
                                    <div class="col-md-9">
                                        <textarea id="Descripcion" name="txtdescripcion" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,200}" class="form-control" placeholder="Ingrese minimo 2 caracteres.." rows="7"> <?= $descrip ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-category">Departamento: </label>
                                    <div class="col-md-8">
                                        <select id="cbodepartamento" name="cbodepartamento" required title='cbotipo_foto' class="select-chosen" data-placeholder="Seleccionar Depat.." style="width: 250px;">
                                            <option selected="true" disabled="disabled"></option>


                                            <?php foreach ($departamento as $u) { ?>
                                                <option value="<?= $u->ID_DEPARTAMENTO ?>" <?= ($u->ID_DEPARTAMENTO == $id_departamento ? 'selected' : '') ?>><?= $u->NOMB_DEPARTAMENTO ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div style="display:none;" class="provincia">
                                        <label class="col-md-3 control-label" for="txtprovincia">Provincia:</label>

                                        <div class="col-md-8">
                                            <select name='txtprovincia' id='txtprovincia' class='form-control' required>
                                            </select>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="distrito">
                                        <label class="col-md-3 control-label" for="cboDistrito">Distrito:</label>
                                        <div class="col-md-8">
                                            <select name='cboDistrito' id='cboDistrito' class='form-control' required>

                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label" for="product-short-name">Servicios del Departamento: </label>
                                    <div class="col-md-9">
                                        <textarea id="txtservicios" name="txtservicios" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,60}" class="form-control" placeholder="Ingrese minimo 2 caracteres.." rows="3"><?= $servicios ?></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group form-actions">
                                <div class="col-md-6 col-md-offset-3">
                                    <button type="submit" onclick="return confirm('¿Seguro que los datos estan correctos?')" name="btnGuardar" id="btnRegistrarProducto" value="44" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
                                    <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reiniciar</button>
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
</div>