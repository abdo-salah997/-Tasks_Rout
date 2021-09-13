<?php include "../back/header.php"; ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Add Service</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../index/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Add Service</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card card-success">
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
        <div class="card-header bg-secondary">
            <h3 class="card-title">Add Experince Data</h3>
        </div>
        <div class="card-body">
            <form action="../back/ServicesController.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="imgUpdate">Img</label>
                            <input type="file" name="image" class="form-control-file" id="imgUpdate">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="addCate" name="submitServices" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php include "../back/footer.php" ?>