<link rel="stylesheet" href="<?php base_url() ?>assets/css/css1/plugins.css">

<div class="block full">

    <div class="block-title">
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="descrip active"><a href="#pt-table-based">Descripción del anuncio</a></li>
            <li class="galeria"><a href="#pt-grid-based">Galería de fotos</a></li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane descrip active" id="pt-table-based">

            <div class="row">
                <div class="col-lg-6">
                    <div class="block">
                        <div class="block-title">
                            <h2><i class="fa fa-file-o"></i> Información del <strong>Departamento</strong></h2>
                        </div>
                        <table class="table table-borderless table-striped table-vcenter">
                            <tbody>
                                <tr>
                                    <td class="text-right" style="width: 50%;"><strong>Nombre del Departamento</strong></td>
                                    <td><?= $anuncio[0]->NOMB_INMUEBLE ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Descripción:</strong></td>
                                    <td><?= $anuncio[0]->DESCRIP_INMUEBLE ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Piso:</strong></td>
                                    <td><?= $anuncio[0]->PISO ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Dirección:</strong></td>
                                    <td><?= $anuncio[0]->DIRECCION ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Nro de Dirección:</strong></td>
                                    <td><?= $anuncio[0]->NRO_DIRECCION ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Nro de Habitaciones:</strong></td>
                                    <td><?= $anuncio[0]->NRO_HABITACIONES ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Nro de Baños:</strong></td>
                                    <td><?= $anuncio[0]->NRO_BAÑOS ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Metros Cuadrados:</strong></td>
                                    <td><?= $anuncio[0]->METROS_CUADRADOS ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Precio Mensual:</strong></td>
                                    <td>
                                        <a href="javascript:void(0)" class="label label-success"><?= $anuncio[0]->PRECIO_MES ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Servicios del Inmueble:</strong></td>
                                    <td><?= $anuncio[0]->SERVICIOS_INMUEBLE ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Ubicación:</strong></td>
                                    <td><?= $anuncio[0]->NOMB_DISTRITO ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="block">
                        <div class="block-title">
                            <h2><i class="fa fa-file-o"></i> <strong>Información del </strong>Anuncio</h2>
                        </div>

                        <table class="table table-borderless table-striped table-vcenter">
                            <tbody>
                                <tr>
                                    <td class="text-right" style="width: 50%;"><strong>Título del anuncio : </strong></td>
                                    <td><?= $anuncio[0]->TITULO_ANUNCIO ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Descripción del anuncio : </strong></td>
                                    <td><?= $anuncio[0]->DESCRIP_ANUNCIO ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Fecha del anuncio : </strong></td>
                                    <td><?= $anuncio[0]->FECHA_ANUNCIO ?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Estado del anuncio : </strong></td>
                                    <?php if ($anuncio[0]->ESTADO_ANUNCIO == 1) { ?>
                                        <td>Habilitado</td>
                                    <?php } else { ?>
                                        <td>Inhabilitado</td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane galeria" id="pt-grid-based">
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="block full">
                        <div class="block-title">
                            <h2><i class="fa fa-compass"></i> Navegación de <strong>Archivos</strong></h2>
                        </div>
                        <ul class="nav nav-pills nav-stacked nav-icons media-filter">
                            <li class="navfoto active">
                                <a href="javascript:void(0)" data-category="foto">
                                    <i class="fa fa-fw fa-picture-o text-success icon-push"></i> <strong>Fotos del
                                        anuncio</strong>
                                </a>
                            </li>
                            <li class="navportada">
                                <a href="javascript:void(0)" data-category="portada">
                                    <i class="far fa-star text-warning icon-push"></i> <strong>Portada de
                                        anuncio</strong>
                                </a>
                            </li>
                            <li class="navvirtual">
                                <a href="javascript:void(0)" data-category="virtual">
                                    <i class="fa fa-fw fa-film text-danger icon-push"></i> <strong>Imágenes
                                        360°</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="block full hidden-xs">
                        <div class="block-title">
                            <h2><i class="fa fa-cloud-upload"></i> Subir <strong>Imágenes</strong></h2>
                        </div>

                        <form enctype="multipart/form-data" action="registrar-foto-inmueble" id="formFoto" method="post">

                            <input type="hidden" name="id_inmueble" id="id_inmueble" value="">
                            <input type="hidden" name="id_anuncio" id="id_anuncio" value="">

                            <div class="form-horizontal form-bordered">

                                <div class="form-group">
                                    <label class="col-md-9 control-label" for="cbotipo_documento">Tipo de Imagen</label>
                                    <div class="col-md-12">
                                        <select class="select-chosen" id="cbotipo_imagen" name="cbotipo_imagen" title='tipo_foto' data-placeholder="Seleccionar Tipo de imagen.." style="width: 250px;" required>
                                            <option></option>
                                            <option value="1"> Clásica</option>
                                            <option value="2"> Vista 360°</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="clasica" style="display:none;">
                                    <div class="form-group">
                                        <label class="col-md-8 control-label" for="product-name">Ingresar Fotos: </label>
                                        <div class="col-md-12">
                                            <input type="file" required class="form-control" name="userFiles[]" multiple />
                                        </div>
                                    </div>
                                </div>
                                <div class="vista360" style="display:none;">
                                    <div class="form-group">
                                        <label class="col-md-8 control-label" for="product-name">Ingresar URL del Recorrido: </label>
                                        <div class="col-md-12">
                                            <input type="text" required class="form-control" name="txturl" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group contrato">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" id="subirFoto" onclick="return confirm('¿Estas seguro de Registrar?')" class="btn btn-sm btn-primary" name="fileSubmit"><i class="fa fa-floppy-o"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9">
                    <div class="block">
                        <div class="row media-filter-items">
                            <?php foreach ($fotos as $f) { ?>

                                <?php if ($f->TIPO_FOTO == 1) { ?>
                                    <div class="col-sm-6 col-lg-4 galeriafoto">
                                        <div class="media-items animation-fadeInQuickInv" data-category="foto" <?php if ($f->ESTADO_FOTO == 0) { ?> style="background-color: rgba(201, 76, 76, 0.3)" <?php } ?>>
                                            <div class="media-items-options text-left">
                                                <!-- <a href="<?php echo base_url('uploads/files/' . $f->NOMB_FOTO) ?>" class="btn btn-xs btn-success" data-toggle="lightbox-image"><i class="fa fa-search"></i></a> -->
                                                <button onclick="portada(<?= $f->ID_FOTO ?>);" class="btn btn-xs btn-warning"><i class="far fa-star"></i></button>
                                                <button onclick="eliminar_recorrido('<?= $f->ID_FOTO ?>');" class="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i></button>

                                                <button onclick="estadoImagen('<?= $f->ID_FOTO ?>','<?= $f->ESTADO_FOTO ?>');" class="btn btn-xs btn-success"><?php if ($f->ESTADO_FOTO == 1) { ?> <i class="fa fa-minus-circle"></i> <?php } else { ?> <i class="fa fa-plus-circle"></i> <?php } ?> </button>

                                            </div>
                                            <div class="media-items-content">
                                                <a href="<?php echo base_url('uploads/files/' . $f->NOMB_FOTO) ?>" data-toggle="lightbox-image">
                                                    <img src="<?php echo base_url('uploads/files/' . $f->NOMB_FOTO) ?>" alt="image" width="250px">
                                                </a>
                                            </div>
                                            <h4><?= $f->NOMB_FOTO ?></h4>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if ($f->TIPO_FOTO == 2) { ?>
                                    <div class="col-sm-6 col-lg-4 galeriavirtual" style="display:none;">
                                        <div class="media-items animation-fadeInQuickInv" data-category="virtual" <?php if ($f->ESTADO_FOTO == 0) { ?> style="background-color: rgba(201, 76, 76, 0.3)" <?php } ?>>
                                            <div class="media-items-options text-left">
                                                <button onclick="visualizar_recorrido('<?= $f->NOMB_FOTO ?>');" class="btn btn-xs btn-success"><i class="fa fa-search"></i></button>
                                                <button onclick="eliminar_recorrido('<?= $f->ID_FOTO ?>');" class="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i></button>

                                                <button onclick="estadoImagenVirtual('<?= $f->ID_FOTO ?>','<?= $f->ESTADO_FOTO ?>');" class="btn btn-xs btn-warning"><i class="far fa-star"></i></button>

                                            </div>
                                            <div class="media-items-content">
                                                <button onclick="visualizar_recorrido('<?= $f->NOMB_FOTO ?>');" style="border:none;background:none;"><i class="gi gi-camera fa-5x text-warning"></i></button>
                                            </div>
                                            <h4>Recorrido 360°</h4>
                                            <h5>Fecha : <?php echo date("Y-m-d", strtotime($f->CREADO_FOTO)); ?></h5>

                                        </div>
                                    </div>
                                <?php } ?>

                                <?php if ($anuncio[0]->PORTADA_ANUNCIO == $f->ID_FOTO) { ?>
                                    <div class="col-sm-6 col-lg-4  galeriaportada" style="display:none;">
                                        <div class="media-items animation-fadeInQuickInv" data-category="portada">
                                            <div class="media-items-options text-left">
                                                <a href="<?php echo base_url('uploads/files/' . $f->NOMB_FOTO) ?>" class="btn btn-xs btn-danger" data-toggle="lightbox-image"><i class="fa fa-search"></i></a>
                                            </div>
                                            <div class="media-items-content">
                                                <img src="<?php echo base_url('uploads/files/' . $f->NOMB_FOTO) ?>" alt="image" width="250px">
                                            </div>
                                            <h4><?= $f->NOMB_FOTO ?></h4>
                                        </div>
                                    </div>
                                <?php } ?>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?php base_url() ?>assets/js/js1/ap.js" type="text/javascript"></script>

<script src="<?php base_url() ?>assets/js/js1/pages/readyFiles.js"></script>
<script>
    $(function() {
        ReadyFiles.init();
    });

    $('#cbotipo_imagen').change(function() {

        let id_anuncio = $('#cboanuncio').val();
        let id_inmueble = $('#cboinmueble').val();

        $('#id_inmueble').val(id_inmueble);
        $('#id_anuncio').val(id_anuncio);

        let tipo_documento = $('#cbotipo_imagen').val();

        if (tipo_documento == "1") {
            $('.clasica').show();
            $('.vista360').hide();
        } else {
            $('.vista360').show();
            $('.clasica').hide();
        }
    });

    function portada($var) {
        let id_foto = $var;
        let id_anuncio = $('#cboanuncio').val();
        let id_inmueble = $('#cboinmueble').val();

        Swal.fire({
            title: '¿Está seguro establecer foto como portada?',
            text: "Las fotos de portada aparecerán imagen principal del anuncio.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'POST',
                    url: "foto_portada",
                    data: {
                        id_foto: id_foto,
                        id_anuncio: id_anuncio,
                        id_inmueble: id_inmueble
                    },
                    success: function(data) {
                        $('.vista').html(data);
                        $(".descrip").removeClass("active");
                        $(".galeria").addClass("active");
                    }
                });
            }
        });
    }

    $('#subirFoto').click(function() {
        var formData = new FormData($("#formFoto").get(0));
        $.ajax({
            type: 'POST',
            url: "registrar_imagenes",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                $('.vista').html(data);

                $(".descrip").removeClass("active");
                $(".galeria").addClass("active");
            }
        });
        return false;
    });

    function visualizar_recorrido($var) {
        var url = $var;

        var iframe = '<iframe src="' + url + '" width="600" height="600" frameborder="0"></iframe>';

        Swal.fire({
            title: 'Recorrido virtual ',
            html: iframe,
            width: 650,
            height: 700
        })
    }

    function estadoImagenVirtual($var1, $var2) {
        var id_imagen = $var1;
        var estado_imagen = $var2;

        let id_anuncio = $('#cboanuncio').val();
        let id_inmueble = $('#cboinmueble').val();

        if (estado_imagen == 1) {

            var titulo = '¿Está seguro desactivar la imagen?';
            var info = "Las imágenes desactivadas no se mostrarán en los anuncios";
        } else {
            var titulo = '¿Está seguro activar la imagen?';
            var info = "Las imágenes activadas se mostrarán en los anuncios";
        }
        Swal.fire({
            title: titulo,
            text: info,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "estadoImagenVirtual",
                    data: {
                        id_imagen: id_imagen,
                        id_anuncio: id_anuncio,
                        id_inmueble: id_inmueble,
                        estado_imagen: estado_imagen
                    },
                    success: function(data) {
                        $('.vista').html(data);

                        $(".descrip").removeClass("active");
                        $(".galeria").addClass("active");

                        $(".navportada").removeClass("active");
                        $(".navfoto").removeClass("active");
                        $(".navvirtual").addClass("active");
                        $(".galeriafoto").hide();
                        $(".galeriaportada").hide();
                        $(".galeriavirtual").show();
                    }
                });
            }
        });
    }








    function estadoImagen($var1, $var2) {
        var id_imagen = $var1;
        var estado_imagen = $var2;

        let id_anuncio = $('#cboanuncio').val();
        let id_inmueble = $('#cboinmueble').val();

        if (estado_imagen == 1) {
            var titulo = '¿Está seguro desactivar la imagen?';
            var info = "Las imágenes desactivadas no se mostrarán en los anuncios";
        } else {
            var titulo = '¿Está seguro activar la imagen?';
            var info = "Las imágenes activadas se mostrarán en los anuncios";
        }
        Swal.fire({
            title: titulo,
            text: info,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "estadoImagen",
                    data: {
                        id_imagen: id_imagen,
                        id_anuncio: id_anuncio,
                        id_inmueble: id_inmueble,
                        estado_imagen: estado_imagen
                    },
                    success: function(data) {
                        $('.vista').html(data);

                        $(".descrip").removeClass("active");
                        $(".galeria").addClass("active");
                    }
                });
            }
        });
    }

    function eliminar_recorrido($var) {
        var id_recorrido = $var;
        let id_anuncio = $('#cboanuncio').val();
        let id_inmueble = $('#cboinmueble').val();

        Swal.fire({
            title: '¿Está seguro eliminar el recorrido virtual?',
            text: "Los archivos eliminados no se podrán recuperar.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'POST',
                    url: "eliminarRecorrido",
                    data: {
                        id_recorrido: id_recorrido,
                        id_anuncio: id_anuncio,
                        id_inmueble: id_inmueble
                    },
                    success: function(data) {
                        $('.vista').html(data);

                        $(".descrip").removeClass("active");
                        $(".galeria").addClass("active");
                    }
                });
            }
        });
    }
</script>