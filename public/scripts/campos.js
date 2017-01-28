$(document).ready(function(){  
    if($('#ventaC').is(':checked')) {  
        $("#valorDiv").show();
    } else {  
        $("#valorDiv").hide();
    }
    
    if($("input[name='tipoObra']:checked").val() == 1) {  
            $("#content-peso").hide();
            $("#content-altura").show();
            $("#content-ancho").show();
        } else {  
            $("#content-peso").show();;
            $("#content-altura").show();;
            $("#content-ancho").hide();;
        }  

    $("#ventaC").click(function() {  
        if($(this).is(':checked')) {  
        	$("#valorDiv").show();
        } else {  
            $("#valorDiv").hide();
        }  
    });

    $(".tipoObra").click(function() {
        if($("input[name='tipoObra']:checked").val() == 1) {  
        	$("#content-peso").hide();
        	$("#content-altura").show();
        	$("#content-ancho").show();
        } else {  
            $("#content-peso").show();;
        	$("#content-altura").show();;
        	$("#content-ancho").hide();;
        }  
    });    

    $("#venta").keyup(function(){
        var num = $(this).val().replace(/\./g,"");
        if(!isNaN(num)){
            num = num.toString().split("").reverse().join("").replace(/(?=\d*\.?)(\d{3})/g,"$1.");
            num = num.split("").reverse().join("").replace(/^[\.]/,"");
            entrada = num;
        }else{
            entrada = $(this).val().replace(/[^\d\.]*/g,"");
        }
        $("#venta").val(entrada);
    });

    $('#filer_input').filer({
        limit: 5,
        maxSize: 8,
        extensions: ["jpg", "png", "gif", "jpeg"],
        showThumbs: true,
        addMore: true
    });
});  