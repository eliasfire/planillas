/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(function($) {
    $('#add').click(function() {

        var filas = $('table#table-concepts tbody tr').size();
        var indice = parseInt(filas - 0);

        $('table#table-concepts tbody').append('<tr id="' + indice + '"><td>' +
                '</td>' +
                '<td>' +
                '</td>' +
                '<td>' +
                '</td>' +
                '<td>' +
                '</td>' +
                '<td class="pagination-centered">' +
                '<a class="btn remove" id="' + indice + '"><i class="icon-minus"></i></a>' +
                '</td></tr>');
    });
    
    $('a.remove').live('click', function(){
        var id      = $(this).attr('id');
        $('table#table-concepts tbody tr#' + id).remove();
    });
});