$('#doc-app').on('click',function() {
      $.post("../include/dashboard-doctor/appointment-main.php",{view:""},
        function(data) {
        $('#sec-secondary').html(data);
        // $("#myModalX").modal('hide');       
      });
});


//paste data for profile change 
$('#pat-profile').on('click', function() {           
$('#sec-secondary').html("<br/><br/><br/><br/><br/><img style='width:50px;height:50px;display:block;margin: 39px auto;' src='../images/load-med.gif' />"); 
      $.post("../include/dashboard-patient/profile-change.php",{},
        function(data) {
        $('#sec-secondary').html(data);
        // $("#myModalX").modal('hide');       
      });
});

//paste data for profile change 
$('#doc-homecare').on('click', function() {           
$('#sec-secondary').html("<br/><br/><br/><br/><br/><img style='width:50px;height:50px;display:block;margin: 39px auto;' src='../images/load-med.gif' />"); 
      $.post("../include/dashboard-doctor/homecare-appointment.php",{},
        function(data) {
        $('#sec-secondary').html(data);
        // $("#myModalX").modal('hide');       
      });
});



// js for appointment-search-main
                  medicine_pres = {};
                  med_count = 0;
                  $("#med-pris-primary").on('click','.remove-item .removable' ,function() {
                    
                    $(this).parent().parent().fadeTo( "slow" , 0.3, function() {
                      $(this).remove();
                    }); 
                    delete medicine_pres[this.value];                     
                      med_count -= 1; 
                      if(!med_count){
                        $('#doctor-pres-med .align-table tbody').append('<tr><td colspan="6"><span style="color:red;text-align:center;">Nothing yet</span></td><tr>');
                      }                          
                  });

                  $("#med-pris-form").on('submit',function() {
                    var med = $('#medicineInput').val();
                    var med_show = $('#medicineInput option:selected').text();
                    var med_time = $('#prescribed-time').val();
                    var check;
                    var med_search = {};
                    var count_yes = 0;
                    var send = '<tr class="remove-item"><td>'+med_show+'</td>';
                    med_search["medicine"] = med;
                    $('.check-med').each(function(){
                      check = $(this).val();
                      if($(this).is(':checked')){
                          if(!(check == 'morning' || check == 'afternoon' || check == 'evening' )){
                            alert("Problem occured!1");
                            return false;
                          }
                          else {
                            send += '<td>YES</th>';
                            med_search[check] = "YES";
                            count_yes += 1;
                          }                        
                      }
                      else {
                        send += '<td>NO</th>';
                        med_search[check] = "NO";
                      }
                    });
                    if(!count_yes){
                      alert("At least one time should be choosen");
                      return false;
                    }
                    if(!(med_time == 'before' || med_time == 'after')){
                      alert('Problem Occured!2');
                      return false;
                    }
                    med_search['time'] = med_time;
                    send += '<td>'+med_time+'</td>';
                    if(!(med=='')){
                      medicine_pres[med_count] = med_search;
                      if(!med_count){
                        $('#med-pris-primary .align-table tbody').empty();
                      }
                      $('#med-pris-primary .align-table tbody').append(send+'<td><button type="button" value="'+med_count+'" class="removable"><span style="margin-bottom:3px">-</span></button></td></tr>');
                      med_count += 1;
                    }
                    return false;
                  });

                  $("#submit-medicine").on('click',function() {
                    de = sessionStorage.getItem("detail_pres");
                    if(med_count){
                        $.post("../include/dashboard-doctor/submit-medicine.php", {sent : JSON.stringify(medicine_pres), de : JSON.stringify(de)},
                          function(data) {
                            $('#med-pres-resoponse').html(data);      
                        });
                      
                    }
                    else {
                      alert('At least One medicine shouold be prescribed!');
                    }
                  });

            //end