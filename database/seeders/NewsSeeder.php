<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class NewsSeeder extends Seeder
{
    public function run()
    {
        $sourcePath = public_path('images/Prins.jpg');
        $destinationPath = 'news-images/Prins.jpg';

        if (file_exists($sourcePath) && !Storage::disk('public')->exists($destinationPath)) {
            Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath));
        }

        DB::table('news')->insert([
            'title' => 'Welkom op het Lennik Platform!',
            'content' => '
                <p>Welkom op het Lennik Platform! Wij zijn verheugd om je te verwelkomen op onze gloednieuwe website.</p>
                <ul>
                    <li><strong>Blijf op de hoogte van het laatste nieuws:</strong> Lees actuele updates en belangrijke mededelingen die relevant zijn voor onze stad.</li>
                    <li><strong>Ontdek evenementen en activiteiten:</strong> Onze evenementenpagina houdt je op de hoogte van alles wat er speelt in en rond Lennik.</li>
                    <li><strong>Vind lokale bedrijven en diensten:</strong> Op zoek naar een restaurant, een winkel, of een specifieke dienst in Lennik? Onze gids helpt je snel en gemakkelijk.</li>
                    <li><strong>Maak contact met de community:</strong> Deel je gedachten en ontdek wat anderen te zeggen hebben over onze stad.</li>
                </ul>
                <p>Samen maken we Lennik nog beter! Neem contact met ons op voor vragen of suggesties.</p>
            ',
            'publication_date' => now(),
            'image' => $destinationPath,
        ]);
        
    }
}
