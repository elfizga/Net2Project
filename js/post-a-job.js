var validateform = function(event) {  
    var title = document.getElementById("general-information-job-title").value;
	var type = document.getElementById("general-information-job-type").value;
    var spec = document.getElementById("general-information-job-category").value;
    var price = document.getElementById("general-information-salary").value;
    var location = document.getElementById("general-information-address").value;
    var email = document.getElementById("general-information-email").value;
    var desc = document.getElementById("general-information-description").value;
	
    var errtext = "";
    
    if(title =="" || title == null)
    {$("#erralert").show("fast");

    errtext += " من فضلك ادخل عنوان الوظيفة <br />" ;
    $("#erralert").html(errtext);
    event.preventDefault();
    window.location.hash = '#erralert';
    }

    if(type =="" || type == null)
    {$("#erralert").show("fast");

    errtext += " من فضلك اختر نوع الوظيفة <br />" ;
    $("#erralert").html(errtext);
    event.preventDefault();
    window.location.hash = '#erralert';
    }

    if(spec =="" || spec == null)
    {$("#erralert").show("fast");

    errtext += " من فضلك اختر مجال العمل<br />" ;
    $("#erralert").html(errtext);
    event.preventDefault();
    window.location.hash = '#erralert';
    }

    if(location =="" || location == null)
    {$("#erralert").show("fast");

    errtext += " من فضلك حدد المدينة <br />" ;
    $("#erralert").html(errtext);
    event.preventDefault();
    window.location.hash = '#erralert';
    }

    if(price =="" || price == null)
    {$("#erralert").show("fast");

    errtext += " من فضلك حدد سعر الوظيفة <br />" ;
    $("#erralert").html(errtext);
    event.preventDefault();
    window.location.hash = '#erralert';
    }

    if (email == null || email == "") {
        $("#erralert").show("fast");
        errtext += "من فضلك ادخل البريد الالكتروني <br />" ;
        $("#erralert").html(errtext);
        event.preventDefault();
        window.location.hash = '#erralert';
		
    } else if(!validateEmail(email)) {
        $("#erralert").show("fast");
        errtext += "يجب كتابة البريد الاكتروني بصيغة صحيحة <br />" ;
        $("#erralert").html(errtext);
        event.preventDefault();
        window.location.hash = '#erralert';
    }

    if(desc == null || desc == ""){
        $("#erralert").show("fast");
        errtext += " من فضلك ضع وصف للوظيفة <br /> " ;
         $("#erralert").html(errtext);
        event.preventDefault();
        window.location.hash = '#erralert';
		}
     else if (desc.length < 200 ){
         $("#erralert").show("fast");
         errtext += "  يجب ان لا يكون طول وصف الوظيفة اقل من 200 حرف <br />" ;
         $("#erralert").html(errtext);
         event.preventDefault();
         window.location.hash = '#erralert';
    }

}
var btn = document.getElementById("btn");
// attach event listener
btn.addEventListener("click", validateform, true);

function validateEmail(email) {
var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
return re.test(String(email).toLowerCase());
}

