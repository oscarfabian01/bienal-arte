$(document).ready(function(){  
    $("#ventaC").click(function() {  
        if($(this).is(':checked')) {  
        	$("#valorDiv").show();
        } else {  
            $("#valorDiv").hide();
        }  
    });

    $(".tipoObra").click(function() {
        if($(this).val() == 1) {  
        	$("#content-peso").hide();
        	$("#content-altura").show();
        	$("#content-ancho").show();
        } else {  
            $("#content-peso").show();;
        	$("#content-altura").show();;
        	$("#content-ancho").hide();;
        }  
    });    
});  