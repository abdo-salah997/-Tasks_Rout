<?php include "../back/header.php";
include "../back/ProductsController.php";
include "../back/CategoryController.php";
?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">View Products</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Products</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
            <?php
                  if(isset($_SESSION['done']))
                  {
                      ?>
                      <div class="alert alert-success" role="alert">
                          <?php
                          echo $_SESSION['done'];
                          unset($_SESSION['done']);

                          ?>
                      </div>
                      <?php
                  }

            if(isset($_SESSION['error']))
            {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);

                    ?>
                </div>
                <?php
            }
            ?>
                <div class="card-header bg-dark">
                    <h3 class="card-title">Products list</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Img</th>
                                <th>Slug</th>
                                <th>Corresponding Category id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $getProducts = ProductsController::getProducts();
                                while ($row = $getProducts->fetch()) {
                                ?>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['title'] ?></td>
                                    <td><img src="../../images/<?php echo $row['img'] ?>" width="45px" alt=""></td>
                                    <td><?php echo $row['slage'] ?></td>
                                    <td> <?php
                                            $categoryId = $row['category-id'];
                                            $getTypeCatigory = CategoryController::getTypeCatigory($categoryId);
                                            echo $getTypeCatigory['name'];?>
                                    </td>
                                    <td>
                                        <a href="#editEmployeeModal<?php echo $row['id'] ?>" class="edit" data-toggle="modal" title="Edit">
                                            <i class="text-warning  far fa-edit fa-2x" data-toggle="tooltip"></i>
                                        </a>

                                        <a href="#deleteEmployeeModal<?php echo $row['id'] ?>" class="delete ml-2" data-toggle="modal">
                                            <i class="text-danger far fa-trash-alt fa-2x" data-toggle="tooltip" title="Delete"></i>
                                        </a>
                                    </td>
                                    <!-- Edit Modal HTML -->
                                    <div id="editEmployeeModal<?php echo $row['id'] ?>" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="../back/ProductsController.php" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Product Info</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" name="name" class="form-control" value="<?php echo $row['title'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <!-- form-control-file -->
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Img</label>
                                                                    <input type="hidden" name="oldImage" value="<?php echo $row['img'] ?>">
                                                                    <input type="file" name="image" class="form-control-file">
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Slug</label>
                                                                    <input type="text" name="slug" class="form-control" value="<?php echo $row['slage'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Category id</label>

                                                                    <select required="required" class="form-control" name="CategoryId" aria-label="Default select example">
                                                                    <option value="">Select Category</option>
                                                                       
                                                                       <?php
                                                                        $getCatigory = CategoryController::getCatigory();
                                                                        while($category = $getCatigory->fetch()){
                                                                        ?>
                                                                            <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="editId" value="<?php echo $row['id']?>">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                        <input type="submit" name="updateProduct" class="btn btn-info" value="update">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal HTML -->
                                    <div id="deleteEmployeeModal<?php echo $row['id'] ?>" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="../back/ProductsController.php" method="POST">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Category</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete these Records?</p>
                                                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="deleteId" value="<?php echo $row['id'] ?>">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                        <input type="submit" name="deleteProduct" class="btn btn-danger" value="Delete">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../back/footer.php" ?>