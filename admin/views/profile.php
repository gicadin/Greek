<div class="container-fluid">
  
  <form id="admin_profileForm" class="form-horizontal">
    <fieldset>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="user">User Name</label>
        <div class="col-md-4">
          <input id="user" name="user" type="text" class="form-control input-md" value="<?php echo $profile['user']; ?>">
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="fname">First Name</label>
        <div class="col-md-4">
          <input id="fname" name="fname" type="text" class="form-control input-md" value="<?php echo $profile['fname']; ?>">
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="lname">Last Name</label>
        <div class="col-md-4">
          <input id="lname" name="lname" type="text" class="form-control input-md" value="<?php echo $profile['lname']; ?>">
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="email">Email</label>
        <div class="col-md-4">
          <input id="email" name="email" type="text" class="form-control input-md" value="<?php echo $profile['email']; ?>">
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="address">Address</label>
        <div class="col-md-4">
          <input id="address" name="address" type="text" class="form-control input-md" value="<?php echo $profile['address']; ?>">
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="address">Phone Number</label>
        <div class="col-md-4">
          <input id="telephone" name="telephone" type="text" class="form-control input-md" value="<?php echo $profile['telephone']; ?>">
        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="name">Password</label>
        <div class="col-md-4">
          <input id="name" name="password" type="password" value="" class="form-control input-md" >
        </div>
      </div>

      <!-- Submit button -->
      <div class="form-group">
        <div class="col-md-4 col-md-offset-4">
          <input class="btn btn-primary" id="admin_profileEditFormButton" type="submit" value="Apply">
        </div>
      </div>

    </fieldset>

  </form>

</div>
