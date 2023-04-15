  <div id="myModalX" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content" style="height:100px;width:200px;margin: 0 auto;background-color: transparent;">
       <br/><br/><img src="images/loading.gif" style="height:90px;width:90px;margin-left: auto;margin-right: auto;display:block">
       <h4 style="text-align:center;color:brown;font-size:20px">Processing Please Wait</h4>
      </div>
    </div>
  </div>




  <div id="myModalmsg" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div class="modal-body">
            <!-- <img src="images/success.png" width="40px"> -->
            <img src="images/success.png" width="40px">
            <span style="font-size:15px;font-family:bold;text-align:center">Account has been successfully created!</span>               
        </div>
      </div>
    </div>
  </div> 
  
  <div id="myModalPR" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div class="modal-body">            
            <span style="font-size:15px;font-family:bold;text-align:center"><?php if(isset($_SESSION['response'])) { echo $_SESSION['response'] ;}  ?></span>               
        </div>
      </div>
    </div>
  </div> 


  <div id="myModaledit" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div id="reschedule-unit" class="modal-body" style="max-height:555px;overflow-y:auto;">
                        <div class="appointment-main dashboard-form">
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="title-box">
                                  <h2>Reschudule</h2>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12 col-md-12">
                                <div class="well-block">
                                              <style type="text/css">
                                                .button-success {
                                                  color: #fff !important;
                                                  background-color: #28a745 !important;
                                                  border-color: #28a745 !important;
                                                }
                                                .button-danger {
                                                  color: #fff !important;
                                                  background-color: #dc3545 !important;
                                                  border-color: #dc3545 !important;
                                                  margin-left:15px;
                                                }
                                                h1{
                                                  padding-left:54px
                                                }
                                              </style>
                                              <form id="reschedule-form" method="post" enctype="multipart/form-data">
                                                  <!-- Form start -->
                                                  <div class="row">

                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label class="control-label black" for="name">Date</label>
                                                              <input id="res-date" value="" name="name" type="date" placeholder="Name" class="form-control input-md">
                                                          </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label class="control-label black" for="date">Preferred Time</label>
                                                              <input id="res-time-main" name="date" type="text" class="form-control input-md time-format">
                                                          </div>
                                                      </div>

                                                      <div class="col-md-12">
                                                          <div id="load-reschedule" class="form-group" style="margin-bottom:0px">
                                                              <img style="margin: 0px auto; display:none;height:50px;width:50px" src="../images/load-med.gif">
                                                          </div>
                                                      </div>

                                                      <div class="col-md-12">
                                                          <div id="re-response" class="form-group">
                                                              
                                                          </div>
                                                      </div>
                                                      
         

                                                      <!-- Button -->
                                                      <div style="display: block;margin:0px auto">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <button id="reschedule-button" type="button" name="singlebutton" class="btn button-success">Reschudule</button>
                                                            </div>
                                                        </div>
                                                        <h1>OR</h1>
                                                        <div  class="col-md-12">
                                                            <div class="form-group">
                                                                <button name="singlebutton" type="button" class="btn button-danger" data-toggle="modal" data-target="#myModal_cancel">Cancel</button>
                                                            </div>
                                                        </div>
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



  <div id="myModalmsg" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div class="modal-body">
            <img src="images/success.png" width="40px">
            <span style="font-size:15px;font-family:bold;text-align:center">Account has been successfully created!</span>               
        </div>
      </div>
    </div>
  </div> 
  
<!--   modal for medecine priscription  -->
  <div id="myModal-pris" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div id="medicine-unit" class="modal-body" style="height:520px;overflow-y:auto;">
                        <div class="appointment-main dashboard-form">
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="title-box">
                                  <h2>Medicine</h2>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div id="medicine-pris"  class="col-lg-12 col-md-12">
                                <div class="container">
                                        <img style="margin: 0px auto 0px auto;display:block;height:60px;width:60px" src="../images/load-med.gif">
                                </div>       
                                              
                                <div class="well-block">
                                      
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

        </div>
      </div>
    </div>
  </div>



  <div id="myModal_cancel" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          ARE YOU SURE YOU WANT TO CACEL THE APPOINTMENT?
        </div>
        <div class="modal-footer" style="background-color:lightgreen">
            <input id="cancel-app" type="button" class="btn btn-danger" name="submit@04" value="YES">
            <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
        </div>
      </div>
    </div>
  </div>


  <!--   modal for medecine priscription  -->
  <div id="myModal-change" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!-- <h4 class="modal-title" style="text-align:center;">DECLARE HOLIDAY</h4> -->
        </div>
        <div id="doctor-change-unit" class="modal-body" style="height:400px;overflow-y:auto;">
                        <div class="appointment-main dashboard-form">
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="title-box">
                                  <h2>Change Doctor</h2>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div id="doc-change-sec"  class="col-lg-12 col-md-12">
                                <div class="container">
                                        <img style="margin: 0px auto 0px auto;display:block;height:60px;width:60px" src="../images/load-med.gif">
                                </div>       
                                              
                                <div class="well-block">
                                      
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

        </div>
      </div>
    </div>
  </div>





