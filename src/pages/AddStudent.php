<?php
  if (! isset($_SESSION['hid']))
    header('location: Error403');
?>
<div class="container ms-1">
  <h1> Add a Student </h1>
  <em id="resptext"></em>
  <hr>
  <form id="myform" role="form" method="post" action="#">

    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="sid" name="sid" placeholder="Student ID">
      </div>
    </div>
    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="advisor_id" name="advisor_id" placeholder="Advisor ID">
      </div>
    </div>
    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
      </div>
    </div>
    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
      </div>
    </div>

    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
      </div>
    </div>


    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Birth Date">
      </div>
    </div>


    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Student Type">
      </div>
    </div>

    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender">
      </div>
    </div>

    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="is_placed" name="is_placed" placeholder="Residential Status?">
      </div>
    </div>


    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="nationality_id" name="nationality_id" placeholder="nationality">
      </div>
    </div>

    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="degree_id" name="degree_id" placeholder="degree_id">
      </div>
    </div>

    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="needs" name="needs" placeholder="Accomodations">
      </div>
    </div>

    <div class="form-group row">
      <!---<label for="name" class="col-sm-2 col-form-label">Name</label>--->
      <div class="centerField">
        <input type="text" class="form-control" id="ad_comment" name="ad_comment" placeholder="Comments">
      </div>
    </div>



    <!-- <div class="form-group row">
      <div class="centerField">
        <input type="submit" value="Add" name="submit" class="btn btn-primary buttonCustom" />
      </div> -->
    <!-- </div> -->

    <button id="fsub" class="btn btn-primary">Submit</button>
  </form>
</div>
<script>
  $("#fsub").click(function (e) {
    e.preventDefault();
    var x = $("#myform").serializeArray();
    var data = {};
    $("#myform input").each(function(i, elem) {
      data[elem.name] = elem.value;
    });
    $.post("php/SetStudent.php", data, function(res) {
      $("#resptext").html(res);
    });
  });
</script>
