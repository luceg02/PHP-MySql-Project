<header>
    <div id="info-bar">
        <p>My wonderful platform</p>
    </div>

    <div id="banner-bloc">
        <h1>TP Authentification et MVC</h1>
    </div>

    <div id="account_bar"> 
        <?php
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
            ?>
                Welcome &nbsp;<i><?php echo $_SESSION['user']?></i>&nbsp; : &nbsp;<a href="./index.php?ctrl=user&action=logout">&nbsp;Logout</a>
            <?php
            }
            else {
            ?>
                <a href="./index.php?ctrl=user&action=login"> Login&nbsp; </a>
                or&nbsp; <a href="./index.php?ctrl=user&action=create"> Create&nbsp;  </a> an account
            <?php
            }
        ?>
    </div>

    <ul id="menu_bar">
        <a href="./index.php?ctrl=user&action=listUser" class="no-deco"><li>Liste des utilisateurs</li></a>
        <a href="./" class="no-deco"><li>Le mémoire</li></a>
        <a href="./" class="no-deco"><li>La soutenance</li></a>
        <a href="./" class="no-deco"><li>Le carnet de liaison</li></a>
        <a href="./" class="no-deco"><li>Les espaces de travail</li></a>
    </ul>
</header>

<section id="main-section">
    <?php
        if(isset($page)) {
            if($page == 'home')
                require("./View/home.php");
            else
                require("./View/".$page.".php");
        }
    ?>
</section>

<footer>
    <p>Licence professionnelle Projet Web et Mobile at Sorbonne Université 2024/2025</p>
</footer>