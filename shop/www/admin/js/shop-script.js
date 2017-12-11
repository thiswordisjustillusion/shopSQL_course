$(document).ready(function(){           //выход
    $('#logout').click(function() {
        $.ajax({
            type: "POST",
            url: "admin/include/logout.php",
            dataType: "html",
            cache: false,
            success: function(data) {
                if (data == true) {
                    location.reload();
                    document.location.href = "/admin/"
                }
            }
        });
    });
    
    
    
    
    
    
    
    
    
    
    
    
    
    
});