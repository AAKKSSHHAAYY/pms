<!-- load header  -->
<?php $this->load->view('layout/header'); ?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col- col-lg-6">
         <?php if(!$projects_data){
             echo "You didn't Uploaded any project yet";
         } ?>
        </div>
    </div>
    <!-- Content Row -->
   
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $this->load->view('layout/footer'); ?>    