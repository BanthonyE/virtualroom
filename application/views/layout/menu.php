<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    ?>
    <meta charset="utf-8">

    <title>VirtualRoom</title>

    <link rel="shortcut icon" href="<?php base_url() ?>assets/img/favicon.png">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/css1/bootstrap.min.css">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/css1/plugins.css">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/css1/main.css">
    <link rel="stylesheet" href="<?php base_url() ?>assets/css/css1/themes.css">

    <script src="<?php base_url() ?>assets/jquery/dist/jquery.js" type="text/javascript"></script>

    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            $("#tipoarea1").hide();
            $("#tipousuario").change(function() {
                $("#tipoarea1").hide();
                $("#tipoarea" + $(this).val()).show();
            });
        });
    </script>
    <style>
        .pdfobject-container {
            height: 60rem;
            border: 1rem solid rgba(0, 0, 0, .1);
        }

        .modal-dialog {
            background-color: #fff;
            padding: 20px 15px;
        }

        #cancel {
            margin: 5px;
            display: block;
        }

        .cargando {
            position: absolute;
            width: 30px;
            right: -40px;
            top: -2px;
        }

        .hide {
            display: none;
        }
    </style>
</head>

<body>

    <div id="page-wrapper">
        <!-- Page Container -->
        <div id="page-container" class="sidebar-mini sidebar-visible-lg">
            <!-- Main Sidebar -->
            <div id="sidebar">
                <!-- Wrapper for scrolling functionality -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <div class="sidebar-content">
                        <!-- Brand -->
                        <a href="inicio-usuario" class="sidebar-brand">
                            <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>VirtualRoom</strong></span>
                        </a>
                        <!-- END Brand -->

                        <!-- User Info -->

                        <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">

                            <div class="sidebar-user-avatar">
                                <?php
                                $image_properties = array('src' => 'uploads/fotos/' . $foto_usuario, 'height' => '60');
                                echo img($image_properties);
                                ?>
                            </div><br><br><br>
                            <!-- DIA DOMINGO-->
                            <div class="sidebar-user-name"><?php if ($tipo_usuario == 2) { ?>Arrendador <?php }elseif ($tipo_usuario == 1) { ?>Administrador <?php } else { ?>Arrendatario <?php } ?></div>
                            <div class="sidebar-user-name1"><i class="far fa-dot-circle"></i><?= $nombre_usuario ?></div>
                            <!-- DIA DOMINGO-->
                            <div class="sidebar-user-links">
                                <a href="inicio-usuario" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                                <?php if($tipo_usuario == 2){ ?>
                                    <a href="ver_visitantes" data-toggle="tooltip" data-placement="bottom" title="¨Pagos"><i class="far fa-list-alt"></i></a>
                                <?php }elseif($tipo_usuario == 3){ ?>
                                    <a href="ver-pagos" data-toggle="tooltip" data-placement="bottom" title="Pagos"><i class="fas fa-file-invoice-dollar"></i></a>
                                <?php }elseif($tipo_usuario == 1){ ?>
                                    <a href="ver_usuarios" data-toggle="tooltip" data-placement="bottom" title="Pagos"><i class="fas fa-users-cog"></i></a>
                                <?php } ?>
                                <a href="logout" data-toggle="tooltip" data-placement="bottom" title="Salir"><i class="gi gi-exit"></i></a>
                            </div>
                        </div>
                        <!-- END User Info -->

                        <!-- Sidebar Navigation -->
                        <?php
                        $uri = $this->uri->segment(1);
                        ?>
                        <ul class="sidebar-nav">
                            
                            <li>
                                <a href="inicio-usuario" class=" <?php if ($uri == 'inicio') { ?> active <?php } ?>"><i class="fa fa-home sidebar-nav-icon"></i>
                                    <span class="sidebar-nav-mini-hide">
                                        Inicio
                                    </span>
                                </a>
                            </li>

                            <?php if($tipo_usuario==2){ ?>
                                <li class=" <?php if (($uri == 'registrar_depart') || ($uri == 'ver_depart')) { ?> active <?php } ?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                        <i class="fa fa-building"></i>
                                        <span class="sidebar-nav-mini-hide">
                                            Departamentos
                                        </span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="registrar_depart" class=" <?php if ($uri == 'registrar_depart') { ?> active <?php } ?>">Registrar Departamento</a>
                                        </li>
                                        <li>
                                            <a href="ver_depart" class=" <?php if ($uri == 'ver_depart') { ?> active <?php } ?>">Ver Departamentos</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class=" <?php if (($uri == 'registrar_pub') || ($uri == 'ver_pub')) { ?> active <?php } ?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                        <i class="fas fa-location-arrow"></i>
                                        <span class="sidebar-nav-mini-hide">
                                            Publicaciones
                                        </span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="registrar_pub" method="POST" class=" <?php if ($uri == 'registrar_pub') { ?> active <?php } ?>">Registrar Publicación</a>
                                        </li>
                                        <li>
                                            <a href="ver_pub" method="POST" class=" <?php if ($uri == 'ver_pub') { ?> active <?php } ?>">Ver Publicaciones</a>
                                        </li>
                                    </ul>
                                </li>     
                                <li class=" <?php if (($uri == 'galeria-imagenes')) { ?> active <?php } ?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                        <i class="fas fa-photo-video"></i>
                                        <span class="sidebar-nav-mini-hide">
                                            Subir Imágenes
                                        </span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="galeria-imagenes" class=" <?php if ($uri == 'galeria-imagenes') { ?> active <?php } ?>">Ver Galería de Imágenes</a>
                                        </li>
                                    </ul>
                                </li>                                                           
                                <li class=" <?php if (($uri == 'ver_visitantes') || ($uri == 'ver_usuarios_registrados')) { ?> active <?php } ?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                        <i class="fas fa-users"></i>
                                        <span class="sidebar-nav-mini-hide">
                                            Personas Interesadas
                                        </span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="ver_visitantes" method="POST" class=" <?php if ($uri == 'ver_visitantes') { ?> active <?php } ?>">Ver Interesados</a>
                                        </li>
                                        <li>
                                            <a href="ver_usuarios_registrados" method="POST" class=" <?php if ($uri == 'ver_usuarios_registrados') { ?> active <?php } ?>">Ver Usuarios Registrados</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class=" <?php if (($uri == 'ver-documentos')) { ?> active <?php } ?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                        <i class="fas fa-folder-open"></i>
                                        <span class="sidebar-nav-mini-hide">
                                            Documentos
                                        </span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="ver-documentos" method="POST" class=" <?php if ($uri == 'ver-documentos') { ?> active <?php } ?>">Ver Galería de documentos</a>
                                        </li>
                                    </ul>
                                </li>                                
                            <?php } ?>

                            <?php if($tipo_usuario==1){ ?>
                                <!--MENU ADMINISTRADOR -->
                                <li class=" <?php if (($uri == 'registrar_usu') || ($uri == 'ver_usuarios')) { ?> active <?php } ?>">

                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i>
                                        <i class="fas fa-users-cog"></i>
                                        <span class="sidebar-nav-mini-hide">
                                            Usuarios
                                        </span>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="registrar_usu" class=" <?php if ($uri == 'registrar_usu') { ?> active <?php } ?>">Registrar Usuarios</a>
                                        </li>
                                        <li>
                                            <a href="ver_usuarios" class=" <?php if ($uri == 'ver_usuarios') { ?> active <?php } ?>">Ver Usuarios</a>
                                        </li>
                                    </ul>
                                </li>
                                <!--MENU ADMINISTRADOR -->
                            <?php } ?>
                            <?php if($tipo_usuario==3){ ?>

                                <li class=" <?php if (($uri == 'ver-contrato')) { ?> active <?php } ?>">
                                    <a href="ver-contrato" class=" <?php if ($uri == 'ver-contrato') { ?> active <?php } ?>"><i class="fas fa-file-signature sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Mi Contrato</span></a>
                                </li>
                                <li class=" <?php if (($uri == 'ver-pagos')) { ?> active <?php } ?>">
                                    <a href="ver-pagos" class=" <?php if ($uri == 'ver-pagos') { ?> active <?php } ?>"><i class="fas fa-file-invoice-dollar sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Mis pagos</span></a>
                                </li>
                            <?php } ?>

                            <br><br><br>
                            <li class="has-subnav">
                                <a href="logout"><i class="fa fa-power-off sidebar-nav-icon"></i>
                                    <span class="sidebar-nav-mini-hide">
                                        Salir
                                    </span>
                                </a>
                            </li>

                        </ul>
                        <!-- END Sidebar Navigation -->
                    </div>
                    <!-- END Sidebar Content -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Main Sidebar -->

            <!-- Main Container -->
            <div id="main-container">

                <script src="https://kit.fontawesome.com/c31bd4dd10.js"></script>

                <script src="<?php base_url() ?>assets/js/js1/vendor/modernizr.min.js"></script>