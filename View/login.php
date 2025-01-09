<div class="block small-block">
    <h2>Login</h2>
    <form action="index.php?ctrl=user&action=doLogin" method="POST">
        <label>Mail :</label><br/>
        <input type="email" name="email" placeholder="Mail.." required/><br>
        <label>Mot de passe :</label><br/>
        <input type="password" name="password" placeholder="Mot de passe.." required/><br>
        <p>
            <input type="submit" class="submit-btn" value="Connect">
        </p>
    </form>
    <span><?php if(isset($error)) echo $error; ?></span>
</div>