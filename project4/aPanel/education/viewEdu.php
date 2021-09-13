<?php include "../back/header.php";
include "../back/dbcont.php";
$data = $cont->prepare("SELECT * FROM `eduction`");
$data->execute();

?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Education Section</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Education</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Category list</h3>

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
                                <th>Title</th>
                                <th>Year</th>
                                <th>University</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row = $data->fetch()){
                                    ?>
                                    <tr>
                                        <td><?php echo $row['id']?></td>
                                        <td><?php echo $row['title']?></td>
                                        <td><?php echo $row['year']?></td>
                                        <td><?php echo $row['universty']?></td>
                                        <td><span class="text-wrap"><?php echo $row['descraption']?></span></td>
                                        <td>
                                            <a href="#editEmployeeModal<?php echo $row['id']?>" class="edit" data-toggle="modal" title="Edit">
                                                <i class="text-warning  far fa-edit fa-2x" data-toggle="tooltip"></i>
                                            </a>

                                            <a href="#deleteEmployeeModal<?php echo $row['id']?>" class="delete ml-2" data-toggle="modal">
                                                <i class="text-danger far fa-trash-alt fa-2x" data-toggle="tooltip" title="Delete"></i>
                                            </a>
                                        </td>
                                <!-- Edit Modal HTML -->
                                <div id="editEmployeeModal<?php echo $row['id']?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="../back/EductionController.php" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Education Info</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" name="title" value="<?php echo $row['title']?>" class="form-control" required>

                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label>Year</label>
                                                                <input type="number" name="year"  value="<?php echo $row['year']?>" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>University</label>
                                                                <input type="text" name="university"  value="<?php echo $row['universty']?>" class="form-control" required>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."><?php echo $row['descraption']?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input type="submit" name="submitEidt" class="btn btn-info" value="update">
                                                     <input type="hidden" name="editId" value="<?php echo $row['id']?>">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Delete Modal HTML -->
                                <div id="deleteEmployeeModal<?php echo $row['id']?>" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="../back/EductionController.php" method="POST">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Delete Category</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete these Records?</p>
                                                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                    <input type="submit" name="submitDelete" class="btn btn-danger" value="Delete">
                                                    <input type="hidden" name="deleteId" value="<?php echo $row['id']?>">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            <?php
                                }        
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "../back/footer.php" ?>