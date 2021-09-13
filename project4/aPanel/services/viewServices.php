<?php include "../back/header.php";
include "../back/ServicesController.php";
?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Services Section</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Services</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header bg-secondary">
                    <h3 class="card-title">Services list</h3>

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
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Img</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getServices = $services::getServices();
                            while ($row = $getServices->fetch()) {
                            ?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><img src="../../Images/<?php echo $row['img'] ?>" width="45px" alt=""></td>
                                    <td><span class="text-wrap"><?php echo $row['descraption'] ?></span></td>
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
                                                <form action="../back/ServicesController.php" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Update Service Info</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="imgUpdate">Img</label>
                                                                    <input type="hidden" name="oldImage" value="<?php echo $row['img'] ?>">
                                                                    <input type="file" name="image" class="form-control-file" id="imgUpdate">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea class="form-control" rows="3" name="descraption" placeholder="Enter ..."><?php echo $row['descraption'] ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="editId" value="<?php echo $row['id'] ?>">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                        <input type="submit" name="updateServiece" class="btn btn-info" value="update">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete Modal HTML -->
                                    <div id="deleteEmployeeModal<?php echo $row['id'] ?>" class="modal fade">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="../back/ServicesController.php" method="POST">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Delete Category</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete these Records?</p>
                                                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="serviceId" value="<?php echo $row['id'] ?>">
                                                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                        <input type="submit" name="deleteServiece" class="btn btn-danger" value="Delete">
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