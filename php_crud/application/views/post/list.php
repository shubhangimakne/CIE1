<!doctype html>
<html lang="en">

<head>
  <?php $this->load->view('includes/header'); ?>
  <title>Penalty/Incentive</title>
  <!-- Datatable CSS -->
  <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

<!-- jQuery Library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Datatable JS -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Your AJAX call
            $.ajax({
                url: 'post/update',
                method: 'POST',
                data: {PenInc_No: 'PenInc_No',},
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status === 'error') {
                        alert(result.message);
                    } else {
                        echo "added";
                    }
                }
            });
        });
    </script>
</head>
<style>
#incidentTable{
   /* width: 20px; */
}
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 80%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 2px;
  width: auto;
}
/* .my-custom-scrollbar {
position: relative;
height: 400px;
overflow: auto;
} */
.table-wrapper-scroll-y {
display: block;
}
tr:nth-child(even){background-color: #f2f2f2}
.search{
  right: 4px; 
  position:absolute;

}
</style>



<!-- <button type="button" class="btn btn-success" onclick="downloadExcel()"> Download Excel Report </button> -->
<body>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 my-5">
  
            <!-- <button type="button" class="btn btn-outline-primary">Primary</button> -->
        <h2 class="text-center mb-3">Employee Penalty/Incentive List</h2>
      </div>
    </div>
    <div class="row d-flex justify-content-between mb-3 text-center">
      <div class="col-md-12">
      <?php echo $this->session->flashdata('message'); ?>
    </div>
      <div class="col-md-2 mt-2 ">
        <h5></h5>
      </div>
    
      <div class="col-md-4 mt-2">
    <div class='form-group'>
      <form method="post" action="<?php echo base_url('post/searchByEId'); ?>">
    
    <input type="text" name="eid" id="eidInput" class="form-control" placeholder="Search by Employee Id"><br>
   
    <button type="submit" class='btn btn-primary'>Search</button>
  </form>
  </div>
  </div>


      <div class="col-md-4 mt-2">
        <?php 
        $attributes = array("class" => "form", "id" => "date_search_form"); 
        echo form_open("post/search", $attributes);
        ?> 
       <div class="form-group">
           <input type="text" class="form-control" id="PenInc" name="PenInc" placeholder="Search by id">
       </div>
       <div>
        <div>
          
       <input id="btn_search" name="btn_search" type="submit" class="btn btn-primary" value="search" />
          <a href="<?php echo base_url() . "index.php/post/index"; ?>" class="btn btn-primary">Show All</a>
        </div>
       <?php echo form_close(); ?> 

</div>
      </div>
      <div class="col-md-2 mt-2 ">
        <a href="<?= base_url('post/create') ?>" class="btn btn-success"> <i class="fas fa-plus"></i>Add Penalty</a>
        <button type="button" class="btn btn-outline-primary"onclick="downloadExcel()"><i class="fa fa-download mr-2" ></i>Excel</button>
      </div>
    </div>
    <div  class=" table-wrapper-scroll-y my-custom-scrollbar">
      <table id="incidentTable" class="table table-bordered table-sm justify-content-start">
        <thead id="incidentTable" class="thead-light" style="width: 80% !important;">
          <tr>
            <th >#</th>
            <!-- <th>id</th> -->
            <th>PenInc_No</th>
              <th >EId</th>
              <th >PenIncDate</th>
              <th >Penyear</th>
              <th >Penmonth</th>
              <th >Type</th>
              <th >Amount</th>
              <th >Reason</th>
              <th >ReportingPerson</th>
              <th >Remark</th>
              <th >ApproveAmount</th>
              <th >EmpStatus</th>
              <?php
                if ('incidentTable'==true){
                
                ?>
              <th id="action">Action</th>
              <?php 
            }
             ?>
            </tr>
          </thead>

          <tbody>

            <?php $i = 1; foreach ($data as $post) { ?>

              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $post->PenInc_No; ?></td>
                <td><?php echo $post->EId; ?></td>
                <td><?php echo $post->PenIncDate; ?></td>
                <td><?php echo $post->Penyear; ?></td>
                <td><?php echo $post->Penmonth; ?></td>
                <td><?php echo $post->Type; ?></td>
                <td><?php echo $post->Amount; ?></td>
                <td><?php echo $post->Reason; ?></td>
                <td><?php echo $post->ReportingPerson; ?></td>
                <td><?php echo $post->Remark; ?></td>
                <td><?php echo $post->ApproveAmount; ?></td>
                <td><?php echo $post->EmpStatus; ?></td>
                
                <?php
                if ('incidentTable'==true){
                
                ?>
                <td>
                  <a href="<?= base_url('post/edit/' . $post->PenInc_No) ?>" class="btn btn-primary">Edit<i class="fas fa-edit"></i></a>
                  <a href="<?= base_url('post/delete/' . $post->PenInc_No) ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete<i class="fas fa-trash"></i></a>
                </td>
                  <?php
                 }
                  ?>
              </tr>

            <?php $i++; } ?>

          </tbody>

        </table>
    
        </div>

      </div>
    </div>
  </div>
  


  <!-- Script -->
  <script type="text/javascript">
     $(document).ready(function(){
        $('#empTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          'ajax': {
             'url':'<?=base_url()?>/post/list'
          },
          'columns': [
             { data: 'id' },
             { data: 'PenInc_No' },
             { data: 'EId' },
             { data: 'PenIncDate' },
             { data: 'Penyear' },
             { data: 'Penmonth' },
             { data: 'PenInc_No' },
             { data: 'Type' },
             { data: 'Amount' },
             { data: 'Reason' },
             { data: 'ReportingPerson' },
             { data: 'Remark' },
             { data: 'ApproveAmount' },
             { data: 'EmpStatus' },
          ]
        });
     });
     </script>

