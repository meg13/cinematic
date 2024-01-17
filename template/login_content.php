<section class="col-center-only">
    <header <?php if(isset($template["loginError"])) echo 'class="error-section"'?>>
        <h1>NomeSito</h1>
        <p>Accedi per entrare in un mondo di intrattenimento</p>
        <p id="wrongCredential" style="display: <?php echo isset($template["loginError"]) ? "inline-block" : "none" ?>"><?php echo $template["loginError"]; ?></p>
    </header>
    <form action="login.php" method="POST">
        <ul>
            <li><label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="email@example.com" <?php if(isset($template["loginError"])) echo 'class="wrong"'?>/>
            </li>
            <li><label for="password">Password</label>
                <input type="password" id="password" name="password" <?php if(isset($template["loginError"])) echo 'class="wrong"'?> />
            </li>
            <li>
                <input type="submit" value="Accedi"/>
            </li>
        </ul>
    </form>
    <p>oppure</p>
    <ul>
        <li>
            <a href="register.php">Crea un account</a>
        </li>
    </ul>
</section>