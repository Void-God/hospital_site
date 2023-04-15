<?php 
  session_start();
  require "../config.inc.php";
?>

            <div id="doctor-appointment-primary" class="appointment-main dashboard-form">
              <div class="container">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="title-box">
                      <h2>Homecare</h2>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-md-12">
                    <div class="row"><div class="col-md-12"  style="text-align:right;"><span class="black">Show :</span> <select id="doc-app-select"><option value="today">today</option><option value="current">current</option><option value="previous">previous</option><option value="all">all</option></select></div></div>
                    
                    <div class="well-block">
                      
                                  
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript">

              $('#doc-app-select').on('change',function() {
                var viewtype = $('#doc-app-select').val();
                $('#doctor-appointment-primary .well-block').html("<img style='width:50px;height:50px;display:block;margin: 39px auto;' src='../images/load-med.gif' />"); 
                  $.post("../include/dashboard-doctor/homecare-appointment-search.php",{view:viewtype},
                  function(data) {
                    $('#doctor-appointment-primary .well-block').html(data);        
                  });
              });
              $('#doctor-appointment-primary .well-block').html("<img style='width:50px;height:50px;display:block;margin: 39px auto;' src='../images/load-med.gif' />"); 
              $.post("../include/dashboard-doctor/homecare-appointment-search.php",{view:""},
              function(data) {
                $('#doctor-appointment-primary .well-block').html(data);        
              });
                      
            </script>