var quizList;

$(document).ready(function(){

	quizList = $("#quizTable").DataTable({
		ajax: 'action/fetchQuizStud.php',
		'order': []
	});

	$('.answer').each(function(){
		$(this).click(function(){
			$(this).find('input[type="radio"]').prop('checked',true)
			$(this).css('background','#00c4ff3d')
			$(this).siblings('li').css('background','white')
		});
	});

	$("#answer_sheet").unbind('submit').bind('submit', function(e){

		e.preventDefault()
		var form = $(this);
		$("#submitQuizBtn").button('loading');
		var quizID = $("#quiz_id").val();

		$.ajax({
			url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'JSON',
            success:function(response){

            	$("#submitQuizBtn").button('reset');

            	if(response.success == true) {
            		alert('You completed the quiz your score is '+response.score);
					window.location.href = 'view_answer.php?quiz_id='+quizID
            	} else {

            		 $('.msgQuiz').html('<div class="alert alert-warning">'+
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
	});
});