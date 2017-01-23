    $(document).ready(function(){  
      
        $("#ventaC").click(function() {  
            if($(this).is(':checked')) {  
            	$("#valorDiv").css("display", "block");
            } else {  
                $("#valorDiv").css("display", "none");
            }  
        });  
      
    });  