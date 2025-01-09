 <div class="block small-block">
    <h2>Create an account</h2>
    <form action="index.php?ctrl=user&action=doCreate" method="POST">
        <label>Mail :</label><br/>
        <input type="email" name="email"placeholder="Mail.." required/><br>
        <label>Password :</label><br/>
        <input type="password" name="password"placeholder="Password.." required/><br>
        <label>Last Name :</label><br/>
        <input type="text" name="lastName"placeholder="Last Name.." required/><br>
        <label>First Name :</label><br/>
        <input type="text" name="firstName"placeholder="First Name.." required/><br>
        <label>Adresse :</label><br/>
        <input type="text" name="address"placeholder="Address.." required/><br>
        <label>Postal Code :</label><br/>
        <input type="text" name="postalCode"placeholder="Postal Code.." required/><br>
        <label>City :</label><br/>
        <input type="text" name="city"placeholder="City.." required/><br>
        <p>
            <input type="submit" class="submit-btn" value="Create">
        </p>
    </form>
    <span><?php if(isset($error)) echo $error; ?></span>
</div>