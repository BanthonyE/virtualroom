<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'inicio';
$route['login'] = 'ControllerUsuario/verificacion_usuario';
$route['logout'] = 'ControllerUsuario/logout';

$route['inicio_arrendador'] = 'ControllerArrendador';
$route['verificacion_admin'] = 'ControllerUsuario/verificacion_admin';
$route['registrar_usuario'] = 'ControllerUsuario/vista_registrar_usuario';
$route['signup_usuario'] = 'ControllerUsuario/add_usuario_persona';
$route['admin'] = 'Inicio/vista_login';
$route['editar-perfil'] = 'ControllerUsuario/editar_perfil';
$route['inicio-usuario'] = 'ControllerArrendador';


//RUTAS FOTOS
/* $route['registrar-fotos'] = 'ControllerFotos/vista_registrar_fotos'; */
$route['listar-fotos'] = 'ControllerFotos/vista_listar_fotos';
$route['CargarInmueble'] = 'ControllerFotos/cargar_info_inmueble';
$route['registrar-foto-inmueble'] = 'ControllerFotos/add_fotos';
$route['ActualizarFotos'] = 'ControllerFotos/update_fotos';
$route['BorrarFotos'] = 'ControllerFotos/delete_fotos';
$route['galeria-imagenes'] = 'ControllerFotos/view_galeria_imagenes';


//RUTAS ARRENDADOR
$route['registrar_depart'] = 'ControllerArrendador/view_registrar_inmueble';
$route['modificar_depart'] = 'ControllerArrendador/view_modificar_inmueble';
$route['eliminar_depart'] = 'ControllerArrendador/delete_inmueble';
$route['grabar_departamento'] = 'ControllerArrendador/add_inmueble';
$route['ver_depart'] = 'ControllerArrendador/view_lista_inmueble';
$route['CargarProvincia'] = 'ControllerProvincia/view_provincia';
$route['CargarDistrito'] = 'ControllerProvincia/view_distrito';
//RUTAS ARRENDATARIO
$route['registrar_arrendatario'] = 'ControllerArrendatario/view_add_arrendatario';
$route['grabar_arrendatario'] = 'ControllerArrendatario/add_grabar_arrendatario';
$route['ver_usuarios_registrados'] = 'ControllerArrendatario/view_arrendatario';

$route['modificar_deshab'] = 'ControllerArrendatario/edit_deshabilitar';
$route['modificar_hab'] = 'ControllerArrendatario/edit_habilitar';
$route['eliminar_arrendatario'] = 'ControllerArrendatario/delete_arrendatario';
$route['editar_arrendatario'] = 'ControllerArrendatario/view_edit_arrendatario';


//RUTAS ANUNCIO
$route['registrar_pub'] = 'ControllerAnuncio/view_cargar_inmueble';
$route['grabar_anuncio'] = 'ControllerAnuncio/add_inmueble';
$route['ver_pub'] = 'ControllerAnuncio/view_lista_anuncio';
$route['modificar_anuncio'] = 'ControllerAnuncio/view_modificar_anuncio';
$route['eliminar_anuncio'] = 'ControllerAnuncio/delete_anuncio';
$route['valorarAnuncio'] = 'Inicio/valorar_anuncio';


//GALERÍA ANUNCIO 18-11-2020
$route['galeria-publicacion'] = 'ControllerAnuncio/galeria_publicacion';
$route['CargarAnuncio'] = 'ControllerAnuncio/cargar_anuncio';
$route['CargarVistaAnuncio'] = 'ControllerAnuncio/Cargar_vista_anuncio';
$route['foto_portada'] = 'ControllerAnuncio/foto_portada';


//RUTAS PAGINA PÚBLICA
$route['inicio'] = 'inicio';
$route['nosotros'] = 'Inicio/vista_nosotros';
$route['ayuda'] = 'Inicio/vista_ayuda';
$route['condiciones'] = 'Inicio/vista_condiciones';
$route['contactenos'] = 'Inicio/vista_contactenos';
$route['listado-anuncios'] = 'Inicio/listado_anuncios';
$route['detalle-anuncio'] = 'Inicio/detalle_anuncio';
$route['registro-interesados'] = 'Inicio/registro_interesados';

//RUTAS VISITANTES
$route['ver_visitantes'] = 'ControllerVisitante/view_visitante';
$route['modificar_revision'] = 'ControllerVisitante/edit_visitante';
$route['eliminar_visitante'] = 'ControllerVisitante/delete_visitante';
$route['enviar_email'] = 'Inicio/enviar_email';

//RUTAS ADMINISTRADOR
$route['registrar_usu'] = 'ControllerAdministrador/view_registrar_usuario';
$route['grabar_usuario'] = 'ControllerAdministrador/add_registrar_usuario';
$route['ver_usuarios'] = 'ControllerAdministrador/view_lista_usuario';
$route['modificar_usu_deshab'] = 'ControllerAdministrador/edit_deshabilitar';
$route['modificar_usu_hab'] = 'ControllerAdministrador/edit_habilitar';
$route['editar_usuario'] = 'ControllerAdministrador/view_edit_usuario';
$route['eliminar_usuario'] = 'ControllerAdministrador/delete_usuario';


//DOCUMENTOS
$route['ver-documentos'] = 'ControllerContrato/vista_contrato';
$route['CargarVistaDocumentos'] = 'ControllerContrato/cargar_vista_documentos';
$route['registrar_contrato'] = 'ControllerContrato/registrar_contrato';
$route['eliminarContrato'] = 'ControllerContrato/eliminar_contrato';

$route['registrar_pagos'] = 'ControllerPago/registrar_pagos';
$route['eliminarPago'] = 'ControllerPago/eliminar_pago';

//RECORRIDO
$route['eliminarRecorrido'] = 'ControllerFotos/eliminar_recorrido';
$route['registrar_imagenes'] = 'ControllerFotos/registrar_imagenes';
$route['estadoImagen'] = 'ControllerFotos/update_imagen';
$route['estadoImagenVirtual'] = 'ControllerFotos/update_imagen_virtual';


//CRONOGRAMA
$route['ver-cronograma'] = 'ControllerArrendador/vista_cronograma';

//MENSAJERÍA
$route['ver-mensajeria'] = 'ControllerMensajeria/vista_mensajeria';

//ARRENDATARIO
$route['CargarArrendatario'] = 'ControllerArrendatario/cargar_arrendatario';
//ARRENDATARIO 27-11-2020
$route['ver-contrato'] = 'ControllerArrendatario/ver_contrato';
$route['ver-pagos'] = 'ControllerArrendatario/ver_contrato';







$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
