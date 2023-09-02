var quizTab;

$(document).ready(function(){

	quizTab = $("#quizTable").DataTable({
		ajax: 'action/fetchQuiz.php',
		'order': []
	});

	$("#newQuiz").click(function(){

		$('#quiz_modal .modal-title').html('Add New Quiz');
		$('#quiz_modal #quizForm').get(0).reset();
        $('#quiz_modal #quizForm').attr('action','action/saveQuiz.php');
	});


	$("#quizForm").unbind('submit').bind('submit', function(){

		$(".text-danger").remove();
        $('.form-group').removeClass('is-invalid').removeClass('is-valid');

        var title = $("#title").val();
        var point = $("#point").val();
        var level = $("#level").val();

        if(title == "" || point == "" || level == ""){

        	if(title == ""){
                $("#title").after('<p id="title-error" class="text-danger">Title field is required</p>');
                $("#title").addClass('is-invalid');
            }else{
                $("#title-error").remove();
                $("#title").removeClass('is-invalid');
                $("#title").addClass('is-valid');
            }

           if(point == ""){
                $("#point").after('<p id="point-error" class="text-danger">Point field is required</p>');
                $("#point").addClass('is-invalid');
            }else{
                $("#point-error").remove();
                $("#point").removeClass('is-invalid');
                $("#point").addClass('is-valid');
            }

            if(level == ""){
                $("#level").after('<p id="level-error" class="text-danger">Level field is required</p>');
                $("#level").addClass('is-invalid');
            }else{
                $("#level-error").remove();
                $("#level").removeClass('is-invalid');
                $("#level").addClass('is-valid');
            }

        } 
        else {

        	var form = $(this);
        	$("#quizBtn").button('loading');

        	$.ajax({
        		url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'JSON',
                success:function(response){

                	$("#quizBtn").button('reset');
                	$(".text-danger").remove();
        			$('.form-group').removeClass('is-invalid').removeClass('is-valid');

        			if(response.success == true){

        				$("#quizForm")[0].reset();                                                                              
                        // shows a successful message after operation
                        $('.quizAlert').html('<div class="alert alert-success">'+
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                        '</div>');

                        quizTab.ajax.reload(null,false);

                        // remove the mesages
                        $(".alert-success").delay(500).show(10, function(){
                            $(this).delay(3000).hide(10, function(){
                                $(this).remove();
                            });
                        }); // /.alert 
        			} 
                    else {

        				$('.quizAlert').html('<div class="alert alert-warning">'+
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
						'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                        '</div>');

                        // remove the mesages
                        $(".alert-success").delay(500).show(10, function(){
                            $(this).delay(3000).hide(10, function(){
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

function editQuiz(quizID = null){

    $('#quiz_modal .modal-title').html('Update Quiz');
    $('#quiz_modal #quizForm').get(0).reset();
    $('#quiz_modal #quizForm').attr('action','action/saveQuiz.php');

    if(quizID){

        $("#quizID").remove();

        $.ajax({
            url: 'action/selectedQuiz.php',
            type: 'POST',
            data: {quizID : quizID},
            dataType: 'JSON',
            success:function(response){

                var title = $("#title").val(response.Title);
                var point = $("#point").val(response.point);
                var level = $("#level").val(response.level);

                $('.quiz_footer').after('<input type="hidden" name="quizID" id="quizID" value="'+quizID+'"/>');

                $("#quizForm").unbind('submit').bind('submit', function(){

                    $(".text-danger").remove();
                    $('.form-group').removeClass('is-invalid').removeClass('is-valid');

                    var title = $("#title").val();
                    var point = $("#point").val();
                    var level = $("#level").val();

                    if(title == "" || point == "" || level == ""){

                        if(title == ""){
                            $("#title").after('<p id="title-error" class="text-danger">Title field is required</p>');
                            $("#title").addClass('is-invalid');
                        }else{
                            $("#title-error").remove();
                            $("#title").removeClass('is-invalid');
                            $("#title").addClass('is-valid');
                        }

                       if(point == ""){
                            $("#point").after('<p id="point-error" class="text-danger">Point field is required</p>');
                            $("#point").addClass('is-invalid');
                        }else{
                            $("#point-error").remove();
                            $("#point").removeClass('is-invalid');
                            $("#point").addClass('is-valid');
                        }

                        if(level == ""){
                            $("#level").after('<p id="level-error" class="text-danger">Level field is required</p>');
                            $("#level").addClass('is-invalid');
                        }else{
                            $("#level-error").remove();
                            $("#level").removeClass('is-invalid');
                            $("#level").addClass('is-valid');
                        }

                    } else {

                        var form = $(this);
                        $("#quizBtn").button('loading');

                        $.ajax({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: form.serialize(),
                            dataType: 'JSON',
                            success:function(response){

                                $("#quizBtn").button('reset');
                                $(".text-danger").remove();
                                $('.form-group').removeClass('is-invalid').removeClass('is-valid');

                                if(response.success == true){
                                                                              
                                    // shows a successful message after operation
                                    $('.quizAlert').html('<div class="alert alert-success">'+
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                                    '</div>');

                                    quizTab.ajax.reload(null,false);

                                    // remove the mesages
                                    $(".alert-success").delay(500).show(10, function(){
                                        $(this).delay(3000).hide(10, function(){
                                            $(this).remove();
                                        });
                                    }); // /.alert 
                                } else {

                                    $('.quizAlert').html('<div class="alert alert-warning">'+
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                                    '</div>');

                                    // remove the mesages
                                    $(".alert-success").delay(500).show(10, function(){
                                        $(this).delay(3000).hide(10, function(){
                                            $(this).remove();
                                        });
                                    }); // /.alert 
                                }
                            }
                        });


                    }
                    return false;
                });
            }
        });
    } else {
        alert("error!! Refresh the page again");
    }
}

function delQuiz(quizID = null){

    if(quizID){

        $('#quizID').remove();
        $('.remove-footer').after('<input type="hidden" name="quizID" id="quizID" value="'+quizID+'"/>');

        $("#removeBtn").unbind('click').bind('click', function(){

            $("#removeBtn").button('loading');

            $.ajax({
                url: 'action/removeQuiz.php',
                type: 'POST',
                data: {quizID : quizID},
                dataType: 'JSON',
                success:function(response){
                    console.log(response);

                    if(response.success == true){

                        $("#remove_quiz").modal('hide');
                        quizTab.ajax.reload(null,false);

                        $('.msgRemove').html('<div class="alert alert-success">'+
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                        '</div>');

                        $(".alert-success").delay(500).show(10, function() {
                            $(this).delay(3000).hide(10, function() {
                                $(this).remove();
                            });
                        }); // /.alert
                    }
                }
            });


        });

    } else {
        alert("error!! Refresh the page again");
    }
}
