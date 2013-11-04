<?php if(isset($_GET['error'])): ?>
    <div class="alert window">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <strong><i class="icon-warning-sign"></i>input error!</strong>  Please try again!
    </div>
<?php endif; ?>
<div class = "section">
    <div class = "wrapper">
        <h1>Settings</h1>
        <p>If you would like to delete your profile please enter your password.</p>
        <br><br>
        <form method='POST' action='users/p_settings_delete'>
            <table>
                <tr>
                    <th>
                        <label for="password">Password</label>
                    </th>
                    <td>
                        <input type='password' name='password' id = "password">
                    </td>
                </tr>
            </table>
            <input type='submit' value='Delete Profile'>
        </form>
    </div>
</div>


