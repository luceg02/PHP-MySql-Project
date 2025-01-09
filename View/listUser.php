<div class="no-color-block big-block">
    <h2>List of users</h2>
    <?php
        if(isset($usersList) && isset($usersNb) && $usersNb>0) {
        ?>
        <table>
            <tr>
                <th>Email</th>
                <th>Password</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Admin</th>
            </tr>
            <?php
            foreach($usersList as $user) {
            ?>
                <tr>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['password'] ?></td>
                    <td><?php echo $user['firstName'] ?></td>
                    <td><?php echo $user['lastName'] ?></td>
                    <td><?php echo $user['admin'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <?php
        }
        else {
        ?>
        <p>No users in database</p>
        <?php
        }
    ?>
</div>