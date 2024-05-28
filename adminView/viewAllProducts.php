
<div >
  <h2>Product Items</h2>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">logements Image</th>
        <th class="text-center">Image1</th>
        <th class="text-center">image2</th>
        <th class="text-center">image3</th>
        <th class="text-center">image4</th>
        <th class="text-center">lieu</th>
        <th class="text-center">Description</th>
        <th class="text-center">prix</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once "../config/dbconnect.php";
      $sql="SELECT * from product";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><img height='100px' src='<?=$row["product_image"]?>'></td>
      <td><img height='50px' src='<?=$row["image1"]?>'></td>
      <td><img height='50px' src='<?=$row["image2"]?>'></td>
      <td><img height='50px' src='<?=$row["image3"]?>'></td>
      <td><img height='50px' src='<?=$row["image4"]?>'></td>
      <td><?=$row["product_name"]?></td>
      <td><?=$row["product_desc"]?></td>      
      <td><?=$row["price"]?></td>     
      <td><button class="btn btn-primary" style="height:40px" onclick="itemEditForm('<?=$row['product_id']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="itemDelete('<?=$row['product_id']?>')">Delete</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary " style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Item</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' onsubmit="addItems()" method="POST">
            <div class="form-group">
              <label for="name">Product Name:</label>
              <input type="text" class="form-control" id="p_name" required>
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="number" class="form-control" id="p_price" required>
            </div>
            <div class="form-group">
              <label for="qty">Description:</label>
              <input type="text" class="form-control" id="p_desc" required>
            </div>

            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>
            <div class="form-group">
                <label for="file1">Choose image1:</label>
                <input type="file" class="form-control-file" id="file1">
            </div>
            <div class="form-group">
                <label for="file2">Choose image2:</label>
                <input type="file" class="form-control-file" id="file2">
            </div>
            <div class="form-group">
                <label for="file3">Choose image3:</label>
                <input type="file" class="form-control-file" id="file3">
            </div>
            <div class="form-group">
                <label for="file4">Choose image3:</label>
                <input type="file" class="form-control-file" id="file4">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" id="upload" style="height:40px">Add Item</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
   