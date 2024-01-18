# Istruzioni per l'installazione

## Requisiti:

- XAMPP
- Database MariaDB/MySQL attivo in `localhost` sulla porta default `3306`, username `root`, password vuota.

## Creazione database

Copiare il contenuto di [Cinematic.sql](db/Cinematic.sql) ed incollarlo in phpMyAdmin nella sezione SQL, per poi eseguirlo.

Dovrebbe essere stato creato il database vuoto `Cinematic`, che può essere popolato con dati fittizi aprendo tramite browser il file `localhost/<directory>/db/populate.php`. Il file va eseguito una sola volta, e dirà _"Complete"_ quando il database sarà stato popolato correttamente.

## Accesso

`localhost/<directory>` è il punto di accesso del sito web. Se l'utente non ha ancora effettuato l'accesso verrà portato alla pagina di login, altrimenti alla home.

È possibile registrare un nuovo utente, ma per poter sfruttare il database già popolato si consiglia di eseguire l'accesso come:

- E-mail: `userN@example.com`
- Password: `PasswordN`

con `N = 1, 2, ..., 9`.

> Esempio: `user1@example.com`, `Password1` 