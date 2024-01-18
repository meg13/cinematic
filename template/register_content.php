<section class="col-center-only">
    <header>
        <h1>Cinematic</h1>
        <p>Accedi per entrare in un mondo di intrattenimento</p>
        <p id="wrongCredential" style="display: <?php echo isset($template["errorRegistration"]) ? "inline-block" : "none" ?>">
        <?php echo $template["errorRegistration"]; ?></p>
    </header>
    <form action="register.php" method="POST">
        <ul>
            <li><label for="username">Nome utente</label>
                <input type="text" id="username" name="username"/>
            </li>
            <li><label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="email@example.com"/>
            </li>
            <li><label for="password">Password</label>
                <input type="password" id="password" name="password"/>
            </li>
            <li>
                <input type="submit" value="Registrati"/>
            </li>
        </ul>
    </form>
</section>