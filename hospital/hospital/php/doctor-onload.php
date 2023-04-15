  <div id="doctor-pres-med" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div class="modal-body" style="height:555px;overflow-y:auto;">
                        <div class="appointment-main dashboard-form">
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="title-box">
                                  <h2>Prescribe Medicine</h2>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12 col-md-12">
                                <div class="well-block">
                                              <form id="med-pris-form" method="post" enctype="multipart/form-data" onsubmit="return false;">
                                                  <!-- Form start -->
                                                  <div class="row">                               
                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                                <label class="control-label black" for="name">Medicine Name</label>
                                                                <style type="text/css">
                                                                  .select2 {
                                                                    width:100% !important;
                                                                    height:40px !important;
                                                                  }
                                                                </style>
                                                                <select id="medicineInput" name="appointmentfor" class="form-control">
                                                                  <?php 
                                                                    include "../include/config.pharma.php";
                                                                    $query = "SELECT id,productName FROM products";
                                                                    $query_run = mysqli_query($conn,$query);
                                                                    while($rows = mysqli_fetch_assoc($query_run)){
                                                                      echo '<option value="'.$rows['id'].'">'.$rows['productName'].'</option>';
                                                                    }
                                                                  ?>                 
                                                                </select>
                                                              <!-- 
                                                              <input id="medicineInput" value="" name="name" type="Text" placeholder="Name" class="form-control input-md med-control"> -->
                                                              
                                                          </div>
                                                      </div>

                                                      <div class="col-md-12">
                                                          <div class="form-group lad-6">                                              
                                                              <label class="control-label black" for="name">Take Medicine</label>
                                                                
                                                                <select id="prescribed-time" name="appointmentfor" style="width:100%;border-radius:4px;" class="">
                                                                  <option value="after">After eating</option>
                                                                  <option value="before">Before eating</option>                  
                                                                </select>                                                              
                                                              
                                                          </div>
                                                          
                                                      </div>
                                                      
                                                      <div class="col-md-12" >
                                                         <div style="width:70%;float:left;margin-top:20px">
                                                            <div class="form-group">
                                                                Morning : 
                                                                <input value="morning" name="checkbox" type="checkbox" placeholder="Name" class="check-med">
                                                                Afternoon : 
                                                                <input value="afternoon" name="checkbox" type="checkbox" placeholder="Name" class="check-med">
                                                                Night : 
                                                                <input value="evening" name="checkbox" type="checkbox" placeholder="Name" class="check-med">
                                                            </div>
                                                          </div>
                                                          <div style="width:29%;float:left;">
                                                             <button  type="submit" class="btn btn-trans"><span style="font-size:25px;color:white;">+</span></button>
                                                          </div> 
                                                      </div>
                                                      
                                                                                                       

                                                      <div class="container-fluid">
                                                        <div id="med-pris-primary" class="row">
                                                          <table class="align-table">
                                                            <thead>
                                                              <tr>
                                                                <th rowspan="2">medicine Name</th>
                                                                <th colspan="3">Time</th>
                                                                <th rowspan="2">Set</th>
                                                                <th rowspan="2"></th>
                                                              </tr>
                                                              <tr >
                                                                <th>Morning</th>
                                                                <th>Afternoon</th>
                                                                <th>Evening</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              
                                                            </tbody>
                                                          </table>

                                                        </div>
                                                      </div>
                                                      <div id="med-pres-resoponse" class="col-md-12">
                                                        
                                                      </div>
                                                      
                                                      <div class="col-md-12 border-pres">
                                                        <button id="submit-medicine" type="button" class="btn btn-success button-pres">Submit</button>
                                                      </div>
                                                      <div>
                                                        
                                                      </div>

                                                  </div>
                                              </form>
                                              <!-- form end -->
                                          </div>
                              </div>
                            </div>
                          </div>
                        </div>

        </div>
      </div>
    </div>
  </div>