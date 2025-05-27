<h2>Connexion</h2>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form action="index.php?action=login" method="post">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>
    <button type="submit">Se connecter</button>
</form>


