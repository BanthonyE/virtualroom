<!-- Footer -->
<footer class="clearfix">
    <div class="pull-right">
        Diseñado por <a>TeamWeb</a>
    </div>
</footer>
<!-- END Footer -->
</div>
<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
<a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="<?php base_url() ?>assets/js/js1/vendor/jquery.min.js"></script>
<script src="<?php base_url() ?>assets/js/js1/vendor/bootstrap.min.js"></script>
<script src="<?php base_url() ?>assets/js/js1/plugins.js"></script>
<script src="<?php base_url() ?>assets/js/js1/app.js" type="text/javascript"></script>
<script src="<?php base_url() ?>assets/js/js1/helpers/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php base_url() ?>assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<!-- Load and execute javascript code used only in this page -->
<script src="<?php base_url() ?>assets/js/js1/pages/tablesDatatables.js"></script>
<script>
    $(function() {
        TablesDatatables.init();
    });
</script>
<script type="text/javascript">
    $("#rango_fecha").click(function() {
        var desde = $('#bd-desde').val();
        var hasta = $('#bd-hasta').val();
        var url = 'buscarFecha';
        $.ajax({
            type: 'POST',
            url: url,
            data: 'desde=' + desde + '&hasta=' + hasta,
            success: function(datos) {
                $('#actualizarReporte').html(datos);
            }
        });
        return false;
    });
</script>

<?php if ($this->uri->segment(1) == 'registrar_depart' || $this->uri->segment(1) == 'grabar_departamento' || $this->uri->segment(1) == 'modificar_depart') { ?>
    <script src="<?php base_url() ?>assets/js/ubicacion.js"></script>
<?php } ?>
<?php if ($this->uri->segment(1) == 'registrar-fotos' || $this->uri->segment(1) == 'registrar-foto-inmueble' || $this->uri->segment(1) == 'registrar_pub' || $this->uri->segment(1) == 'grabar_anuncio') { ?>
    <script src="<?php base_url() ?>assets/js/fotos.js"></script>
<?php } ?>
<?php if ($this->uri->segment(1) == 'galeria-imagenes') { ?>
    <script src="<?php base_url() ?>assets/js/imagen.js"></script>
<?php } ?>
<?php if ($this->uri->segment(1) == 'ver-contrato') { ?>
    <script src="<?php base_url() ?>assets/js/contrato.js"></script>
<?php } ?>

<?php if ($this->uri->segment(1) == 'ver-cronograma') { ?>
    <script src="<?php base_url() ?>assets/js/js1/pages/compCalendar.js"></script>
    <script>$(function(){ CompCalendar.init(); });</script>
<?php } ?>
<?php if ($this->uri->segment(1) == 'ver-documentos') { ?>
    <script src="<?php base_url() ?>assets/js/documento.js"></script>
<?php } ?>
<?php if ($this->uri->segment(1) == 'ver_visitantes') { ?>
    <script>
        $(document).ready(function() {
            $('.btnEditar').on('click', function(e) {
                if ($(this).hasClass("btn-danger")) {

                    $(this).removeClass('btn-danger');
                    $(this).addClass('btn-success');
                    $(this).html('<i class="fas fa-check"></i> Revisado');

                    let codigo = $(this).data('estado');

                    $.ajax({
                        type: 'POST',
                        url: "modificar_revision",
                        data: {
                            codigo: codigo
                        },
                        success: function(data) {


                        }
                    });
                }

            })
        })
    </script>
<?php } ?>

</body>

</html>