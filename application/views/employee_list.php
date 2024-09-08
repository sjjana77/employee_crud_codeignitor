<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Employee List</title>
</head>
<body>
    <div class="container mt-5">
        <h2>Employee List</h2>
        <?php if($this->session->flashdata('msg')): ?>
            <div class="alert alert-success"><?php echo $this->session->flashdata('msg'); ?></div>
        <?php endif; ?>
        <a href="<?php echo base_url('employees/add'); ?>" class="btn btn-primary mb-3">Add Employee</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Reporting Officer</th>
                    <th>Department</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee['id']; ?></td>
                    <td><?php echo $employee['name']; ?></td>
                    <td><?php echo $employee['email']; ?></td>
                    <td><?php echo $employee['reporting_officer']; ?></td>
                    <td><?php echo $employee['department']; ?></td>
                    <td><?php echo $employee['role']; ?></td>
                    <td>
                        <a href="<?php echo base_url('employees/edit/'.$employee['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?php echo base_url('employees/delete/'.$employee['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
