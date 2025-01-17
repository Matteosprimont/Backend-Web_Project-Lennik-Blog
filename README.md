# Lennik Platform

Welkom op het Lennik Platform! Dit project biedt een centrale plek voor nieuws, evenementen en community-interacties met betrekking tot de stad Lennik. Het is gebouwd met Laravel en bevat een gebruiksvriendelijke interface en diverse functionaliteiten die bijdragen aan een betrokken gemeenschap.

## Inhoudsopgave
- [Introductie](#lennik-platform)
- [Functionaliteiten](#functionaliteiten)
- [Installatie](#installatie)
  - [Vereisten](#vereisten)
  - [Installatiestappen](#stappen)
- [Migratie- en Seederproces](#migratie--en-seederproces)
- [Gebruik](#gebruik)
  - [Start de ontwikkelserver](#start-de-ontwikkelserver)
  - [Toegang tot de applicatie](#toegang-tot-de-applicatie)
  - [Admin toegang](#admin-toegang)
  - [Openbare toegang](#openbare-toegang)
- [Bronvermelding](#bronvermelding)
- [Belangrijke Informatie](#belangrijke-informatie)
- [Licentie](#licentie)

## Functionaliteiten

- **Nieuws**: Bekijk nieuwsartikelen, laat reacties achter en deel jouw mening.
- **Evenementen**: Ontdek geplande activiteiten en blijf op de hoogte van wijzigingen.
- **Profielbeheer**: Personaliseer je profiel, upload een profielfoto en voeg een "over mij"-sectie toe.
- **Community**: Interactie via reacties op nieuws en FAQ-vragen.
- **Contactformulier**: Neem eenvoudig contact op met de admin.

---

## Installatie

### Vereisten
1. PHP >= 8.1
2. Composer
3. MySQL of een andere ondersteunde database
4. Node.js en npm
5. Laravel CLI

### Stappen
1. **Repository clonen**:
   ```bash
   git clone https://github.com/Matteosprimont/Backend-Web_Project-Lennik-Blog.git
   cd [repository-map]
2. **Dependencies installeren**:
   ```bash
   composer install
   npm install && npm run dev
3. **Environment configureren**:Maak een .env-bestand op basis van .env.example:
   ```bash
   cp .env.example .env
4. **Genereer de applicatiesleutel:**
   ```bash
   php artisan key:generate
5. **Link de storage:**
   ```bash
   php artisan storage:link
6. **Pas de database-instellingen aan:**:
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=lennik_platform
    DB_USERNAME=root
    DB_PASSWORD=
7. **Configureer e-mailservice:**:
   ```bash
   MAIL_MAILER=smtp
   MAIL_HOST=sandbox.smtp.mailtrap.io
   MAIL_PORT=2525
   MAIL_USERNAME=je-mailtrap-username
   MAIL_PASSWORD=je-mailtrap-password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=admin@lennikplatform.be
   MAIL_FROM_NAME="Lennik Platform"   

## Migratie- en Seederproces 

1. **Database migreren en vullen**:
   ```bash
   php artisan migrate:fresh
2. **Environment configureren**:
   ```bash
   php artisan db:seed
3. **Environment configureren**:
   ```bash
      php artisan storage:link

## Gebruik

1. **Start de ontwikkelserver:**
   ```bash
   php artisan serve
2. **Toegang tot de applicatie:**
   Open je browser en ga naar `http://127.0.0.1:8000`.
3. **Admin toegang:**
   - Standaard wordt een admin-gebruiker ge-seed in de database:
     - E-mail: `admin@ehb.be`
     - Wachtwoord: ` Password!321`
4. **Openbare toegang:**
   - Gebruikers kunnen zich registreren of inloggen om toegang


## Bronvermelding

- [Laravel-documentatie](https://laravel.com/docs)
- [Composer-documentatie](https://getcomposer.org/doc/)
- [MySQL-handleiding](https://dev.mysql.com/doc/)
- [PHP](https://www.php.net/)

---

## Belangrijke Informatie

- **Admin Account**  
  - E-mailadres: `admin@ehb.be`  
  - Wachtwoord: `Password!321`  

- **Afbeeldingen**  
  Standaardafbeeldingen bevinden zich in de map `public/storage`.

---

## Licentie

Dit project is beschikbaar onder de MIT-licentie.