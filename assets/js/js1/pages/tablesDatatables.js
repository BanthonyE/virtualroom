/*
 *  Document   : tablesDatatables.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Tables Datatables page
 */

var TablesDatatables = function() {

    return {
        init: function() {
            /* Initialize Bootstrap Datatables Integration */
            App.datatables();

            $('#tabla').DataTable({
            "searching": true // false to disable search (or any other option)
            });
            $('.dataTables_length').addClass('bs-select');
          
        }
    };
}();