<script>
function downloadExcel() {
            // Select the table excluding the Edit and Delete columns
            var table = document.getElementById("incidentTable");
            var rows = table.querySelectorAll("tr");

            var headerData = Array.from(table.querySelectorAll("th")).slice(0, -1).map(th => th.innerText.trim());
            var jsonData = [headerData];

            // Iterate through rows and cells to build the JSON data
            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].querySelectorAll("td");
                var rowData = [];

                // Exclude columns with indices 12 (Edit) and 13 (Delete)
                for (var j = 0; j < cells.length; j++) {
                    if (j !== 13) {
                        rowData.push(cells[j].innerText.trim());
                    }
                }

                jsonData.push(rowData);
            }

            // Create a workbook with a worksheet from the JSON data
            var wb = XLSX.utils.book_new();
            var ws = XLSX.utils.json_to_sheet(jsonData, { skipHeader: true });

            // Add the worksheet to the workbook
            XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');

            // Save the workbook as an Excel file
            XLSX.writeFile(wb, 'Penalty.xlsx');
        }
</script>

<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
   // Check if the flash message is present
   var flashMessage = "<?php echo $this->session->flashdata('message'); ?>";

   if (flashMessage) {
      // Display the message
      var flashDiv = document.createElement('h5');
      flashDiv.innerHTML = flashMessage;
      flashDiv.className = 'flash-message';
      //document.body.appendChild(flashDiv);

      // Remove the message after 5 seconds (adjust the duration as needed)
      setTimeout(function() {
         flashDiv.remove();
         // Redirect to the same page after removing the message
         window.location.href = "<?php echo base_url(); ?>";
      }, 2000);
   }
</script>




<!-- In your_search_results_view.php -->
<?php if (!empty($data)) : ?>
    
    <ul>
        <?php foreach ($data as $post) : ?>
            <!-- <li><?php echo $post->EId; ?> - <?php echo $post->EId; ?></li> -->
            <!-- Replace 'OtherColumn' with the actual column name you want to display -->
        <?php endforeach; ?>
    </ul>
<?php else : ?>
    <center><h5>No results found.</h5></center>
<?php endif; ?>


<!-- In your view -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Your script for autocomplete -->
<script>
$(document).ready(function() {
    $("#eidInput").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "<?php echo base_url('post/autocompleteEId'); ?>",
                dataType: "json",
                data: {
                    term: request.term,
                    timestamp: timestamp
                },
                success: function(data) {
                    if (data.timestamp > lastTimestamp) {
                        lastTimestamp = data.timestamp;
                        response(data.suggestions);
                    }
            });
        },
        minLength: 2
    });
});
</script>


<?php $this->load->view('includes/footer'); ?>
</body>

</html>


