# 📚 Manga Blog

Un portale web in **Laravel** dedicato alla gestione di **manga e fumetti** indipendenti.  
Consente agli utenti registrati di pubblicare i propri manga e agli ospiti di esplorare fumetti e autori.  

---

## 🚀 Funzionalità principali

- ✅ Registrazione e autenticazione tramite **Laravel Fortify**
- ✅ Creazione di nuovi manga con titolo, autore, anno, descrizione, categoria e immagine
- ✅ Visualizzazione pubblica della lista dei manga e del dettaglio
- ✅ Modifica e cancellazione dei manga da parte del creatore
- ✅ Pagine dedicate ai fumettisti e ai loro fumetti
- ✅ Sistema di categorie per classificare i manga
- ✅ Form di contatto funzionante con **Mailpit**
- ✅ Design completamente **responsive** con **Bootstrap 5.3**
- 💾 Upload delle immagini (salvate in `public/storage/uploads`)

---

## 🧩 Struttura del progetto

- **Framework:** Laravel 12  
- **Database:** MySQL  
- **Autenticazione:** Laravel Fortify  
- **Frontend:** Blade + Bootstrap 5  
- **Linguaggio:** PHP 8.4  
- **Opzionale:** Livewire (CRUD reattivi)

---

## ⚙️ Installazione locale

1. **Clona il repository:**
   ```bash
   git clone https://github.com/giuseppe-luzzi/manga-blog.git
   cd manga-blog
Installa le dipendenze:

bash
Copia codice
composer install
npm install
npm run build
Crea il file .env:

bash
Copia codice
cp .env.example .env
Configura il database nel file .env:

env
Copia codice
DB_DATABASE=manga_blog
DB_USERNAME=root
DB_PASSWORD=
Genera la chiave dell’app:

bash
Copia codice
php artisan key:generate
Esegui le migrazioni e i seeder:

bash
Copia codice
php artisan migrate --seed
Avvia il server:

bash
Copia codice
php artisan serve
(Facoltativo) Avvia Mailpit per testare le email:

bash
Copia codice
mailpit
🧠 Relazioni del database
Users → Manga → relazione 1:N

Categories → Manga → relazione 1:N

📁 Struttura cartelle principali
bash
Copia codice
app/
 ├── Http/Controllers/
 │   ├── MangaController.php
 │   └── ContactController.php
 ├── Models/
 │   ├── Manga.php
 │   └── Category.php

resources/
 ├── views/
 │   ├── mangas/
 │   ├── categories/
 │   ├── pages/
 │   └── layouts/

database/
 ├── migrations/
 └── seeders/

public/
 └── uploads/
👩‍🎨 User Stories implementate
Registrazione utenti (Laravel Fortify)

Creazione manga con immagine, anno, trama, numero e categoria

Visualizzazione pubblica dei manga e del dettaglio

Pagina fumettisti con elenco e dettagli

Categorie associate ai manga

Form contatti con invio email via Mailpit

Design responsive con Bootstrap 5.3


## ⚙️ Installazione locale

 **Clona il repository:**
   ```bash
   git clone https://github.com/giuseppe-luzzi/manga-blog.git
   cd manga-blog



🖼️ Screenshot
![Screenshot dell'app](public/uploads/screenshot.png)


🧾 Licenza
Questo progetto è sviluppato a scopo didattico.
© 2025 – The Manga Blog by Giuseppe Luzzi