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
});  