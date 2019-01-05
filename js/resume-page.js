$(document).ready(function() {

    // ajax post portfolio

    $("#post-a-portfolio").submit(function(e) {
        e.preventDefault();
        // Get form
        var form = $(this)[0];
  
        // Create an FormData object
        var data = new FormData(form);
  
        $.ajax({
            type:'POST',
            url: 'post-portfolio.php',
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            cache: false,
            data: data
        })
        .done(function(response){
            console.log(response);
            if (response.trim() === "error"){  
                alert("error") ;        
                 }
            else {
                var element = '<div class="col-sm-6"><a class="thumbnail-classic" href="#"><figure class="thumbnail-classic-figure"><img class="thumbnail-classic-image" src="images/' + response + '" alt=""></figure><div class="thumbnail-classic-caption"><p class="heading-9 thumbnail-classic-title"> ' + $("#general-information-portfolio-title").val() + ' </p><p class=" thumbnail-classic-title">' + $('#general-information-description').val() + '</p></div><div class="thumbnail-classic-dummy"></div></a></div>';               
                $("#portfolios").append(element); 
                $('#post-a-portfolio')[0].reset();
                $("#exampleModalCenter").modal('toggle');}
        })
        .fail(function(response){
            console.log(response);
            console.log("f");

        });
      });

 });