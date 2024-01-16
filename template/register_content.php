<section class="col-center-only">
    <header>
        <h1>NomeSito</h1>
        <p>Accedi per entrare in un mondo di intrattenimento</p>
    </header>
    <form action="register.php" method="POST">
    <?php if(isset($template["errorRegistration"])): ?>
    <p><?php echo $template["errorRegistration"]; ?></p>
    <?php endif; ?>
        <ul>
            <li><label for="username">Nome utente</label>
                <input type="text" id="username" name="username"/>
            </li>
            <li><label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="email@example.com"/>
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