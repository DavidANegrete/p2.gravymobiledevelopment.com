<div class = "section">
    <div class = "wrapper">
       
        <h1>Log In</a></h1>
        
         <form method='POST' action='/users/p_login'>
            <table>
                    <th>
                        <label for="email">Email</label>
                    </th>
                    <td>
                        <input type='text' name='email' id = "email">
                    </td>
                </tr>
                <tr>
                    <th>
                        <label for="password">Password</label>
                    </th>
                    <td>
                        <input type='password' name='password' id = "password">
                    </td>
                </tr>
            </table>
            <tr>
                <?=$GLOBALS['error']?>
            </tr>
            <input type='submit' value='Enter'>
        </form>
    </div>
</div>

