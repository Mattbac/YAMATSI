$(function(){

    function form(datefirst, datelast){

        $('#dateinter').empty();
        myDatefirst=datefirst[2].split("-");
        myDatelast=datelast[2].split("-");
        first = (new Date(myDatefirst[0],myDatefirst[1],myDatefirst[2]).getTime())/1000 + (60*60*24);
        last = (new Date(myDatelast[0],myDatelast[1],myDatelast[2]).getTime())/1000;
        i = 2;
        while(first < last){
            newdate = new Date(first * 1000);
            $('#dateinter').append('<div><label for="hstart'+(i)+'">Horaire intermediaire</label>');
            $('#dateinter').append('<input type="time" name="hstart'+(i)+'" step="1800" id="hstart'+(i)+'" value="'+datefirst[0]+'">');
            $('#dateinter').append('<input type="time" name="hstop'+(i)+'" step="1800" id="hstop'+(i)+'" value="'+datefirst[1]+'">');
            $('#dateinter').append('<input type="date" name="hlast'+(i)+'" id="hdate'+(i)+'" value="'+(newdate.getFullYear()+'-'+((newdate.getMonth()+1 < 10) ? '0' : '')+(newdate.getMonth()+1)+'-'+newdate.getDate())+'"></div>');
            first += (60*60*24);
            i += 1;
        }
    }

    $('#adddates').on("click",function(){
        $('#datesup').append('<div><label for="hstartlast">Horaire de fin</label>');
        $('#datesup').append('<input type="time" name="hstartlast" step="1800" id="hstartlast">');
        $('#datesup').append('<input type="time" name="hstoplast" step="1800" id="hstoplast">');
        $('#datesup').append('<input type="date" name="hlastdate" id="hlastdate"></div>');
        $('#datesup').append('<div id="lastdate" class="adddates"><p>Valider la derniere date ?</p></div>');
        $('#datesup').show();
    })

    $(document).on("click","#lastdate",function(){
        if($('#hstartlast').val() != "" && $('#hstoplast').val() != "" && $('#hlastdate').val() != ""
        && $('#hstart1').val() != "" && $('#hstop1').val() != "" && $('#hdate1').val() != ""){
            form([$('#hstart1').val(), $('#hstop1').val(), $('#hdate1').val()], [$('#hstartlast').val(), $('#hstoplast').val(), $('#hlastdate').val()]);
        }else{
            $('#datesup').append('<p>Vous devez entrer des dates pour valider.</p>');
        }
    })

});