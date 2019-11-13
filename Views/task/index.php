<div id="calendar"></div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title" style="float: left;">Tasks</h3>
        <div class="card-tools" style="float: right">
            <a href="<?php echo URL ?>task/create" class="btn btn-info">Create task</a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
            <tr>
                <th style="width: 1%">#</th>
                <th style="width: 20%">Task Name</th>
                <th>Task Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th style="width: 8%" class="text-center">Status</th>
                <th style="width: 20%">
                </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['tasks'] as $task) { ?>
                <tr>
                    <td>#</td>
                    <td>
                        <a><?php echo $task['name']; ?></a><br>
                        <small>Created <?php echo $task['created_at']; ?></small>
                    </td>
                    <td class="task-desc"><?php echo $task['description']; ?></td>
                    <td class="task-desc"><?php echo explode(' ', $task['start_date'])[0]; ?></td>
                    <td class="task-desc"><?php echo explode(' ', $task['end_date'])[0]; ?></td>
                    <td class="task-state">
                        <?php
                        $status = $task['status'];
                        if ($status == 1) {
                            ?><span class="badge badge-info">Planning</span><?php
                        } else if ($status == 2) {
                            ?><span class="badge badge-primary">Doing</span><?php
                        } else if ($status == 3) {
                            ?><span class="badge badge-success">Completed</span><?php
                        }
                        ?>

                    </td>
                    <td class="project-actions text-right">
                        <div class="btn-group">
                            <a href="<?php echo URL ?>task/show/<?php echo $task['id']; ?>" class="btn btn-xs btn-info">View</a>
                            <a href="<?php echo URL ?>task/edit/<?php echo $task['id']; ?>"
                               class="btn btn-xs btn-primary">Edit</a>
                            <a href="<?php echo URL ?>task/delete/<?php echo $task['id']; ?>"
                               class="btn btn-xs btn-danger">Remove</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<?php
$json = array();
foreach($data['tasks'] as $row)
{
    $json[] = array(
        'id'    => $row["id"],
        'title' => $row["name"],
        'start' => $row["start_date"],
        'end'   => $row["end_date"]
    );
}
?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var Calendar = FullCalendar.Calendar;
        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: <?php echo json_encode($json); ?>
        });
        calendar.render();
    });
</script>