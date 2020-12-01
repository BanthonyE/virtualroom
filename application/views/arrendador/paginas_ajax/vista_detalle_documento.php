<link rel="stylesheet" href="<?php base_url() ?>assets/css/css1/plugins.css">

<div class="block full">

	<div class="block-title">
		<ul class="nav nav-tabs" data-toggle="tabs">
			<li class="active"><a href="#pt-table-based">Descripción del arrendatario</a></li>
			<li><a href="#pt-grid-based">Galería de documentos</a></li>
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
                                    <td><?=$arrendatario[0]->NOMB_INMUEBLE?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Descripción:</strong></td>
                                    <td><?=$arrendatario[0]->DESCRIP_INMUEBLE?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Piso:</strong></td>
                                    <td><?=$arrendatario[0]->PISO?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Dirección:</strong></td>
                                    <td><?=$arrendatario[0]->DIRECCION?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Nro de Dirección:</strong></td>
                                    <td><?=$arrendatario[0]->NRO_DIRECCION?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Nro de Habitaciones:</strong></td>
                                    <td><?=$arrendatario[0]->NRO_HABITACIONES?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Nro de Baños:</strong></td>
                                    <td><?=$arrendatario[0]->NRO_BAÑOS?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Metros Cuadrados:</strong></td>
                                    <td><?=$arrendatario[0]->METROS_CUADRADOS?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Precio Mensual:</strong></td>
                                    <td>
                                        <a href="javascript:void(0)" class="label label-success"><?=$arrendatario[0]->PRECIO_MES?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Servicios del Inmueble:</strong></td>
                                    <td><?=$arrendatario[0]->SERVICIOS_INMUEBLE?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Ubicación:</strong></td>
                                    <td><?=$arrendatario[0]->DESCRIP_INMUEBLE?></td>
                                </tr>
                            </tbody>
                        </table>                                     
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="block">  
                                      
                        <div class="block-title">
                            <h2><i class="fa fa-file-o"></i> <strong>Información del </strong>Arrendatario</h2>
                        </div>
                        
                        <table class="table table-borderless table-striped table-vcenter">
                            <tbody>
                                <tr>
                                    <td class="text-right" style="width: 50%;"><strong>Nombre : </strong></td>
                                    <td><?=$arrendatario[0]->NOMB_PERSONA?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Apellido : </strong></td>
                                    <td><?=$arrendatario[0]->APE_PERSONA?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Sexo : </strong></td>
                                    <td><?=$arrendatario[0]->SEXO?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>Celular : </strong></td>
                                    <td><?=$arrendatario[0]->CELULAR?></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>E-mail : </strong></td>
                                    <td><?=$arrendatario[0]->EMAIL?></td>
                                </tr>
                            </tbody>
                        </table>                                
                    </div>
                </div>
            </div>
		</div>

		<div class="tab-pane docus" id="pt-grid-based">
			<div class="row">
				<div class="col-md-4 col-lg-3">
					<div class="block full">
						<div class="block-title">
							<h2><i class="fa fa-compass"></i> Navegación de <strong>Archivos</strong></h2>
						</div>                        
						<ul class="nav nav-pills nav-stacked nav-icons media-filter">
							<li class="navcontrato active">
								<a href="javascript:void(0)" data-category="foto">
                                    <i class="fas fa-file-signature text-success icon-push"></i> <strong>Contrato</strong>
								</a>
							</li>
							<li class="navpagos">
								<a href="javascript:void(0)" data-category="portada">
                                    <i class="fas fa-file-invoice-dollar text-warning icon-push"></i> <strong>Pagos</strong>
								</a>
							</li>

						</ul>                
                    </div>
                    <div class="block full hidden-xs">
                        <div class="block-title">
                            <h2><i class="fa fa-cloud-upload"></i> Subir <strong>Documentos</strong></h2>
                        </div>

                        <form enctype="multipart/form-data" action="registrar-foto-inmueble" id="formDocumento" method="post">

                            <input type="hidden" name="id_inmueble" id="id_inmueble" value="">
                            <input type="hidden" name="id_arrendatario" id="id_arrendatario" value="">

                            <div class="form-horizontal form-bordered">

                                <div class="form-group">
                                    <label class="col-md-9 control-label" for="cbotipo_documento">Tipo de Documento</label>
                                    <div class="col-md-12">
                                        <select class="select-chosen" id="cbotipo_documento" name="cbotipo_documento" title='tipo_documento' data-placeholder="Seleccionar Tipo de documento.." style="width: 250px;" required>
                                            <option></option>
                                            <option value="contrato"> Contrato</option>
                                            <option value="pago"> Pagos</option>
                                        </select>
                                    </div>
                                </div>      
                                
                                <div class="contrato" style="display:none;">
                                    <div class="form-group">
                                        <label class="col-md-8 control-label" for="product-name">Ingresar Contrato: </label>
                                        <div class="col-md-12">
                                            <input type="file" required class="form-control" name="docs" id="docs" />
                                        </div>
                                    </div>
                                </div>
                                <div class="pagos" style="display:none;">
                                    <div class="form-group">
                                        <label class="col-md-8 control-label" for="product-name">Ingresar Pago: </label>
                                        <div class="col-md-12">
                                            <input type="file" required class="form-control" name="imgpago" id="imgpago" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-11 control-label" for="product-name">Ingresar Descripción del pago: </label>
                                        <div class="col-md-12">
                                            <input type="text" required class="form-control" name="txtdescripcion"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-9 control-label" for="product-name">Ingresar Monto: </label>
                                        <div class="col-md-12">
                                            <input type="text" required class="form-control" name="txtmonto"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-10 control-label" for="product-name">Ingresar fecha del Pago: </label>
                                        <div class="col-md-12">
                                            <input type="text" id="txtfecha" name="txtfecha" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group contrato" >
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" id="subirDocumento" onclick="return confirm('¿Estas seguro de Registrar?')" class="btn btn-sm btn-primary" name="fileSubmit"><i class="fa fa-floppy-o"></i> Guardar</button>                                        
                                    </div>
                                </div>
                                <div class="form-group pagos" style="display:none;">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" id="subirPagos" onclick="return confirm('¿Estas seguro de Registrar?')" class="btn btn-sm btn-primary" name="fileSubmit"><i class="fa fa-floppy-o"></i> Guardar</button>                                        
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
				</div>
                
				<div class="col-md-8 col-lg-9">
					<div class="block">
                    
						<div class="row media-filter-items">

                            <?php foreach ($contrato as $c) { ?>
                                <div class="col-sm-6 col-lg-4 galeriacontrato">
                                    <div class="media-items animation-fadeInQuickInv" data-category="foto">
                                        <div class="media-items-options text-left">
                                            <button onclick="ver_contrato('<?= $c->NOMB_CONTRATO ?>');" class="btn btn-xs btn-success"><i class="fas fa-search"></i></button>
                                            <button onclick="eliminar_contrato('<?= $c->ID_CONTRATO ?>');" class="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i></button>
                                        </div>
                                        <div class="media-items-content">
                                            <button onclick="ver_contrato('<?= $c->NOMB_CONTRATO ?>');" style="border:none;background:none;"><i class="far fa-file-pdf fa-5x text-danger"></i></button>
                                        </div> 
                                        <h4><?=$c->NOMB_CONTRATO?></h4>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php foreach ($pagos as $p) { ?>
                                <div class="col-sm-6 col-lg-4 galeriapagos" style="display:none;">
                                    <div class="media-items animation-fadeInQuickInv" data-category="portada">
                                        <div class="media-items-options text-left">
                                            <a href="<?php echo base_url('uploads/pagos/'.$p->NOMB_PAGO) ?>" class="btn btn-xs btn-success"
                                                data-toggle="lightbox-image"><i class="fa fa-search"></i></a> 
                                            <button onclick="eliminar_pago('<?= $p->ID_PAGO ?>');" class="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i></button>                                               
                                        </div>
                                        <div class="media-items-content">
                                            <a href="<?php echo base_url('uploads/pagos/'.$p->NOMB_PAGO) ?>" data-toggle="lightbox-image">
                                                <img src="<?php echo base_url('uploads/pagos/'.$p->NOMB_PAGO) ?>" alt="image" width="250px">
                                            </a>
                                        </div>                                        
                                        <h4><?=$p->DESCRIP_PAGO?></h4>
                                        <h4>Monto Pagado: s/ <?=$p->MONTO_PAGO?> soles</h4>
                                        <h5>Fecha de pago : <?php echo date("Y-m-d", strtotime($p->FECHA_PAGO));?></h5>
                                        <h5>Fecha de subida : <?php echo date("Y-m-d", strtotime($p->FECHA_UP_PDF));?></h5>
                                    </div>
                                </div>
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
	$(function () {
		ReadyFiles.init();
    });
    
    $('#cbotipo_documento').change(function(){

        let id_arrendatario = $('#cboarrendatario').val();
        let id_inmueble = $('#cboinmueble').val();
        $('#id_inmueble').val(id_inmueble);
        $('#id_arrendatario').val(id_arrendatario);
    
        let tipo_documento = $('#cbotipo_documento').val();
        if (tipo_documento == "contrato") {
            $('.contrato').show();
            $('.pagos').hide();
        }else{
            $('.pagos').show();
            $('.contrato').hide();
        }
    });
    
    $('#subirDocumento').click(function(){
    
        var formData = new FormData($("#formDocumento").get(0));

        $.ajax({
            type: 'POST',
            url: "registrar_contrato",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.vista').html(data);
                $(".descrip").removeClass("active");
                $(".docus").addClass("active");
                $(".navpagos").removeClass("active");
                $(".navcontrato").addClass("active");
                $(".galeriacontrato").show();
                $(".galeriapagos").hide();
            } 
        });
        return false;
    });

    
    $('#subirPagos').click(function(){
    
        var formData = new FormData($("#formDocumento").get(0));

        $.ajax({
            type: 'POST',
            url: "registrar_pagos",
            data: formData,
            contentType: false,
            processData: false,
            success: function (data) {
                $('.vista').html(data);
                $(".descrip").removeClass("active");
                $(".docus").addClass("active");
                
                $(".navcontrato").removeClass("active");
                $(".navpagos").addClass("active");
                $(".galeriacontrato").hide();
                $(".galeriapagos").show();
            } 
        });
        return false;
    });

	function ver_contrato($var) {
        var nombre_contrato = $var;
        var base_url = "<?php echo base_url();?>";

        var ruta = base_url + 'uploads/contratos/' + nombre_contrato;
        var iframe = '<iframe src="' + ruta + '" width="600" height="600" frameborder="0"></iframe>';

        Swal.fire({
            title: 'Contrato ',
            html: iframe,
            width: 650,
            height: 700
        })
    }

	function eliminar_contrato($var) {
        var id_contrato = $var;
        let id_arrendatario = $('#cboarrendatario').val();
        let id_inmueble = $('#cboinmueble').val();

        Swal.fire({
            title: '¿Está seguro eliminar el contrato de arrendamiento?',
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
                    url: "eliminarContrato",
                    data: {
                        id_contrato: id_contrato,
                        id_arrendatario: id_arrendatario,
                        id_inmueble: id_inmueble
                    },
                    success: function (data) {
                        $('.vista').html(data);

                        $(".descrip").removeClass("active");
                        $(".docus").addClass("active");

                        $(".navpagos").removeClass("active");
                        $(".navcontrato").addClass("active");
                        $(".galeriacontrato").show();
                        $(".galeriapagos").hide();
                    }
                });
            }
        });
    }


	function eliminar_pago($var) {
        var id_pago = $var;
        let id_arrendatario = $('#cboarrendatario').val();
        let id_inmueble = $('#cboinmueble').val();

        Swal.fire({
            title: '¿Está seguro eliminar el pago de arrendamiento?',
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
                    url: "eliminarPago",
                    data: {
                        id_pago: id_pago,
                        id_arrendatario: id_arrendatario,
                        id_inmueble: id_inmueble
                    },
                    success: function (data) {
                        $('.vista').html(data);

                        $(".descrip").removeClass("active");
                        $(".docus").addClass("active");

                        $(".navcontrato").removeClass("active");
                        $(".navpagos").addClass("active");
                        $(".galeriacontrato").hide();
                        $(".galeriapagos").show();
                    }
                });
            }
        });
    }
</script>