<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Lennik Platform

Welkom op het Lennik Platform! Dit project biedt een centrale plek voor nieuws, evenementen en community-interacties met betrekking tot de stad Lennik. Het is gebouwd met Laravel en bevat een gebruiksvriendelijke interface en diverse functionaliteiten die bijdragen aan een betrokken gemeenschap.

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
   git clone [repository-url]
   cd [repository-map]
2. **Dependencies installeren**:
   ```bash
   composer install
   npm install && npm run dev
3. **Environment configureren**:Maak een .env-bestand op basis van .env.example:
   ```bash
   cp .env.example .env
4. **Pas de database-instellingen aan:**:
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=lennik_platform
    DB_USERNAME=root
    DB_PASSWORD=
5. **Database migreren en vullen**:
   ```bash
    php artisan migrate:fresh --seed
6. **Environment configureren**:
   ```bash
   php artisan storage:link
7. **Environment configureren**:
   ```bash
    php artisan serve
## 

Bezoek de website op [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Bronvermelding

- **Laravel Framework**: [https://laravel.com/](https://laravel.com/)
- **Seeder Content**: Handmatig gegenereerde vragen en antwoorden gebaseerd op gemeentelijke websites.

---

## Belangrijke Informatie

- **Admin Account**  
  - E-mailadres: `admin@ehb.be`  
  - Wachtwoord: `Password!321`  

- **Afbeeldingen**  
  Standaardafbeeldingen bevinden zich in de map `public/storage`.

---

## Licentie

Dit project is open-sourced software gelicentieerd onder de [MIT-licentie](https://opensource.org/licenses/MIT).