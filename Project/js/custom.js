$(document).ready(function(){

    // login validations

    // $("#loginButton").on('click',function(){

    //     var logemail = $("#loginEmail").val();
    //     var loginemail = /^[a-z0-9.-_]+@+[a-z]+.+[a-z]$/;

    //     var logpassword = $("#loginPassword").val();

    //     if(logemail==""){
    //         $("#loginEmailError").html('Email Required*');
    //         $("#loginEmailError").css('color','red');
    //         $("#loginEmailError").css('font-size','0.7rem');
    //         return(false);
    //     }

    //     else if(!(logemail.match(loginemail))){
    //         $("#loginEmailError").html('Enter Valid Email*');
    //         $("#loginEmailError").css('color','red');
    //         $("#loginEmailError").css('font-size','0.7rem');
    //         return(false);
    //     }
    //     else{
    //         $("#loginEmailError").html('');
    //     }


    //     if(logpassword==""){
    //         $("#loginPasswordError").html('Password Required*');
    //         $("#loginPasswordError").css('color','red');
    //         $("#loginPasswordError").css('font-size','0.7rem');
    //         return(false);
    //     }
    //     else{
    //         $("#loginPasswordError").html('');
    //     }



    // })





    // registration validations

   
   
    
    
    // $("#role").change(function(){
    //     if($("#role").val()=="club"){
    //         $("#selectclubdiv").show();
    //     }
    //     else{
    //         $("#selectclubdiv").hide();
    //     }
    // })
    
    

    $("#reg_butt").on('click',function(){
        alert('hello');

        // validations
        // var fname = $("#Inputname").val();
        // var regname = /^[a-zA-Z]{3,20}$/;

        // var role = $("#role").val();
        // var selclub = $("#selectclub").val();

        

        // if(fname==""){
        //     $("#fnameError").html('Name Required*');
        //     $("#fnameError").css('color','red');
        //     $("#fnameError").css('font-size','0.7rem');
        //     return(false);
        // }
        // else if(!(fname.match(regname))){
        //     $("#fnameError").html('Enter Valid Length*');
        //     $("#fnameError").css('color','red');
        //     $("#fnameError").css('font-size','0.7rem');
        //     return(false);
        // }
        // else{
        //     $("#fnameError").html('');
        // }
            

        // if(lname==""){
        //     $("#lnameError").html('Name Required*');
        //     $("#lnameError").css('color','red');
        //     $("#lnameError").css('font-size','0.7rem');
        //     return(false);
        // }
        // else if(!(lname.match(regname))){
        //     $("#lnameError").html('Enter Valid Length*');
        //     $("#lnameError").css('color','red');
        //     $("#lnameError").css('font-size','0.7rem');
        //     return(false);
        // }
        // else{
        //     $("#lnameError").html('');
        // }

        // if(role=="club"){
        //     $("#selectclubdiv").show();
        //     if(selclub==""){
        //         $("#clubError").html('Select a Club*');
        //         $("#clubError").css('color','red');
        //         $("#clubError").css('font-size','0.7rem');
        //         return(false);
        //     }
        //     else{
        //         $("#clubError").html('');
        //     }
        // }
        // else{
        //     $("#clubError").html('');
        //     $("#selectclubdiv").hide();
        // }

        // var email = $("#inputEmail").val();
        // var regemail = /^[a-z0-9.-_]+@+[a-z]+.+[a-z]$/;

        // if(email==""){
        //     $("#emailError").html('Email Required*');
        //     $("#emailError").css('color','red');
        //     $("#emailError").css('font-size','0.7rem');
        //     return(false);
        // }

        // else if(!(email.match(regemail))){
        //     $("#emailError").html('Enter Valid Email*');
        //     $("#emailError").css('color','red');
        //     $("#emailError").css('font-size','0.7rem');
        //     return(false);
        // }
        // else{
        //     $("#emailError").html('');
        // }


        // var password = $("#inputPassword").val();
        

        // if(password==""){
        //     $("#passwordError").html('Password Required*');
        //     $("#passwordError").css('color','red');
        //     $("#passwordError").css('font-size','0.7rem');
        //     return(false);
        // }
        // // else if(!(password.match(regpassword))){
        // //     $("#passwordError").html('Enter valid password*');
        // //     $("#passwordError").css('color','red');
        // //     $("#passwordError").css('font-size','0.7rem');
        // //     return(false);
        // // }
        // else{
            
        //     $("#passwordError").html('');
        //     $("#reg_button").hide ();
        //     $("#reg_snipper").show();

        // }

        $.ajax({
            type:'POST',
            url:'web_services/register.php',
            data:$("#registrationform").serialize(),
            success:function(result){
                alert(result);
                if(result.status=='fail'){
                    // alert(result.status);
                    // $("#emailError").html("Email already exist. Please try another email.");
                    // $("#emailError").css('color','red');
                    // $("#emailError").css('font-size','0.7rem');
                    // $("#reg_button").show();
                    // $("#reg_snipper").hide();
                }
                else if(result.status=='failure'){
                    // alert(result.status);
                    // $("$emailError").html("Oops something went wrong. Please contact the admin. Sorry for the inconvinience");
                }
                else if(result.status=='success'){
                    // alert(result.status);
                    // $("#reg_msg").html("Registration Successfull. Try logging in.");
                    // $("#reg_snipper").hide(); 
                    // $("#login_snipper").hide();

                }
            }
        })

    // ajax operation
        // $.ajax({
        //     type:'POST',
        //     url:'web_services/register.php',
        //     data: $("#registrationform").serialize(),
        //     success:function(result){
        //         alert(result);
        //         if(result.status=='fail'){
        //             alert(result.status);
        //             // $("#emailError").html("Email already exist. Please try another email.");
        //             // $("#emailError").css('color','red');
        //             // $("#emailError").css('font-size','0.7rem');
        //             // $("#reg_button").show();
        //             // $("#reg_snipper").hide();
        //         }
        //         else if(result.status=='failure'){
        //             alert(result.status);
        //             // $("$emailError").html("Oops something went wrong. Please contact the admin. Sorry for the inconvinience");
        //         }
        //         else if(result.status=='success'){
        //             alert(result.status);
        //             // $("#reg_msg").html("Registration Successfull. Try logging in.");
        //             // $("#reg_snipper").hide(); 
        //             // $("#login_snipper").hide();

        //         }
        //     }
        // })
    
    })
    
    
    
    
})