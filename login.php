<?php session_start();?>

   

<div class="container" style="margin-top: 50px;">
  <div class="row">
    <div class="col-md-12">
    <h3 align="center"> Form Login </h3>
     <form  name="formlogin" action="cheacklogin.php" method="POST" id="login" class="was-validated">
              <div class="row">
              <label class="col-md-4" style="text-align:right">  </label>
                <div class="col-md-4">
                <input type="text"  name="m_user"  class="form-control is-invalid" id="validationText" required placeholder="Username" />
                </div>
                </div>
 
                <br>
              <div class="row">
              <br>
              <label class="col-md-4" style="text-align:right">  </label>
                <div class="col-md-4">
                     <input type="password" name="m_pass"  class="form-control is-invalid" id="floatingInputInvalid"  />
            </div>
              </div>
   
                <div class="col-md-4"> </div>
              &nbsp; &nbsp; &nbsp; <br /> 
              <div class="col-md-12">
              <p align="center">
              <button type="submit" class="btn btn-primary" id="btn" value="Signin"> เข้าสู่ระบบ </button> 
              </p>
              </div>
              <br>
              
            </form>
      </div>
    </div>
  </div>
