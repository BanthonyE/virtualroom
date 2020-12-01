 <!-- Page content -->
 <script src="<?php base_url() ?>assets/js/js1/vendor/jquery.min.js"></script>
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
         <li><a href="">Ver Departamentos</a></li>
     </ul>
     <!-- END Datatables Header -->

     <!-- Datatables Content -->

     <div class="block full">
         <div class="block-title">
             <h2><strong>Lista</strong> de Mis Departamentos</h2>
         </div>
         <div class="table-responsive">
             <form method="POST">
                 <table id="tabla" class="table table-vcenter table-condensed table-bordered">
                     <thead>
                         <tr>
                             <th class="text-center">Código</th>
                             <th>Nombre</th>
                             <th>N° Pisos</th>
                             <th>Direccion</th>
                             <th>N° Habitaciones</th>
                             <th>N° Baños</th>
                             <th>Metros Cuadrados</th>
                             <th>Precio</th>
                             <th>Descripcion</th>
                             <th>Servicios</th>
                             <th>Distrito</th>
                             <th>Nombre Arrendador</th>
                             <th class="text-center">Acción</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php foreach ($inmueble as $inmu) : ?>
                             <tr>
                                 <td class="text-center"><?= $inmu->ID_INMUEBLE ?></td>
                                 <td class="text-center"><?= $inmu->NOMB_INMUEBLE ?></td>
                                 <td class="text-center"><?= $inmu->PISO ?></td>
                                 <td class="text-center"><?= $inmu->NRO_DIRECCION ?></td>
                                 <td class="text-center"><?= $inmu->NRO_HABITACIONES ?></td>
                                 <td class="text-center"><?= $inmu->NRO_BAÑOS ?></td>
                                 <td class="text-center"><?= $inmu->METROS_CUADRADOS ?></td>
                                 <td class="text-center"><?= $inmu->PRECIO_MES ?></td>
                                 <td class="text-center"><?= $inmu->DESCRIP_INMUEBLE ?></td>
                                 <td class="text-center"><?= $inmu->SERVICIOS_INMUEBLE ?></td>
                                 <td class="text-center"><?= $inmu->NOMB_DISTRITO ?></td>
                                 <td class="text-center"><?= $inmu->NOMB_USUARIO ?></td>
                                 <td class="text-center">
                                     <div class="btn-group">
                                         <a data-toggle="tooltip" id="btnEstado" name="btnEstado" title="Ver Fotos" href="" class="btn btn-xs btn-default" value="<?= $inmu->ID_INMUEBLE ?>"><i class="fa fa-bullseye"></i></a>
                                         <a data-toggle="tooltip" id="btnEditar" name="btnEditar" title="Editar" class="btn btn-xs btn-default" href="modificar_depart?id=<?= $inmu->ID_INMUEBLE ?>"><i class="fas fa-edit"></i></a>
                                         <a data-toggle="tooltip" onclick="return confirm('¿Estas seguro de Eliminar el Departamento?')" id="btnEliminar" name="btnEliminar" title="Eliminar" class="btn btn-xs btn-danger" href="eliminar_depart?id=<?= $inmu->ID_INMUEBLE ?>"><i class="fas fa-trash-alt"></i></a>

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

 </script>
 <script>
     $(document).ready(function() {

     })
 </script>