<form action="<?php echo URL ?>login/run" method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" value="admin" autocomplete="off" class="form-control" id="username" name="username">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" value="admin" autocomplete="off" class="form-control" id="pwd" name="password">
    </div>
    <div class="form-group form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> Remember me
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>