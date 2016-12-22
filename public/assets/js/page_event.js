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

    $(document).on("click","#add_comment",function(){
        $("#add_new_comment").empty();
        $(".add_answer_comment").next().empty();
        $("#add_new_comment").append('<label for="title">Titre de votre commentaire</label>');
        $("#add_new_comment").append('<input id="title" type="text" name="title">');
        $("#add_new_comment").append('<label for="com">Contenu de votre commentaire</label>');
        $("#add_new_comment").append('<textarea name="com" id="com"></textarea>');
        $("#add_new_comment").append('<input id="submitCom" type="submit" name="submit" value="Envoyer votre commentaire">');
        $("#add_new_comment").append('<input class="cancel" type="submit" name="cancel" value="X">');
    });

    $(document).on("click","#submitCom",function(e){
        message = $(this).prev().val();
        title = $(this).prev().prev().prev().val();
        $.ajax({
            type    : "POST",
            dataType: 'json',
            url     : locationPage[0]+"public/api/send_com/",
            data    : 'event_id='+$(this).parent().data('event-id')+'&title='+$(this).prev().prev().prev().val()+'&message='+$(this).prev().val()
        }).done(function(data){
            console.log(data);
            if(data['validate'] == true){
                $('.comment').append('<h3>Titre : '+title+'</h3><div class="comment-content"><p data-com-id="'+data['com']['id']+'">'+message+'</p><p>Auteur : <a href="/YAMATSI/public/user/'+data['com']['users_id']+'">'+data['nickname']+'</a></p><button class="editanswer">Editer</button><div class="answer_edit_comment" data-event-id="'+data['com']['event_id']+'" data-com-id="'+data['com']['id']+'"></div></div></div></div>');
                $("#add_new_comment").empty();
            }
        });
    });

    $(document).on("click",".add_answer_comment",function(){
        $(".add_answer_comment").next().empty();
        $("#add_new_comment").empty();
        $(this).next().append('<label for="answer_com">Contenu de votre commentaire</label>');
        $(this).next().append('<textarea name="answer_com" id="answer_com"></textarea>');
        $(this).next().append('<input id="submitAnswerCom" type="submit" name="submit" value="Envoyer votre commentaire">');
        $(this).next().append('<input class="cancel" type="submit" name="cancel" value="X">');
    });

    $(document).on("click","#submitAnswerCom",function(){
        classdivanswer = $(this).parent().prev().prev();
        message = $(this).prev().val();
        $.ajax({
            type    : "POST",
            dataType: 'json',
            url     : locationPage[0]+"public/api/send_com/",
            data    : 'event_id='+$(this).parent().data('event-id')+'&com_id='+$(this).parent().data('com-id')+'&message='+$(this).prev().val()
        }).done(function(data){
            console.log(data);
            if(data['validate'] == true){
                $(classdivanswer).append('<div class="comment-content"><p data-com-id="'+data['com']['id']+'">'+message+'</p><p>Auteur : <a href="/YAMATSI/public/user/'+data['com']['users_id']+'">'+data['nickname']+'</a></p><button class="editanswer">Editer</button><div class="answer_edit_comment" data-event-id="'+data['com']['event_id']+'" data-com-id="'+data['com']['id']+'"></div>');
                $(".add_answer_comment").next().empty();
            }
        });
    });

    $(".editanswer").click(function(){
      $(".editanswer").next().empty();
      $(this).next().append('<label for="editAnswer_com">Edition de votre commentaire</label>');
      $(this).next().append('<textarea name="editAnswer_com" id="editAnswer_com">'+$(this).prev().prev().text()+'</textarea>');
      $(this).next().append('<input id="submitEditAnswerCom" type="submit" name="submitEditCom" value="Envoyer votre commentaire">');
      $(this).next().append('<input class="cancel" type="submit" name="cancel" value="X">');
    });

    $(document).on("click","#submitEditAnswerCom",function(){
        pprev = $(this).parent().prev().prev().prev();
        pval = $(this).prev().val();
        $.ajax({
            type    : "POST",
            url     : locationPage[0]+"public/api/edit_com/",
            data    : 'event_id='+$(this).parent().data('event-id')+'&com_id='+$(this).parent().prev().prev().prev().data('com-id')+'&message='+$(this).prev().val()
        }).done(function(data){
            if(data == 1){
                $(pprev).text(pval);
                $(".answer_edit_comment").empty();
            }
        });
    });

    $(document).on("click",".cancel",function(){
        $(".answer_edit_comment").empty();
        $("#add_new_comment").empty();
    });

});
