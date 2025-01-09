<div>
<?php if(isset($_SESSION['user'])): ?>
        <!-- Affichage pour utilisateur connecté -->
            <div class="welcome-message">
                Welcome <span class="welcome-name"><?php echo "<b>".$_SESSION['user']."</b>"; ?></span> !
            <p>Nous sommes ravis de vous revoir sur notre plateforme.</p>
        </div>
    <?php else: ?>
        <!-- Affichage pour utilisateur non connecté -->
        <p class="login-prompt">
                Pour accéder à toutes les fonctionnalités, veuillez 
                <a href="./index.php?ctrl=user&action=login" class="login-link">vous connecter</a>
            </p>
        <div id="monthly-box">
        </div>
    <?php endif; ?>
</div>