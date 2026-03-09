<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::updateOrCreate(
            ['email' => 'president@eoic.org'],
            [
                'name' => 'admin',
                'password' => bcrypt('eoic.admin')
            ]
        );

        $this->call(CategorySeeder::class);

        // Add 3 sample campaigns
        \App\Models\Campaign::updateOrCreate(
            ['code' => 'WINTER_2026'],
            [
                'name' => 'إعانة الشتاء 2026',
                'name_en' => 'Winter Relief 2026',
                'name_fr' => 'Secours d\'Hiver 2026',
                'slug' => 'winter-relief-2026',
                'thumbnail' => 'https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?q=80&w=2070&auto=format&fit=crop',
                'description' => 'توزيع سلال غذائية وأغطية للأسر المحتاجة في فصل الشتاء.',
                'description_en' => 'Distribution of food baskets and blankets for needy families in winter.',
                'description_fr' => 'Distribution de paniers alimentaires et de couvertures pour les familles nécessiteuses en hiver.',
                'category_id' => 1, // SOCIAL_SOLIDARITY
                'target_amount' => 50000,
                'collected_amount' => 15000,
                'is_active' => true,
                'is_featured' => true,
                'start_date' => now(),
                'end_date' => now()->addMonths(3),
            ]
        );

        \App\Models\Campaign::updateOrCreate(
            ['code' => 'MED_EQUIP_2026'],
            [
                'name' => 'دعم الأجهزة الطبية',
                'name_en' => 'Medical Equipment Support',
                'name_fr' => 'Soutien aux Équipements Médicaux',
                'slug' => 'medical-equipment-support',
                'thumbnail' => 'https://images.unsplash.com/photo-1516549655169-df83a0774514?q=80&w=2070&auto=format&fit=crop',
                'description' => 'توفير أجهزة تنفس وكراسي متحركة للمرضى المعسرين.',
                'description_en' => 'Providing ventilators and wheelchairs for insolvent patients.',
                'description_fr' => 'Fournir des ventilateurs et des fauteuils roulants aux patients insolvables.',
                'category_id' => 2, // HEALTHCARE
                'target_amount' => 100000,
                'collected_amount' => 45000,
                'is_active' => true,
                'is_urgent' => true,
                'start_date' => now(),
                'end_date' => now()->addMonths(6),
            ]
        );

        \App\Models\Campaign::updateOrCreate(
            ['code' => 'SCHOLAR_2026'],
            [
                'name' => 'منح دراسية للأيتام',
                'name_en' => 'Scholarships for Orphans',
                'name_fr' => 'Bourses pour Orphelins',
                'slug' => 'scholarships-for-orphans',
                'thumbnail' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2022&auto=format&fit=crop',
                'description' => 'دعم تعليم الطلاب الأيتام المتفوقين في الجامعات.',
                'description_en' => 'Supporting the education of outstanding orphan students in universities.',
                'description_fr' => 'Soutenir l\'éducation d\'étudiants orphelins exceptionnels dans les universités.',
                'category_id' => 3, // EDUCATION
                'target_amount' => 75000,
                'collected_amount' => 20000,
                'is_active' => true,
                'start_date' => now(),
                'end_date' => now()->addMonths(12),
            ]
        );
    }
}
