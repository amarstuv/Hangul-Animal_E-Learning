var questTab;
var quiz_id;

$(document).ready(function(){

	quiz_id = $("#quiz_id").val();

    questTab = $("#questionTable").DataTable({
        ajax: {
            url: 'action/fetchQuestion.php',
            type: 'POST',
            data: {quiz_id : quiz_id},
            dataType: 'JSON'
        },

        'order':[]
    });

    // $('.is_right').each(function(){
    //     $(this).click(function(){
    //         $('.is_right').prop('checked',false);
    //         $(this).prop('checked',true);
    //     });
    // });

    $("#newQuestion").click(function(){

        $("#questionID").remove();

        $('#question_modal .modal-title').html('Add New Question');
        $('#question_modal #questionForm').get(0).reset();
    });

    // ajax for uploading file
    $("#questionForm").unbind('submit').bind('submit', function(e){

        e.preventDefault();

        var form = $(this);
        var formData = new FormData(this);

        $("#questBtn").button('loading');

        $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: formData,
                dataType: 'JSON',
                cache: false,
				contentType: false,
				processData: false,
                success:function(response){

                    $("#questBtn").button('reset');

                    if(response.success == true){

                        $("#questionForm")[0].reset();                                                                              
                        // shows a successful message after operation
                        $('.questionMsg').html('<div class="alert alert-success">'+
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                        '</div>');

                        questTab.ajax.reload(null,false);

                        // remove the mesages
                        $(".alert-success").delay(500).show(10, function(){
                            $(this).delay(300).hide(10, function(){
                                $(this).remove();
                            });
                        }); // /.alert 
                    } 
                    else {

                        $('.questionMsg').html('<div class="alert alert-warning">'+
                        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
                        '</div>');

                        // remove the mesages
                        $(".alert-success").delay(500).show(10, function(){
                            $(this).delay(300).hide(10, function(){
                                $(this).remove();
                            });
                        }); // /.alert 
                    }

                }
            });
        
        return false;
    });
});


function editQuestion(questID = null){

    $('#question_modal .modal-title').html('Edit Question');


    //$('#question_modal .modal-footer').after('<input type="hidden" name="questionID" id="questionID" value="'+questID+'"/>');
    
    if(questID){

        $("#questionID").remove();

        $.ajax({
            url: 'action/selectedQuest.php',
            type: 'POST',
            data: {questID: questID},
            dataType: 'JSON',
            success:function(response){

                // var image = response.qdata.media;
                // var imgData = atob(image);

                $("#question").val(response.qdata.question);
                // $("#getImage").after('<img width="150" src="data:image/png;base64,'+ imgData + '" alt="Image" >');

                // Object.keys(response.qdata).map(i=>{
                //     var xdata = response.qdata[i];
                //     $("#question").val(xdata.question);
                // });

                Object.keys(response.odata).map(k=>{
                    var data = response.odata[k];
                    $('[name="question_opt['+k+']"]').val(data.option_answer);
                    if(data.right_answer == 1)
                    $('[name="is_right['+k+']"]').prop('checked',true);
                });

                $('#question_modal .modal-footer').after('<input type="hidden" id="questionID" name="questionID" value="'+questID+'">');
            }
        });

    } 
}

function delQuestion(questID = null){

    if(questID){

        $('#questionID').remove();
        $('.remove-footer').after('<input type="hidden" name="questionID" id="questionID" value="'+questID+'"/>');

        $("#removeBtn").unbind('click').bind('click', function(){

            $("#removeBtn").button('loading');

            $.ajax({
                url: 'action/removeQuestion.php',
                type: 'POST',
                data: {questID : questID},
                dataType: 'JSON',
                success:function(response){
                    console.log(response);

                    if(response.success == true){

                        $("#remove_question").modal('hide');
                        questTab.ajax.reload(null,false);

                        $('.msgQuest').html('<div class="alert alert-success">'+
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

    }

}