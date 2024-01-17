<section class="col-center-only">
    <header class="error-section">
        <h1>NomeSito</h1>
        <p>Accedi per entrare in un mondo di intrattenimento</p>
        <p id="wrongCredential" style="display: none"><?php echo $template["loginError"]; ?></p>
    </header>
    <form action="login.php" method="POST">
        <ul>
            <li><label for="email">E-mail</label>
                <input type="text" id="email" name="email" placeholder="email@example.com"/>
            </li>
            <li><label for="password">Password</label>
                <input type="password" id="password" name="password"/>
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