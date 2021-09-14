<?php include "../back/header.php"; ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 px-2">
            <div class="col-sm-6">
                <h2 class="text-secondary">Add Education Details</h2>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="viewEdu.php">view Education</a></li>
                    <li class="breadcrumb-item active">Education</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Add Education Data</h3>
        </div>
        <div class="card-body">
            <form action="../back/EductionController.php" method="POST">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Year</label>
                            <input type="number" required name="year" class="form-control" placeholder="Enter ...">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>University</label>
                            <input type="text" name="university" class="form-control" placeholder="Enter ...">
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
                    <button name="submitEduction" type="addCate" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php include "../back/footer.php" ?>