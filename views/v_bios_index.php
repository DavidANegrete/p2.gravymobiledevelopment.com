<?php foreach($bios as $bio): ?>
<?php endforeach; ?>

    <div class = "bio">

        <h1>Bio</h1>
        <div class = "wrapper">
            <p1 >School:  <?=$bio['school']?> </p1><br>
            <p1 >Hometown:  <?=$bio['hometown']?> </p1><br>
            <p1 >Hobbies:  <?=$bio['hobbies']?> </p1><br>

            #this code is working redirecting
            <a href='/bios/edit'>Edit</a>
       </div>
    </div>






















