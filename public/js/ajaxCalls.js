/**
 * Created by Mike on 22/10/2017.
 */

$(document).ready(function() {

    $("select[name='material']").change(function () {
        var material = $(this).val();

        if(material === "1"){
            $.ajax({

                url: "/ITube/public/tube_types",

                dataType: "html",
                success: function (msg) {
                    $("#selected_material").html(msg);
                    console.log(msg);
                }
            });
        }else if(material === "0"){
            $("#selected_material").empty();
            $("#material_type").empty();
        }


    });

    $("select[name='selected_material']").change(function () {
        var materialid = $(this).val();



            $.ajax({

                url: '/ITube/public/tubes/'+materialid,

                dataType: "html",
                success: function (msg) {
                    $("#material_type").html(msg);
                    console.log(msg);
                }
            });





    });


});
