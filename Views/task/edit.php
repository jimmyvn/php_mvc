<form action="<?php echo URL;?>task/update/<?php echo $data['task']['id']; ?>" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" autocomplete="off" class="form-control" value="<?php echo $data['task']['name']; ?>" placeholder="Name of task" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="4"
                  placeholder="Description of task"><?php echo $data['task']['description']; ?></textarea>
    </div>

    <div class="form-group">
        <label for="status">Description:</label>
        <select name="status" required id="status" class="form-control">
            <option value="0">--Select Status--</option>
            <option value="1" <?php echo ($data['task']['status'] == 1) ? 'selected' : ''; ?>>Planning</option>
            <option value="2" <?php echo $data['task']['status'] == 2 ? 'selected' : ''; ?>>Doing</option>
            <option value="3" <?php echo $data['task']['status'] == 3 ? 'selected' : ''; ?>>Completed</option>
        </select>
    </div>

    <div class="form-group">
        <label>Date range:</label>

        <div class="input-group">
            <div class="input-group-prepend">
            <span class="input-group-text">
                <i class="far fa-calendar-alt"></i>
            </span>
            </div>
            <input type="text" required name="date" class="form-control float-right" id="reservation">
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-info">Update task</button>
    </div>
</form>
<script>
    $(function() {
        $('input#reservation').daterangepicker({
            startDate: '<?php echo $data['task']['start_date']; ?>',
            endDate: '<?php echo $data['task']['end_date']; ?>',
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    });
</script>
