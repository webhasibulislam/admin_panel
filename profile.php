<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
    $userid   = Session::get('userId');
    $userrole = Session::get('userRole');
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>User Profile</h2>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $cat = mysqli_real_escape_string($db->link, $_POST['cat']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        
        $query = "UPDATE tbl_post 
                SET
                cat = '$cat',
                title = '$title',
                body = '$body',
                author = '$author',
                tags = '$tags'
                WHERE id = '$postid' ";
            $updated_row = $db->update($query);
            if($updated_row){
                echo "<span class='success'>Post Updated Successfully</span>";
            } else{
                echo "<span class='error'>Post Not Updated !!</span>";
            }
        }

?>
                <div class="block">               
<?php
    $query ="SELECT * FROM tbl_user WHERE id='$userid' AND role='$userrole' ";
    $getuser = $db->select($query);
    if($getuser){
        while($result = $getuser->fetch_assoc()){
?>
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                    <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
                     
                        <tr>
                            <td>
                                <label>Username</label>
                            </td>
                            <td>
                                <input type="text" name="username" value="<?php echo $result['username']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name='email' value="<?php echo $result['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        
                        
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea name="details" class="tinymce">
                                    <?php echo $result['details']; ?>
                                </textarea>
                            </td>
                        </tr>
                        
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
         <?php } } ?>  
                </div>
            </div>
        </div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
</script>
<?php include "inc/footer.php"; ?>
