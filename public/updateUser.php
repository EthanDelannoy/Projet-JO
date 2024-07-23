<?php
ob_start();
require_once __DIR__ . '/../entites/Utilisateur.class.php';

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $user = new User();
    $UserDetails = $user->getUtilisateurById($userId);
    $mdp = "";

    $roles = $user->getRoles();

    if ($UserDetails) {
?>
        <section class="sectionUpdateCrud">
            <div class="formCrudUpdateMatchEntier">
                <form class="formCrudUpdateMatch" action="../public/updateUser.php?id=<?php echo htmlspecialchars($userId); ?>" method="POST">
                    <label>Nom :</label>
                    <input class="inputCrudMatch" type="text" name="nom" value="<?php echo htmlspecialchars($UserDetails['nom']); ?>"><br>
                    <label>Prénom :</label>
                    <input class="inputCrudMatch" type="text" name="prenom" value="<?php echo htmlspecialchars($UserDetails['prenom']); ?>"><br>
                    <label>Email :</label>
                    <input class="inputCrudMatch" type="email" name="email" value="<?php echo htmlspecialchars($UserDetails['email']); ?>"><br>
                    <label>Mot de passe:</label>
                    <input class="inputCrudMatch" type="password" name="mdp" placeholder=" 8 caractères, 1 maj, 1 min, 1 chiffre, 1 caractères spécial" value="<?php echo htmlspecialchars($mdp); ?>" pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" required><br>

                    <label>Rôle :</label>
                    <select name="role" required>
                        <?php foreach ($roles as $role) { ?>
                            <option value="<?php echo htmlspecialchars($role['idRoles']); ?>" <?php echo $UserDetails['idRoles'] == $role['idRoles'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($role['role']); ?>
                            </option>
                        <?php } ?>
                    </select><br>

                    <div class="divBtnSubmitMatchCrud">
                        <input class="btnSubmitMatchCrud" type="submit" value="Mettre à jour">
                    </div>
                </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $mdp = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);
            $role = filter_input(INPUT_POST, 'role', FILTER_VALIDATE_INT);
            $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";

            if (!preg_match($password_pattern, $mdp)) {
                echo "<p class=\"styleEcho\">Le mot de passe ne respecte pas les critères.</p>";
            } else {
                $message = $user->updateUtilisateur($nom, $prenom, $email, $mdp, $role, $userId);
                echo $message;
            }
        }
    } else {
        echo "<p class=\"styleEcho\">Utilisateur non trouvé.</p>";
    }
} else {
    echo "<p class=\"styleEcho\">ID d'utilisateur non spécifié</p>";
}
        ?>
        <a class="btnRetourCrud" href="../public/interfaceCrud.php">Retour à l'interface</a>
            </div>
        </section>
        <?php
        $content = ob_get_clean();
        $title = "Update Match - Jeux Olympique - Handball";
        $image = '<img class="fondAccueil" src="../public/image/fond ajouter crud.png" alt="JO">';
        $titre = "MATCH : CHANGE LA DATE, LES DEUX EQUIPES  ET LEURS COMPOSITIONS";
        require "template.php";
        ?>