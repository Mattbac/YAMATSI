locationPage = document.location.href.split('public');
$(function(){

    function form(datefirst, datelast){

        $('#dateinter').empty();
        myDatefirst=datefirst[2].split("-");
        myDatelast=datelast[2].split("-");
        first = (new Date(myDatefirst[0],myDatefirst[1]-1,myDatefirst[2]).getTime())/1000 + (60*60*24);
        last = (new Date(myDatelast[0],myDatelast[1]-1,myDatelast[2]).getTime())/1000;
        i = 2;
        $('#dateinter').append('<label>Créneaux intermédiaires</label>');
        while(first < last){
            newdate = new Date(first * 1000);
            if(i>2){
              $('#dateinter').append('<div><hr>');
            }
            $('#dateinter').append('<input type="time" name="hstart'+(i)+'" step="1800" id="hstart'+(i)+'" value="'+datefirst[0]+'">');
            $('#dateinter').append('<input type="time" name="hstop'+(i)+'" step="1800" id="hstop'+(i)+'" value="'+datefirst[1]+'">');
            $('#dateinter').append('<input type="date" name="hdate'+(i)+'" id="hdate'+(i)+'" value="'+(newdate.getFullYear()+'-'+((newdate.getMonth() < 10) ? '0' : '')+(newdate.getMonth()+1)+'-'+((newdate.getDate() < 10) ? '0' : '')+newdate.getDate())+'"></div>');
            first += (60*60*24);
            i += 1;
        }
    }

    $('#adddates').on("click",function(){
        $('#datesup').empty();
        $('#datesup').append('<div><label for="hstartlast">Créneau de la dernière date</label>');
        $('#datesup').append('<input type="time" name="hstartlast" step="1800" id="hstartlast">');
        $('#datesup').append('<input type="time" name="hstoplast" step="1800" id="hstoplast">');
        $('#datesup').append('<input type="date" name="hlastdate" id="hlastdate"></div>');
        $('#datesup').append('<div id="lastdate" class="adddates"><p>Valider la derniere date ? <i class="fa fa-check" aria-hidden="true"></i></p></div>');
        $('#datesup').show();
    })

    $(document).on("click","#lastdate",function(){
        if($('#hstartlast').val() != "" && $('#hstoplast').val() != "" && $('#hlastdate').val() != ""
        && $('#hstart1').val() != "" && $('#hstop1').val() != "" && $('#hdate1').val() != ""){
            form([$('#hstart1').val(), $('#hstop1').val(), $('#hdate1').val()], [$('#hstartlast').val(), $('#hstoplast').val(), $('#hlastdate').val()]);
        }else{
            $('#message').remove();
            $('#datesup').append('<p class="alert"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Vous devez entrer des dates pour valider.</p>');
        }
    })

    $('#datesup').show();
    valideguest = 0;
    validepart = 0;
	timeguest = 0;
	timepart = 0;
    $('#guests').on("input", function(){
		valideguest++;
		timeguest = new Date().getTime();
	});

    $('#partners').on("input", function(){
		validepart++;
		timepart = new Date().getTime();
	});

	setInterval(function(){
		if(timeguest + 800 < new Date().getTime() && valideguest > 0){
			valideguest = 0;
			rechercheguest();
		}
	}, 400);

    setInterval(function(){
		if(timepart + 800 < new Date().getTime() && validepart > 0){
			validepart = 0;
			recherchepart();
		}
	}, 400);

  function rechercheguest(){
    if($('#guests').val() != ''){
      $.ajax({
        type: "GET",
        dataType: 'json',
        url: locationPage[0]+"public/api/search_guest/"+$('#guests').val()
      }).done(function(datas){
          console.log(datas);
        $('#findguest').empty();
        for(key in datas){
          $('#findguest').append("<p class=\"guest id"+datas[key]['id']+"\" data-id='"+datas[key]['id']+"'>"+datas[key]['nickname']+"</p>");
        }
      });
    }
  }

  function recherchepart(){
    if($('#partners').val() != ''){
      $.ajax({
        type: "GET",
        dataType: 'json',
        url: locationPage[0]+"public/api/search_part/"+$('#partners').val()
      }).done(function(datas){
          console.log(datas);
        $('#findpart').empty();
        for(key in datas){
          $('#findpart').append("<p class=\"part id"+datas[key]['id']+"\" data-id='"+datas[key]['id']+"'>"+datas[key]['nickname']+"</p>");
        }
      });
    }
  }

    $(document).on("click",".guest",function(){
        var cla = '.id'+$(this).data('id');
        $(cla).remove();
        $('#selectguest').append("<input class=\"guestpart\" type=\"text\" name=\"guestid"+$(this).data('id')+"\" value=\""+$(this).text()+"\" readonly>");
    })

    $(document).on("click",".part",function(){
        var cla = '.id'+$(this).data('id');
        $(cla).remove();
        $('#selectpart').append("<input class=\"guestpart\" type=\"text\" name=\"partid"+$(this).data('id')+"\" value=\""+$(this).text()+"\" readonly>");
    })

    $(document).on("click",".guestpart",function(){
        $(this).remove();
    })



});
