<!-- load header  -->
<?php $this->load->view('layout/header'); ?>
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col- col-lg-6">
            <?php echo "<div class='error_msg'>";
            echo  validation_errors('<p class="alert alert-danger">', '</p>');
            echo "</div>"; 
            ?>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="heading col-lg-6">
            <h4 class="text-center">Upload your project</h4>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-6">
            <?php echo form_open('user/dashboard/save_project',array("enctype"=>"multipart/form-data")); ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Projects Name</label>
                <input type="text" class="form-control" name="project_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your project name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Project Descriptions</label>
                <textarea name="decription" class="form-control" id="exampleInputPassword1" id="" cols="20" rows="5" placeholder="Write your project description.. whats it for?"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Made by</label>
                <input type="text" name="made_by" class="form-control" id="exampleInputPassword1" placeholder="Who made this project..? solo or group">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Written in</label>
                <textarea name="written_in" class="form-control" id="exampleInputPassword1" id="" cols="20" rows="5" placeholder="eg:-html,php,javascript,python etc"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Upload your project Zip file</label>
                <input name="ufile" type="file" id="ufile" size="50" />
                <span>Max size should be 50 mb</span>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php $this->load->view('layout/footer'); ?>