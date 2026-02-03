🔐 Cyber Vault - Secure Password Manager
📝 Project Description / Projektbeschreibung
EN: A web-based password manager developed in a Kali Linux environment. It uses AES-256-CBC for dual-layered encryption and PHP/MySQL for secure data handling. Featuring a modern, neon-glassmorphism UI with a custom interactive particles background.

DE: Ein webbasierter Passwort-Manager, entwickelt in einer Kali Linux-Umgebung. Er nutzt AES-256-CBC für die bidirektionale Verschlüsselung und PHP/MySQL für die sichere Datenverarbeitung. Das Interface besticht durch modernes Neon-Glassmorphismus-Design mit einem interaktiven Particle-Hintergrund.

🚀 Features / Funktionen
English
Secure Authentication: Passwords are hashed using password_hash() (Bcrypt).

Dual-Layer Encryption: Stored passwords are encrypted with AES-256 before hitting the database.

Interactive UI: Custom JavaScript Canvas particle background.

Dynamic Dashboard: Add, view, and toggle visibility of stored credentials.

Deutsch
Sichere Authentifizierung: Passwörter werden mit password_hash() (Bcrypt) gesichert.

Zwei-Schichten-Verschlüsselung: Gespeicherte Passwörter werden mit AES-256 verschlüsselt, bevor sie in die Datenbank gelangen.

Interaktive Benutzeroberfläche: Benutzerdefinierter Particle-Hintergrund mittels JavaScript Canvas.

Dynamisches Dashboard: Hinzufügen, Anzeigen und Umschalten der Sichtbarkeit von gespeicherten Zugangsdaten.

🛠 Tech Stack / Technologien
OS: Kali Linux

Backend: PHP 8.x

Database: MariaDB / MySQL

Frontend: HTML5, CSS3 (Glassmorphism), JavaScript (Canvas API)

Server: Apache2

⚙️ Installation / Einrichtung
English
Clone the repository: git clone https://github.com/YourUsername/repository-name.git

Import the database: Create a DB named password_vault and run the SQL commands provided in the previous steps.

Configure db.php: Set your database credentials and ENCRYPTION_KEY.

Move to Web-Server: sudo cp -r . /var/www/html/password-manager

Access via: http://localhost/password-manager/index.php

Deutsch
Repository klonen: git clone https://github.com/YourUsername/repository-name.git

Datenbank importieren: Erstellen Sie eine DB namens password_vault und führen Sie die zuvor bereitgestellten SQL-Befehle aus.

db.php konfigurieren: Geben Sie Ihre Datenbank-Zugangsdaten und den ENCRYPTION_KEY ein.

Zum Webserver verschieben: sudo cp -r . /var/www/html/password-manager

Aufrufen unter: http://localhost/password-manager/index.php

⚠️ Security Notice / Sicherheitshinweis
EN: This project is for educational purposes. Ensure db.php is added to your .gitignore to prevent leaking database credentials. DE: Dieses Projekt dient zu Bildungszwecken. Stellen Sie sicher, dass db.php in Ihrer .gitignore steht, um das Leak von Datenbank-Zugangsdaten zu verhindern.