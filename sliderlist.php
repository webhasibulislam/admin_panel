<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No</th>
							<th>Slider Title</th>
							<th>Slider Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php
	$query = " SELECT * FROM tbl_slider";
		$slider = $db->select($query);
		if($slider){
			$i = 0;
			while($result = $slider->fetch_assoc()){
				$i++;
?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><a href="editslider.php?sliderid=<?php echo $result['id'];?>"><?php echo $result['title']; ?></a></td>
							<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px" alt=""></td>
							
							<td>
								<a href="editslider.php?sliderid=<?php echo $result['id'];?>">Edit</a> 
									|| 
								<a onclick="return confirm('Are you Sure to Delete !')" href="deleteslider.php?sliderid=<?php echo $result['id'];?>">Delete</a> 
							</td>
						</tr>
			<?php }} ?>
					</tbody>
				</table>
	
               </div>
            </div>
        </div>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
<?php include "inc/footer.php"; ?>
