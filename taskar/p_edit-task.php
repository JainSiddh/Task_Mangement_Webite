<?php

require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}

// check admin
$user_role = $_SESSION['user_role'];

$p_task_id = $_GET['p_task_id'];



if(isset($_POST['update_p_task_info'])){
    $obj_admin->update_p_task_info($_POST,$p_task_id, $user_role);
}

$page_name="Edit Task";
include("include/sidebar.php");

$sql = "SELECT * FROM p_task_info WHERE p_task_id='$p_task_id' ";
$info = $obj_admin->manage_all_info($sql);
$row = $info->fetch(PDO::FETCH_ASSOC);

?>

<!--modal for employee add-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="well">
                <h3 class="text-center bg-primary" style="padding: 7px;">Edit Task </h3><br>

                      <div class="row">
                        <div class="col-md-12">
                          <form class="form-horizontal" role="form" action="" method="post" autocomplete="off">
                            <div class="form-group">
			                    <label class="control-label col-sm-5">Task Title</label>
			                    <div class="col-sm-7">
			                      <input type="text" placeholder="Task Title" id="p_task_title" name="p_task_title" list="expense" class="form-control" value="<?php echo $row['p_t_title']; ?>" readonly <?php } ?> val required>
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label class="control-label col-sm-5">Task Description</label>
			                    <div class="col-sm-7">
			                      <textarea name="p_task_description" id="p_task_description" placeholder="Text Description" class="form-control" rows="5" cols="5"><?php echo $row['p_t_description']; ?></textarea>
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label class="control-label col-sm-5">Start Time</label>
			                    <div class="col-sm-7">
			                      <input type="text" name="p_t_start_time" id="p_t_start_time"  class="form-control" value="<?php echo $row['p_t_start_time']; ?>">
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label class="control-label col-sm-5">End Time</label>
			                    <div class="col-sm-7">
			                      <input type="text" name="p_t_end_time" id="p_t_end_time" class="form-control" value="<?php echo $row['p_t_end_time']; ?>">
			                    </div>
			                  </div>

			                   <div class="form-group">
			                    <label class="control-label col-sm-5">Status</label>
			                    <div class="col-sm-7">
			                      <select class="form-control" name="p_status" id="p_status">
			                      	<option value="0" <?php if($row['p_status'] == 0){ ?>selected <?php } ?>>Incomplete</option>
			                      	<option value="1" <?php if($row['p_status'] == 1){ ?>selected <?php } ?>>In Progress</option>
			                      	<option value="2" <?php if($row['p_status'] == 2){ ?>selected <?php } ?>>Completed</option>
			                      </select>
			                    </div>
			                  </div>
                            
                            <div class="form-group">
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-3">
                                
                              </div>

                              <div class="col-sm-3">
                                <button type="submit" name="update_p_task_info" class="btn btn-success-custom">Update Now</button>
                              </div>
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


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

	<script type="text/javascript">
	  flatpickr('#p_t_start_time', {
	    enableTime: true
	  });

	  flatpickr('#p_t_end_time', {
	    enableTime: true
	  });

	</script>


<?php

include("include/footer.php");

?>

