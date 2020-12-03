<?php
if (isset($visitante)) {

    $id_visitante = $visitante[0]->ID_VISITANTE;
    $nomb_visitante = $visitante[0]->NOMB_VISITANTE;
    $correo = $visitante[0]->CORREO_VISITANTE;
    $telefono = $visitante[0]->TELEF_VISITANTE;

    $id_inmueble = $visitante[0]->ID_INMUEBLE;
    $nom_inmueble = $visitante[0]->NOMB_INMUEBLE;
    $piso = $visitante[0]->PISO;
    $direccion = $visitante[0]->direccion_inmueble;
    $num_direccion = $visitante[0]->NRO_DIRECCION;
    $num_habitacion = $visitante[0]->NRO_HABITACIONES;
    $num_baños = $visitante[0]->NRO_BAÑOS;
    $metros = $visitante[0]->METROS_CUADRADOS;
    $precio = $visitante[0]->PRECIO_MES;
    $descrip = $visitante[0]->DESCRIP_INMUEBLE;
    $servicios = $visitante[0]->SERVICIOS_INMUEBLE;

    $ubidist = $visitante[0]->NOMB_DISTRITO;
    $ubiprov = $visitante[0]->NOMB_PROVINCIA;
    $ubidept = $visitante[0]->NOMB_DEPARTAMENTO;

    $ape_visitante = '';
    $nro_documento = '';
    $sexo = '';
    $direccionper = '';
    $id_tipodocumento = '';
    $nomb_usu = '';
    $pass_usu = '';
    $edit = 0;
    $id_per = '';
} else {

    $id_visitante = $arrendatario[0]->ID_VISITANTE;
    $nomb_visitante = $arrendatario[0]->NOMB_PERSONA;
    $correo = $arrendatario[0]->EMAIL;
    $telefono = $arrendatario[0]->CELULAR;



    $id_inmueble = $arrendatario[0]->ID_INMUEBLE;
    $nom_inmueble = $arrendatario[0]->NOMB_INMUEBLE;
    $piso = $arrendatario[0]->PISO;
    $direccion = $arrendatario[0]->direccion_inmueble;
    $num_direccion = $arrendatario[0]->NRO_DIRECCION;
    $num_habitacion = $arrendatario[0]->NRO_HABITACIONES;
    $num_baños = $arrendatario[0]->NRO_BAÑOS;
    $metros = $arrendatario[0]->METROS_CUADRADOS;
    $precio = $arrendatario[0]->PRECIO_MES;
    $descrip = $arrendatario[0]->DESCRIP_INMUEBLE;
    $servicios = $arrendatario[0]->SERVICIOS_INMUEBLE;

    $ubidist = $arrendatario[0]->NOMB_DISTRITO;
    $ubiprov = $arrendatario[0]->NOMB_PROVINCIA;
    $ubidept = $arrendatario[0]->NOMB_DEPARTAMENTO;

    $ape_visitante = $arrendatario[0]->APE_PERSONA;
    $nro_documento = $arrendatario[0]->NRO_DOCUMENTO;
    $sexo = $arrendatario[0]->SEXO;
    $direccionper = $arrendatario[0]->direccion_persona;
    $id_tipodocumento = $arrendatario[0]->ID_TIPODOCUMENTO;
    $nomb_usu = $arrendatario[0]->NOMB_USUARIO;
    $pass_usu = $arrendatario[0]->PASS_USUARIO;
    $edit = 1;
    $id_per = $arrendatario[0]->ID_PERSONA;
    /* $id_visitante = '';
    $nomb_visitante = '';
    $correo = '';
    $telefono = '';

    $id_inmueble = '';
    $nom_inmueble = '';
    $piso = '';
    $direccion = '';
    $num_direccion = '';
    $num_habitacion = '';
    $num_baños = '';
    $metros = '';
    $precio = '';
    $descrip = '';
    $servicios = '';
    $ubidist = '';
    $ubiprov = '';
    $ubidept = ''; */
}

