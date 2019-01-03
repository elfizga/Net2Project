// password validation
document.getElementById("pass2").onkeyup = function(){

    var p1=document.getElementById("pass1").value ,
        p2=document.getElementById("pass2").value ;
   
        if ( p1 == p2 ) {
            document.getElementById("lab").innerHTML=" ✔ ";
            document.getElementById("lab").style.color="green";
            document.getElementById("lab").style.fontSize="15px";  }
   
        else {
           document.getElementById("lab").innerHTML=" ✘ ";
           document.getElementById("lab").style.color="red"; 
           document.getElementById("lab").style.fontSize="15px";   }
   }
// form validation 
var validateform = function(event) {

	var firstname = document.getElementById("name1").value;
	var lastname = document.getElementById("name2").value;
    var phone = document.getElementById("rd-navbar-register-num").value;
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var email = document.getElementById("rd-navbar-register-email").value;
	
	var errtext = "";
 
    if(firstname =="" || firstname == null)
    {$("#erralert").show("fast");
    errtext += " من فضلك ادخل الاسم الاول <br />" ;
    $("#erralert").html(errtext);
    event.preventDefault();
    window.location.hash = '#erralert';
    }

    if(lastname == "" || lastname == null)
    {$("#erralert").show("fast");
    errtext += " من فضلك ادخل الاسم الاخير  <br />" ;
    $("#erralert").html(errtext);
    event.preventDefault();
    window.location.hash = '#erralert';
    }

    if(phone == null || phone == ""){
        $("#erralert").show("fast");
        errtext += " من فضلك ادخل رقم الهاتف <br />" ;
         $("#erralert").html(errtext);
        event.preventDefault();
        window.location.hash = '#erralert';
    }

    if(pass1 == null || pass1 == ""){
        $("#erralert").show("fast");
        errtext += " من فضلك ادخل كلمة المرور <br /> " ;
         $("#erralert").html(errtext);
        event.preventDefault();
        window.location.hash = '#erralert';
		}
     else if (pass1.length < 8 ){
         $("#erralert").show("fast");
         errtext += " يجب ان لا يكون طول كلمة المرور اقل من 8 احرف <br />" ;
         $("#erralert").html(errtext);
         event.preventDefault();
         window.location.hash = '#erralert';
    }

    if(pass2 == null || pass2 == ""){
         $("#erralert").show("fast");
         errtext += "من فضلك ادخل  تأكيد كلمة المرور <br />" ;
         $("#erralert").html(errtext); 
        event.preventDefault();
        window.location.hash = '#erralert';}

    
    if(pass1 != pass2){
        $("#erralert").show("fast");
        errtext += " من فضلك تأكد من تطابق كلمة المرور <br />" ;
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
	


}

    var btn = document.getElementById("btn");
    // attach event listener
    btn.addEventListener("click", validateform, true);

function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(String(email).toLowerCase());
}