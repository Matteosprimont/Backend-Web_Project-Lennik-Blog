<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class FaqTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Algemeen' => [
                'Wat is het Lennik Platform?' => 'Het Lennik Platform is een centrale plek voor nieuws, evenementen en informatie over Lennik.',
                'Hoe kan ik een account aanmaken?' => 'Klik op "Registreren" in het menu en vul je gegevens in.',
                'Waarom moet ik een account aanmaken?' => 'Met een account kun je reageren op nieuws, een profiel aanmaken en meldingen ontvangen.'
            ],
            'Technische vragen' => [
                'Welke browsers ondersteunen het platform?' => 'Ons platform werkt op de nieuwste versies van Chrome, Firefox, Safari en Edge.',
                'Waarom werkt mijn profiel niet correct?' => 'Controleer of je browser up-to-date is. Neem anders contact met ons op.',
                'Hoe reset ik mijn wachtwoord?' => 'Klik op "Wachtwoord vergeten" op de inlogpagina en volg de instructies.'
            ],
            'Gebruikerstips' => [
                'Hoe kan ik mijn profielfoto wijzigen?' => 'Ga naar je profielinstellingen en upload een nieuwe afbeelding.',
                'Kan ik mijn profiel verwijderen?' => 'Ja, neem contact op via het contactformulier als je je account wilt verwijderen.',
                'Hoe blijf ik op de hoogte van nieuwe updates?' => 'Zorg ervoor dat je notificaties aanstaan in je profielinstellingen.'
            ],
            'Evenementen' => [
                'Hoe vind ik evenementen in Lennik?' => 'Bezoek onze evenementensectie voor een overzicht van alle geplande activiteiten.',
                'Kan ik zelf een evenement toevoegen?' => 'Neem contact met ons op als je een evenement wilt laten toevoegen.',
                'Hoe weet ik of een evenement geannuleerd is?' => 'Eventuele annuleringen worden vermeld op de evenementpagina.'
            ],
        ];

        foreach ($categories as $categoryName => $questions) {
            $categoryId = DB::table('faq_categories')->insertGetId([
                'name' => $categoryName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            foreach ($questions as $question => $answer) {
                DB::table('faq_questions')->insert([
                    'category_id' => $categoryId,
                    'question' => $question,
                    'answer' => $answer,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}