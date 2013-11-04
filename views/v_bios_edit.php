<?php foreach($bios as $bio): ?>
    <?php $school= $bio['hobbies']; ?>
<?php endforeach; ?>


<div class = "section">
    <div class = "wrapper">

        <h1>Bio</a></h1>

        <form method='POST' action='/bios/p_edit'>
            <table>
                <tr>
                    <th>
                        <label for="school">School</label>
                    </th>
                    <td>
                        <input type='text' name='school' id = "school" > <?=$bio['school']?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="hometown">Hometown</label>
                    </th>
                    <td>
                        <input type='text' name='hometown' id = "hometown" value = > <?=$bio['hometown']?>
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="hobbies">Hobbies</label>
                    </th>
                    <td>
                        <input type='text' name='hobbies' id = "hobbies"  > <?=$bio['hobbies']?>
                    </td>
                </tr>
            </table>
            <input type='submit' value='Enter'>
        </form>
    </div>
</div>
