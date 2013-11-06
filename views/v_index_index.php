<div class="section page">
    <div class="wrapper">
        <?php if($user):?>
            <h1>What's yappining? <?=$user->first_name?> </h1>
        <?php else: ?>
            <p>Welcome to yapper! Yapper let's you get your yapp on with your friends! Sign up or sign in to start yapping.</p>
       <?php endif; ?>
    </div>

</div>