?>
<!-- Page content -->
<div id="page-content">
    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="active">
                <a href="registrar-fotos"><i class="fa fa-user"></i> Personas Interesadas</a>
            </li>
            <li>
                <a href="listar-fotos"><i class="fa fa-users"></i> Registrar Usuario</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <!-- Meta Data Block -->
            <div class="block">
                <!-- Meta Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-google"></i> <strong>Registrar Persona Interesada</strong>
                    </h2>
                </div>
                <!-- END Meta Data Title -->

                <!-- Meta Data Content -->
                <form action="grabar_arrendatario" method="POST">

                    <input type="hidden" id="txtidvisitante" name="txtidvisitante" value="<?= $id_visitante ?>">
                    <input type="hidden" id="txtidinmueble" name="txtidinmueble" value="<?= $id_inmueble ?>">
                    <input type="hidden" id="txtedit" name="txtedit" value="<?= $edit ?>">
                    <input type="hidden" id="txtidpersona" name="txtidpersona" value="<?= $id_per ?>">

                    <div class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombres</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtnombre" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,48}" class="form-control" value=" <?= $nomb_visitante ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Apellidos</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtapellido" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,48}" class="form-control" value=" <?= $ape_visitante ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Tipo de documento</label>
                            <div class="col-md-8">
                                <select id="product-category" name="cbotipo_documento" class="select-chosen" style="width: 250px;" data-placeholder="Seleccionar Condición..">
                                    <?php foreach ($info as $u) { ?>
                                        <option value="<?= $u->ID_TIPODOCUMENTO ?>" <?= ($u->ID_TIPODOCUMENTO == $id_tipodocumento ? 'selected' : '') ?>><?= $u->NOMB_TIPODOCUMENTO ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Numero de Documento</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtdni" required pattern="[0-9]{8,12}" class="form-control" value=" <?= $nro_documento ?>">
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
                                <input type="text" id="product-name" name="txtcel" required pattern="[0-9]{9,11}" class="form-control" value="<?= $telefono ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Direccion</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtdireccion" required pattern="[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,48}" class="form-control" value="<?= $direccionper ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Email</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtemail" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required class="form-control" value="<?= $correo ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombre de Usuario</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" name="txtusu" class="form-control" pattern="^([a-z]+[0-9]{0,2}){5,12}$" required placeholder="Ingresar Nombre de usuario" value="<?= $nomb_usu ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Contraseña</label>
                            <div class="col-md-9">
                                <input type="text" id="product-name" pattern="[A-Za-z0-9]{8,12}" required name="txtpass" class="form-control" value="<?= $pass_usu ?>">
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
        <div class="col-lg-6">
            <!-- Meta Data Block -->
            <div class="block">
                <!-- Meta Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-google"></i> <strong>Departamento Seleccionado</strong>
                    </h2>
                </div>
                <!-- END Meta Data Title -->

                <!-- Meta Data Content -->
                <form action="grabar_arrendatario" method="POST">

                    <div class="form-horizontal form-bordered">

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-name">Nombre Departamento: </label>
                            <div class="col-md-9">
                                <input type="text" id="txtnomb_inmueble" name="txtnomb_inmueble" required class="form-control" placeholder="Ingresar nombre.." value="<?= $nom_inmueble ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-short">Numero de pisos: </label>
                            <div class="col-md-9">
                                <input type="text" id="txtpisos" name="txtnumpisos" required class="form-control" placeholder="Ingresar numero.." value="<?= $piso ?>" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-short-name">Direccion: </label>
                            <div class="col-md-9">
                                <textarea id="Direccion" name="txtdireccion" required class="form-control" placeholder="Escriba Direccion.." rows="3" disabled><?= $direccion ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-price">Numero de Direccion: </label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" id="txtnumdirec" name="txtnumdirec" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $num_direccion ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-price">Numero de Habitaciones: </label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" id="txtnumhab" name="txtnumhab" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $num_habitacion ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-price">Numero de Baños: </label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" id="txtnumbañ" name="txtnumbañ" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $num_baños ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-price">Metros Cuadrados: </label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" id="txtmetros" name="txtmetros" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $metros ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-price">Precio por Mes: </label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" id="txtprecio" name="txtprecio" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $precio ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-short-name">Descripcion del Departamento: </label>
                            <div class="col-md-9">
                                <textarea id="Descripcion" name="txtdescripcion" required class="form-control" placeholder="Escriba Direccion.." rows="7" disabled> <?= $descrip ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-price">Distrito: </label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" id="txtprecio" name="txtprecio" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $ubidist ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-price">Provincia: </label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" id="txtprecio" name="txtprecio" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $ubiprov ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-price">Departamento: </label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <input type="text" id="txtprecio" name="txtprecio" required class="form-control" placeholder="Ingresar Cantidad" value="<?= $ubidept ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="product-short-name">Servicios del Departamento: </label>
                            <div class="col-md-9">
                                <textarea id="txtservicios" name="txtservicios" required class="form-control" placeholder="Escriba descripcion.." rows="3" disabled><?= $servicios ?></textarea>
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