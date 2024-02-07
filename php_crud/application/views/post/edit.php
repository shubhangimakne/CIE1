<!doctype html>
<html lang="en">
<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Edit Post</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 my-5">
        <h2 class="text-center mb-3"> </h2>
      </div>
      <div class="col-lg-12">
        <div class="d-flex justify-content-between ">
          <h4>Edit Pnalty/Incentive</h4>
          
        </div>
        <form method="post" action="<?php echo base_url('post/update/'.$data->PenInc_No); ?>">
          <div class="row">
            <div class="col-lg-3">
              <div class="form-group">
              <label>PenInc_No</label>
               <input class="form-control" type="text" name="PenInc_No"value="<?php echo $data->PenInc_No; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>EId</label>
               <input class="form-control" type="text" name="EId" value="<?php echo $data->EId; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>PenIncDate</label>
               <input class="form-control" type="date" name="PenIncDate"value="<?php echo $data->PenIncDate; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>Penyear</label>
               <input class="form-control" type="text" name="Penyear"value="<?php echo $data->Penyear; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>Penmonth</label>
               <input class="form-control" type="text" name="Penmonth"value="<?php echo $data->Penmonth; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>Type</label>
               <input class="form-control" type="text" name="Type"value="<?php echo $data->Type; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>Amount</label>
               <input class="form-control" type="text" name="Amount"value="<?php echo $data->Amount; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>Reason</label>
               <textarea class="form-control" type="text" name="Reason"value="<?php echo $data->Reason; ?>"></textarea>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>ReportingPerson</label>
               <input class="form-control" type="text" name="ReportingPerson"value="<?php echo $data->ReportingPerson; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>Remark</label>
               <input class="form-control" type="text" name="Remark"value="<?php echo $data->Remark; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>ApproveAmount</label>
               <input class="form-control" type="text" name="ApproveAmount"value="<?php echo $data->ApproveAmount; ?>">
              </div>
            </div>
            <div class="col-lg-3">
              <div class="form-group">
               <label>EmpStatus</label>
               <input class="form-control" type="text" name="EmpStatus"value="<?php echo $data->EmpStatus; ?>">
              </div>
            </div>
            <div class="col-lg-12">
            <div class="form-group">
              <button type="submit" class="btn btn-success"> <i class="fas fa-check"></i> Save </button>
              <a class="btn btn-primary" href="<?php echo base_url(); ?>">Back</a>
            </div>
            </div>
           
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
      $(document).ready(function(){
        <?php if(session()->getFlashdata('message')){ ?>
          swal({
            title: "<?= session()->getFlashdata('message') ?>",
            text: "<?= session()->getFlashdata('message_text') ?>",
            icon: "<?= session()->getFlashdata('message_icon') ?>",
            button: "OK",
      });


        <?php } ?>
      });
</script>

  <?php $this->load->view('includes/footer'); ?>

</body>

</html>

