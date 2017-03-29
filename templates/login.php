<?php require('header.php') ?>


  <?php if(!empty($errors)): ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($errors as $error): ?>  
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            <?=$error?><br>
        <?php endforeach; ?>
    </div>        
  <?php endif; ?>


<form method="POST" class="well">
    <label>Login</label>
    <input name="login" type="text" />
    <label>Password</label>
    <input name="password" type="password" />
    <div style="padding-top: 10px;">
    <button type="submit" class="btn">
        Login
    </button>
    </div>
</form>

<?php require('footer.php') ?>