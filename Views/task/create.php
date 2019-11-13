<form action="<?php echo URL;?>task/run" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" autocomplete="off" class="form-control" placeholder="Name of task" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control" id="description" cols="30" rows="4"
                  placeholder="Description of task"></textarea>
    </div>

    <div class="form-group">
        <label for="status">Description:</label>
        <select name="status" required id="status" class="form-control">
            <option value="0">--Select Status--</option>
            <option value="1">Planning</option>
            <option value="2">Doing</option>
            <option value="3">Completed</option>
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
        <button type="submit" class="btn btn-info">Create</button>
    </div>
</form>