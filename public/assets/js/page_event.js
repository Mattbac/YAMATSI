locationPage = document.location.href.split('public');

$(function() {

    $("#registeration_event").click(function(){

        $.ajax({
            type    : "POST",
            url     : locationPage[0]+"public/api/register_event/",
            data    : 'eventid='+$("#registeration_event").data("event-id")
        }).done(function(data){
            if(data == true){
                $("#registeration_event").hide();
                $("#cancel_registeration_event").show();
            }
        });
    });

    $("#cancel_registeration_event").click(function(){

        $.ajax({
            type    : "POST",
            url     : locationPage[0]+"public/api/cancel_registeration_event/",
            data    : 'eventid='+$("#cancel_registeration_event").data("event-id")
        }).done(function(data){
            if(data == true){
                $("#cancel_registeration_event").hide();
                $("#registeration_event").show();
            }
        });
    });

    $("#add_comment").click(function(){
        $("#add_new_comment").empty();
        $(".add_answer_comment").next().empty();
        $("#add_new_comment").append('<label for="title">Titre de votre commentaire</label>');
        $("#add_new_comment").append('<input id="title" type="text" name="title">');
        $("#add_new_comment").append('<label for="com">Contenu de votre commentaire</label>');
        $("#add_new_comment").append('<textarea name="com" id="com"></textarea>');
        $("#add_new_comment").append('<input id="submitCom" type="submit" name="submit" value="Envoyer votre commentaire">');
    });

    $(document).on("click","#submitCom",function(e){

        $.ajax({
            type    : "POST",
            url     : locationPage[0]+"public/api/send_com/",
            data    : 'event_id='+$(this).parent().data('event-id')+'&title='+$(this).prev().prev().prev().val()+'&message='+$(this).prev().val()
        }).done(function(data){
            if(data == 1){
                $("#add_new_comment").empty();
            }
        });
    });

    $(".add_answer_comment").click(function(){
        $(".add_answer_comment").next().empty();
        $("#add_new_comment").empty();
        $(this).next().append('<label for="answer_com">Contenu de votre commentaire</label>');
        $(this).next().append('<textarea name="answer_com" id="answer_com"></textarea>');
        $(this).next().append('<input id="submitAnswerCom" type="submit" name="submit" value="Envoyer votre commentaire">');
    });

    $(document).on("click","#submitAnswerCom",function(e){

        $.ajax({
            type    : "POST",
            url     : locationPage[0]+"public/api/send_com/",
            data    : 'event_id='+$(this).parent().data('event-id')+'&com_id='+$(this).parent().data('com-id')+'&message='+$(this).prev().val()
        }).done(function(data){
            if(data == 1){
                $(".add_answer_comment").next().empty();
            }
        });
    });

});