locationPage = document.location.href.split('public');
$(function() {

    $("#registeration_event").click(function(){

        $.ajax({
            type    : "POST",
            url     : locationPage[0]+"public/api/register_event/1",
            data    : 'eventid=1'
        }).done(function(data){
            console.log(data);
            if(data == 'true'){
                $("#registeration_event").hide();
            }
        });

    });

    $("#cancel_registeration_event").click(function(){
        /*a faire*/
    });

});