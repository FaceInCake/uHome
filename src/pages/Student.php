<?php
    if (! isset($_SESSION["sid"]))
        header("location: Error403");
?>

<h2>Student Homepage</h2>
<br>
<?php
    require_once "php/SQL.php";
    $res = query("select fname, lname from student where sid = ?;", $_SESSION["sid"]);
    $res = $res->fetch_assoc();
?>
<em>Welcome <?=$res['fname']?> <?=$res['lname']?></em><hr>

<div id="info-modal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="info-title" class="modal-title">Loading...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="info-body" class="modal-body">
        <!-- Default Loading Spinner -->
        <div class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="button-list contianer"><div class="row">
    
    <div class="col-6 col-sm-4 p-2">
        <button class="btn btn-primary w-100" data-url="Invoices">
            <i class="fa fa-5x fa-list w-100" aria-hidden="true"></i>
            View Invoices
        </button>
    </div>
    
    <div class="col-6 col-sm-4 p-2">
        <button class="btn btn-primary w-100" data-url="Rooms">
            <i class="fa fa-5x fa-home w-100" aria-hidden="true"></i>
            My Room
        </button>
    </div>

    <div class="col-6 col-sm-4 p-2">
        <button class="btn btn-primary w-100" data-url="MyAdvisor">
            <i class="fa fa-5x fa-user-circle w-100" aria-hidden="true"></i>
            My Advisor
        </button>
    </div>

</div></div>

<script>
    // Fetch data and populate
    $(".button-list button").click(function(e) {
        var url = $(e.currentTarget).data('url');
        $("#info-title").html($(e.currentTarget).text());
        $.post("components/"+url+".php", function(res) {
            $("#info-body").html(res);
        });
        $("#info-modal").modal('show');
    });
    // Reset content
    $("#info-modal").on("hidden.bs.modal", function(e) {
        $("#info-title").html("Loading...");
        $("#info-body").html(
            "<div class='spinner-border text-info' role='status'>"
        +   "<span class='sr-only'>Loading...</span>"
        +   "</div>"
        );
    });

</script>
