<?php include "../include/config.inc.php"; ?>

  <div id="myModalMsg" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div id="" class="modal-body" style="height:auto;overflow-y:auto;">
                   <p id="msgfromadmin" style="color:black;text-align:center;size:15px;"><p>     
        </div>
      </div>
    </div>
  </div>


  <div id="myModalOption" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div id="" class="modal-body" style="height:400px;overflow-y:auto;">
                        <div class="appointment-main dashboard-form">
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="title-box">
                                  <h2>OPTIONS</h2>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12 col-md-12">
                                <div class="well-block">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalSign">SignIn</button>   
                                    
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalBranch">Add Branch</button>         
                                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
        </div>
      </div>
    </div>
  </div>

  <div id="myModalBranch" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div id="" class="modal-body" style="height:500px;overflow-y:auto;">
                        <div class="appointment-main dashboard-form">
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="title-box">
                                  <h2>Add Branch</h2>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12 col-md-12">
                                <div class="well-block">
                                  <form method="post" action="../include/dashboard-admin/set-branch.php"> 
                                      <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label black" for="name">Branch Name</label>
                                            <input value="" name="name" type="Text" placeholder="Branch Name" class="form-control input-md med-control" required>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label black" for="name">Branch Contact Number</label>
                                            <input value="" name="number" type="Text" placeholder="Contact Number" class="form-control input-md med-control" required>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label black" for="name">Branch Address</label>
                                            <input value="" name="address" type="Text" placeholder="Address" class="form-control input-md med-control" required>
                                        </div>
                                      </div>


                                      <div class="col-md-12 border-pres">
                                        <button id="" type="submit" class="btn btn-success button-pres">Add Branch</button>
                                      </div>
                                  </form> 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
        </div>
      </div>
    </div>
  </div>

  






  <div id="myModalSign" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header modal_bk_color">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div id="" class="modal-body" style="height:555px;overflow-y:auto;">
                        <div class="appointment-main dashboard-form">
                          <div class="container">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="title-box">
                                  <h2>SignIn</h2>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12 col-md-12">
                                <div class="well-block">

                                  <!-- strating section -->

                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="control-label black" for="name">User Email</label>
                                          <input value="" name="name" type="Text" placeholder="User Email" class="form-control input-md med-control">
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="control-label black" for="name">User Name</label>
                                          <input value="" name="name" type="Text" placeholder="User Name" class="form-control input-md med-control">
                                      </div>
                                    </div>


                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="control-label black" for="name">User DOB</label>
                                          <input value="" name="name" type="Text" placeholder="Date of Birthday" class="form-control input-md med-control">
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="control-label black" for="name">User moblie No.</label>
                                          <input value="" name="name" type="Text" placeholder="Mobile Number" class="form-control input-md med-control">
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="control-label black" for="name">User Branch</label>
                                          <select name="name" class="form-control input-md med-control">
                                            <?php 
                                              $query = "SELECT * FROM branches";
                                              $query_run = mysqli_query($con,$query);
                                              while($det = mysqli_fetch_assoc($query_run)){
                                                echo "<option value='".$det['branch_ID']."'>".$det['branch_name']."</option>";
                                              }
                                              
                                            ?>
                                            <!-- <option value="doctor">Doctor/physiotherapist</option>
                                            <option value="nurse">Nurse</option>
                                            <option vlaue="lab_assistant">Lab Assistant</option>
                                            <option value="sweeper">Sweeper</option>
                                            <option value="admin">Admin</option> -->
                                          </select>
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group">
                                          <label class="control-label black" for="name">User type</label>
                                          <select name="name" class="form-control input-md med-control">
                                            <option value="doctor">Doctor/physiotherapist</option>
                                            <option value="nurse">Nurse</option>
                                            <option vlaue="lab_assistant">Lab Assistant</option>
                                            <option value="sweeper">Sweeper</option>
                                            <option value="admin">Admin</option>
                                          </select>
                                      </div>
                                    </div>

                                    <div class="col-md-12 border-pres">
                                      <button id="" type="button" class="btn btn-success button-pres">SignIn</button>
                                    </div>
                                  <!-- end section -->


                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
        </div>
      </div>
    </div>
  </div>