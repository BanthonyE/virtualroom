<?php
    $uri = $this->uri->segment(1);
?>
<div id="page-content">

    <div class="content-header">
        <ul class="nav-horizontal text-center">
            <li class="active">
                <a href="#"><i class="far fa-folder-open"></i> Galería de Documentos</a>
            </li> 
        </ul>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Galería de documentos</li>
        <?php if ($uri == 'ver-contrato') { ?>
            <li><a href="">Contrato</a></li>
        <?php }elseif($uri == 'ver-pagos'){ ?>
            <li><a href="">Lista de pagos</a></li>
        <?php }?>
    </ul>
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/css1/plugins.css">

<div class="block full">

	<div class="block-title">
		<ul class="nav nav-tabs" data-toggle="tabs">
			<li class="active"><a href="#pt-grid-based">Galería de documentos</a></li>
			<li><a href="#pt-table-based">Descripción del arrendatario</a></li>
		</ul>
	</div>

	<div class="tab-content">
		<div class="tab-pane descrip" id="pt-table-based">
                
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
                            <h2><i class="fa fa-file-o"></i> <strong>Mi inforcación </strong></h2>
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

		<div class="tab-pane docus active" id="pt-grid-based">
			<div class="row">
				<div class="col-md-4 col-lg-3">
					<div class="block full">
						<div class="block-title">
							<h2><i class="fa fa-compass"></i> Navegación de <strong>Archivos</strong></h2>
						</div>                        
						<ul class="nav nav-pills nav-stacked nav-icons media-filter">
							<li class="navcontrato <?php if ($uri == 'ver-contrato') { ?> active <?php } ?>">
								<a href="javascript:void(0)" data-category="foto">
									<i class="fas fa-file-signature text-success icon-push"></i> <strong>Contrato</strong>
								</a>
							</li>
							<li class="navpagos <?php if ($uri == 'ver-pagos') { ?> active <?php } ?>">
								<a href="javascript:void(0)" data-category="portada">
									<i class="fas fa-file-invoice-dollar text-warning icon-push"></i> <strong>Pagos</strong>
								</a>
							</li>

						</ul>                
                    </div>
				</div>
                
				<div class="col-md-8 col-lg-9">
					<div class="block">
                    
						<div class="row media-filter-items">

                            <?php foreach ($contrato as $c) { ?>
                                <div class="col-sm-6 col-lg-4 galeriacontrato"  <?php if ($uri == 'ver-pagos') { ?> style="display:none;" <?php }else{ ?> <?php } ?>>
                                    <div class="media-items animation-fadeInQuickInv" data-category="foto">
                                        <div class="media-items-options text-left">
                                            <button onclick="ver_contrato('<?= $c->NOMB_CONTRATO ?>');" class="btn btn-xs btn-success"><i class="fas fa-search"></i></button>                                            
                                        </div>
                                        <div class="media-items-content">
                                            <button onclick="ver_contrato('<?= $c->NOMB_CONTRATO ?>');" style="border:none;background:none;"><i class="far fa-file-pdf fa-5x text-danger"></i></button>
                                        </div> 
                                        <h4><?=$c->NOMB_CONTRATO?></h4>
                                    </div>
                                </div>
                            <?php } ?>

                            <?php foreach ($pagos as $p) { ?>
                                <div class="col-sm-6 col-lg-4 galeriapagos"  <?php if ($uri == 'ver-pagos') { ?> <?php }else{ ?> style="display:none;" <?php } ?>>
                                    <div class="media-items animation-fadeInQuickInv" data-category="portada">
                                        <div class="media-items-options text-left">
                                            <a href="<?php echo base_url('uploads/pagos/'.$p->NOMB_PAGO) ?>" class="btn btn-xs btn-success"
                                                data-toggle="lightbox-image"><i class="fa fa-search"></i></a>                                             
                                        </div>
                                        <div class="media-items-content">
                                            <a href="<?php echo base_url('uploads/pagos/'.$p->NOMB_PAGO) ?>" data-toggle="lightbox-image">
                                                <img src="<?php echo base_url('uploads/pagos/'.$p->NOMB_PAGO) ?>" alt="image" width="250px">
                                            </a>
                                        </div>
                                        <h4><?=$p->DESCRIP_PAGO?></h4>
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

</script>

<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
