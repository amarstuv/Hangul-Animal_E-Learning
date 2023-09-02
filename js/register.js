 $(document).ready(function() {

    $("#registerForm").unbind('submit').bind('submit', function() {

        $(".text-danger").remove();
        $('.form-group').removeClass('is-invalid').removeClass('is-valid');

        var fname = $("#Fname").val();
        var email = $("#email").val();
        var username = $("#username").val();
        var password = $("#password").val();

        if(fname == "" || email == "" || username == "" || password == "") {

            if(fname == ""){
                $("#Fname").after('<p id="name-error" class="text-danger">Name field is required</p>');
                $("#Fname").addClass('is-invalid');
            }else{
                $("#name-error").remove();
                $("#Fname").removeClass('is-invalid');
                $("#Fname").addClass('is-valid');
            }

           if(email == ""){
                $("#email").after('<p id="email-error" class="text-danger">Email field is required</p>');
                $("#email").addClass('is-invalid');
            }else{
                $("#email-error").remove();
                $("#email").removeClass('is-invalid');
                $("#email").addClass('is-valid');
            }

            if(username == ""){
                $("#username").after('<p id="uname-error" class="text-danger">Username field is required</p>');
                $("#username").addClass('is-invalid');
            }else{
                $("#uname-error").remove();
                $("#username").removeClass('is-invalid');
                $("#username").addClass('is-valid');
            }

            if(password == ""){
                $("#password").after('<p id="pass-error" class="text-danger">Password field is required</p>');
                $("#password").addClass('is-invalid');
            }else{
                $("#pass-error").remove();
                $("#password").removeClass('is-invalid');
                $("#password").addClass('is-valid');
            }

        } else {

            var form = $(this);
            $("#registerBtn").button('loading');

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success:function(response) {

                    $("#registerBtn").button('reset');
                    $(".text-danger").remove();
                    $('.form-group').removeClass('is-invalid').removeClass('is-valid');


                    if(response.success == true)  { 

                        $("#registerForm")[0].reset();                                                                              
                        // shows a successful message after operation
                        $('.msgRegister').html('<div class="alert alert-success">'+
                            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                          '</div>');

                        // remove the mesages
                        $(".alert-success").delay(500).show(10, function(){
                            $(this).delay(3000).hide(10, function(){
                                $(this).remove();
                            });
                        }); // /.alert                              
                        
                    } else {
                        // shows a successful message after operation
                        $('.msgRegister').html('<div class="alert alert-warning">'+
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                        '<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
                        '</div>');

                        // remove the mesages
                        $(".alert-warning").delay(500).show(10, function() {
                            $(this).delay(3000).hide(10, function() {
                                $(this).remove();
                            });
                        }); // /.alert
                    }
                }
            });
        }
            
        return false;
    });
});