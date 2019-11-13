<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float: left;"><?php echo $data['task']['name']; ?></h3>
        <div class="card-tools" style="float: right">
            <a href="<?php echo URL ?>task/edit/<?php echo $data['task']['id'] ?>" class="btn btn-info">Edit task</a>
        </div>
    </div>
    <div class="card-body">
        <div class="task task-name">
            Task name: <?php echo $data['task']['name']; ?>
        </div>
        <div class="task task-description">
            Task description: <?php echo $data['task']['description']; ?>
        </div>
        <div class="task task-start_date">
            Task start date: <?php echo explode(' ', $data['task']['start_date'])[0]; ?>
        </div>
        <div class="task task-end_date">
            Task start date: <?php echo explode(' ', $data['task']['end_date'])[0]; ?>
        </div>
    </div>
    <!-- /.card-body -->
</div>