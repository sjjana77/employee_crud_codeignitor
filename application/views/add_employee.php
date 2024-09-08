<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Employee</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Add Employee</h2>
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <form action="<?php echo base_url('employees/add'); ?>" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name'); ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
            </div>
            <div class="form-group">
                <label for="reporting_officer">Reporting Officer</label>
                <input type="text" class="form-control" id="reporting_officer" name="reporting_officer" value="<?php echo set_value('reporting_officer'); ?>">
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" value="<?php echo set_value('department'); ?>">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo set_value('role'); ?>">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</body>
</html>
