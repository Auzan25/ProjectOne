<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('fr_FR');
        
        // Noms et prénoms sénégalais courants
        $prenomsMasculins = [
            'Abdou', 'Mamadou', 'Moussa', 'Ibrahima', 'Ousmane', 'Cheikh', 'Amadou', 'Saliou',
            'Babacar', 'Modou', 'Pape', 'Momar', 'Serigne', 'Fallou', 'Baye', 'Khadim',
            'Alioune', 'Souleymane', 'Boubacar', 'Assane', 'Lamine', 'Madicke', 'Malick',
            'Thierno', 'Tidiane', 'Youssou', 'Massamba', 'Ndiaga', 'Mbacké', 'Moustapha'
        ];
        
        $prenomsFeminins = [
            'Fatou', 'Aida', 'Aminata', 'Mariama', 'Astou', 'Khadija', 'Rokhaya', 'Coumba',
            'Awa', 'Ndèye', 'Bineta', 'Dieynaba', 'Khady', 'Mame', 'Ndeye', 'Seynabou',
            'Ramatoulaye', 'Maimouna', 'Oumou', 'Adama', 'Binta', 'Marème', 'Yacine',
            'Naffissatou', 'Sokhna', 'Kiné', 'Penda', 'Daba', 'Nogaye', 'Selbé'
        ];
        
        $noms = [
            'Diop', 'Ndiaye', 'Fall', 'Diouf', 'Sow', 'Sy', 'Ba', 'Sarr', 'Thiam', 'Gueye',
            'Ndour', 'Faye', 'Cissé', 'Diallo', 'Kane', 'Sene', 'Camara', 'Diagne', 'Mbaye',
            'Niang', 'Diene', 'Keita', 'Coulibaly', 'Traore', 'Samb', 'Ciss', 'Tall', 'Kone',
            'Bah', 'Barry', 'Sall', 'Ndao', 'Deme', 'Dieng', 'Beye', 'Toure', 'Mbodj',
            'Drame', 'Diatta', 'Manga', 'Mendy', 'Sagna', 'Badji', 'Goudiaby', 'Tendeng'
        ];
        
        // Villes sénégalaises
        $villes = [
            'Dakar', 'Thiès', 'Kaolack', 'Ziguinchor', 'Saint-Louis', 'Louga', 'Fatick',
            'Kolda', 'Matam', 'Kaffrine', 'Kédougou', 'Sédhiou', 'Diourbel', 'Tambacounda',
            'Rufisque', 'Mbour', 'Tivaouane', 'Touba', 'Pikine', 'Guédiawaye', 'Joal-Fadiouth',
            'Podor', 'Richard-Toll', 'Linguère', 'Kanel', 'Bakel', 'Goudomp', 'Oussouye'
        ];
        
        // Magasins Auchan par région
        $magasins = [
            'Auchan Dakar', 'Auchan Thiès', 'Auchan Kaolack', 'Auchan Saint-Louis',
            'Auchan Ziguinchor', 'Auchan Louga', 'Auchan Fatick', 'Auchan Kolda',
            'Auchan Matam', 'Auchan Kaffrine', 'Auchan Kédougou', 'Auchan Sédhiou',
            'Auchan Diourbel', 'Auchan Tambacounda'
        ];
        
        // Lieux de naissance sénégalais
        $lieuxNaissance = [
            'Dakar', 'Thiès', 'Kaolack', 'Ziguinchor', 'Saint-Louis', 'Louga', 'Fatick',
            'Kolda', 'Matam', 'Kaffrine', 'Kédougou', 'Sédhiou', 'Diourbel', 'Tambacounda',
            'Rufisque', 'Mbour', 'Tivaouane', 'Touba', 'Pikine', 'Guédiawaye', 'Joal-Fadiouth',
            'Podor', 'Richard-Toll', 'Linguère', 'Kanel', 'Bakel', 'Goudomp', 'Oussouye',
            'Mbacké', 'Khombole', 'Mékhé', 'Kebemer', 'Dagana', 'Pout', 'Gossas'
        ];
        
        $batchSize = 1000;
        $totalRecords = 100000;
        $batches = $totalRecords / $batchSize;
        
        $this->command->info("Génération de {$totalRecords} clients en {$batches} lots de {$batchSize}...");
        
        // Désactiver les contraintes de clés étrangères temporairement
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        for ($batch = 0; $batch < $batches; $batch++) {
            $customers = [];
            
            for ($i = 0; $i < $batchSize; $i++) {
                $sexe = $faker->randomElement(['masculin', 'feminin']);
                $civility = $sexe === 'masculin' ? 'Monsieur' : 'Madame';
                $firstname = $sexe === 'masculin' 
                    ? $faker->randomElement($prenomsMasculins) 
                    : $faker->randomElement($prenomsFeminins);
                $lastname = $faker->randomElement($noms);
                
                // Génération du numéro de téléphone mobile sénégalais
                $operateurs = ['77', '78', '70', '76', '75']; // Opérateurs sénégalais
                $operateur = $faker->randomElement($operateurs);
                $mobilePhone = '+221' . $operateur . $faker->numerify('#######');
                
                // Génération du numéro fixe (optionnel)
                $fixedPhone = null;
                if ($faker->boolean(30)) { // 30% de chance d'avoir un fixe
                    $fixedPhone = '+221' . $faker->randomElement(['33', '34', '35', '36', '37', '38', '39']) . $faker->numerify('######');
                }
                
                // Email (optionnel)
                $email = null;
                if ($faker->boolean(70)) { // 70% de chance d'avoir un email
                    $emailDomains = ['gmail.com', 'yahoo.fr', 'hotmail.com', 'orange.sn', 'sonatel.sn'];
                    $email = strtolower($firstname . '.' . $lastname . $faker->numberBetween(1, 999) . '@' . $faker->randomElement($emailDomains));
                }
                
                // Pseudo (optionnel)
                $pseudo = null;
                if ($faker->boolean(40)) { // 40% de chance d'avoir un pseudo
                    $pseudo = strtolower($firstname . $faker->numberBetween(10, 9999));
                }
                
                // Date de naissance (entre 18 et 80 ans)
                $birthdate = $faker->dateTimeBetween('-80 years', '-18 years')->format('Y-m-d');
                
                // Adresse sénégalaise
                $quartiers = ['Plateau', 'Médina', 'Fann', 'Mermoz', 'Sacré-Cœur', 'Yoff', 'Ngor', 'Ouakam', 'Point E', 'Almadies', 'Parcelles Assainies', 'Grand Yoff', 'Liberté', 'Colobane', 'Rebeuss', 'Gueule Tapée', 'Fass', 'Derklé', 'Dieuppeul', 'Sicap'];
                $address = $faker->randomElement($quartiers) . ', ' . $faker->streetAddress;
                
                $city = $faker->randomElement($villes);
                $birthplace = $faker->randomElement($lieuxNaissance);
                
                // Magasin de réception (optionnel)
                $magasinReception = null;
                if ($faker->boolean(60)) { // 60% de chance d'avoir un magasin
                    $magasinReception = $faker->randomElement($magasins);
                }
                
                // Description (optionnelle)
                $description = null;
                if ($faker->boolean(25)) { // 25% de chance d'avoir une description
                    $descriptions = [
                        'Client fidèle depuis plusieurs années',
                        'Préfère les achats en ligne',
                        'Intéressé par les produits bio',
                        'Client VIP avec carte de fidélité',
                        'Achète régulièrement des produits électroniques',
                        'Client saisonnier',
                        'Préfère les promotions et les soldes'
                    ];
                    $description = $faker->randomElement($descriptions);
                }
                
                $customers[] = [
                    'civility' => $civility,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'pseudo' => $pseudo,
                    'sexe' => $sexe,
                    'mobile_phone' => $mobilePhone,
                    'fixed_phone' => $fixedPhone,
                    'email' => $email,
                    'email_verified_at' => $email ? ($faker->boolean(80) ? now() : null) : null,
                    'password' => Hash::make('password123'),
                    'birthdate' => $birthdate,
                    'birthplace' => $birthplace,
                    'address' => $address,
                    'city' => $city,
                    'magasin_reception' => $magasinReception,
                    'description' => $description,
                    'is_active' => $faker->boolean(85), // 85% de clients actifs
                    'user_id' => $faker->randomElement([1, 2]),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            
            // Insérer le lot en base
            DB::table('customers')->insert($customers);
            
            $currentTotal = ($batch + 1) * $batchSize;
            $this->command->info("Lot " . ($batch + 1) . "/{$batches} terminé. Total: {$currentTotal} clients créés.");
        }
        
        // Réactiver les contraintes de clés étrangères
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        $this->command->info("✅ Génération terminée: {$totalRecords} clients créés avec succès!");
    }
}