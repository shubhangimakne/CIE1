<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Add New Post</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<style>
  /* .col-lg-4{
    float: left;
  width: 50%;
  padding: 10px;
  height: 100px; */
  /* } */
  /* body{
    border:solid;
    border-color:blue;
    width:200px;
    align:center;
    margin: left 20px;
  } */
  /* .form-group{
    align:center;
  } */
  body{
    outline: 0.5rem solid khaki;
    margin: 2rem;
  padding: 1rem;
  }
</style>

<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


  <div class="container">
    <div class="row">

      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3"> Add Penalty/Incentive</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">

        <div class="d-flex justify-content-between ">
          
          
        </div>
      </div>
      <form method="post" action="<?php echo base_url('post/store'); ?>">
      <div class="row">
          <!-- <div class="col-lg-3">
            <div class="form-group">
             <label>TyreNumber:</label>
             <input class="form-control" type="text" name="TyreNumber:"required>
            </div>
          </div> -->
          <!-- <div class="col-lg-4">
            <div class="form-group">
             <label>PenInc_No</label>
             <input class="form-control" type="text" name="PenInc_No"required>
            </div>
          </div> -->
          <div class="col-lg-4">
            <div class="form-group">
             <label>EId</label>
             <input class="form-control" type="text" name="EId"required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>PenIncDate</label>
             <input class="form-control" type="date" name="PenIncDate"required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>Penyear</label>
             <select id="year" name="Penyear">
                <option value="year">Select year</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>Penmonth </label>
             <select id="Penmonth" name="Penmonth">
                <option value="month">Select month</option>
                <option value="1">JAN</option>
                <option value="2">FEB</option>
                <option value="3">MAR</option>
                <option value="4">APR</option>
                <option value="5">MAY</option>
                <option value="6">JUN</option>
                <option value="7">JUL</option>
                <option value="8">AUG</option>
                <option value="9">SEP</option>
                <option value="10">OCT</option>
                <option value="11">NOV</option>
                <option value="12">DEC</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>Type</label>
             <select id="Type" name="Type">
                <option value="select">select</option>
                <option value="Pnality">Pnality</option>
                <option value="Incentive">Incentive</option>
                <option value="Salary Hold">Salary Hold</option>
                <option value="Salary Difference">Salary Difference</option>
                <option value="TDS Deduction">TDS Deduction</option>
                <option value="Advance">Advance</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>Amount</label>
             <input class="form-control" type="text" name="Amount"required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>Reason</label>
             <textarea rows="" cols="" class="form-control" type="text" name="Reason"required></textarea>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>ReportingPerson</label>
             <input class="form-control" type="text" name="ReportingPerson"required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>Remark</label>
             <input class="form-control" type="text" name="Remark"required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>ApproveAmount</label>
             <input class="form-control" type="text" name="ApproveAmount"required>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group">
             <label>EmpStatus</label>
             <input class="form-control" type="text" name="EmpStatus"required>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group text-center">
             <button type="submit" class="btn btn-primary"> <i class="fas fa-check"></i> Submit </button>
             <a class="btn btn-primary" href="<?php echo base_url(); ?>">Back</a>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    // <script>
    //   $(document).ready(function(){
    //     <?php if(session()->getFlashdata('message')){ ?>
    //       swal({
    //         title: "<?= session()->getFlashdata('message') ?>",
    //         text: "<?= session()->getFlashdata('message_text') ?>",
    //         icon: "<?= session()->getFlashdata('message_icon') ?>",
    //         button: "OK",
    //   });


    //     <?php } ?>
    //   });
  </script>


  
  <?php $this->load->view('includes/footer'); ?>

</body>

</html>