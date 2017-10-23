/**
 * Created by Mike on 22/10/2017.
 */

$(document).ready(function() {

    $.ajax({
        url: "/ITube/public/cables_types",
        dataType: "html",
        success: function (msg) {
            $("#cable_type").html(msg);

        }
    });

    $("select[name='material']").change(function () {
        var material = $(this).val();

        if(material === "1"){
            $.ajax({

                url: "/ITube/public/tube_types",

                dataType: "html",
                success: function (msg) {
                    $("#selected_material").html(msg);
                    $("#use_material").val("tubos");
                }
            });
        }else{
            $("#selected_material").empty();
            $("#material_type").empty();
            $("#use_material").val("");
        }


    });

    $("select[name='selected_material']").change(function () {
        var materialid = $(this).val();
            $.ajax({
                url: '/ITube/public/tubes/'+materialid,
                dataType: "html",
                success: function (msg) {
                    $("#material_type").html(msg);

                }
            });

    });

    $("select[name='cable_type']").change(function () {
        var cable_type_id = $(this).val();
        $.ajax({
            url: '/ITube/public/cables/'+cable_type_id,
            dataType: "html",
            success: function (msg) {
                $("#cable_id").html(msg);
            }
        });

    });

    $("select[name='cable_id']").change(function () {
        var cable_id = $(this).val();
        $.ajax({
            url: '/ITube/public/cablesdiameter/'+cable_id,
            dataType: "json",
            success: function (msg) {

                console.log(msg);
                $("#cable_diameter").val(msg[0].external_diameter);
            }
        });

    });

    $("#calcular").on('click',function(){
        var datos = $('#formulario').serialize();
        $.ajax({
            type: "POST",
            url: "/ITube/public/calcular",
            data: datos,
            dataType: "html",
            success: function( msg ) {
                console.log(msg);
                $("#resultados").html(msg);

            }
        });
    });


});
