<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryTranslation;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // بيانات القطاعات الرئيسية (Sectors)
        $sectors = [
            [
                'code' => 'SOCIAL_SOLIDARITY',
                'icon' => '🤲',
                'color_code' => '#DC2626', // أحمر
                'sort_order' => 1,
                'name' => 'التكافل الاجتماعي والإنساني',
                'name_en' => 'Social Solidarity & Humanitarian',
                'name_fr' => 'Solidarité Sociale et Humanitaire',
                'slug' => 'التكافل-الاجتماعي',
                'description' => 'سلال غذائية، كفالات، مساعدات معيشية، دعم الأسر المحتاجة',
                'description_en' => 'Food baskets, sponsorships, living assistance, supporting needy families',
                'description_fr' => 'Paniers alimentaires, parrainages, aide à la subsistance, soutien aux familles nécessiteuses'
            ],
            [
                'code' => 'HEALTHCARE',
                'icon' => '🏥',
                'color_code' => '#059669', // أخضر
                'sort_order' => 2,
                'name' => 'الصحة والرعاية الطبية',
                'name_en' => 'Health & Medical Care',
                'name_fr' => 'Santé et Soins Médicaux',
                'slug' => 'الصحة-والرعاية-الطبية',
                'description' => 'عمليات جراحية، أدوية، أجهزة طبية، علاجات، رعاية صحية',
                'description_en' => 'Surgeries, medications, medical devices, treatments, healthcare',
                'description_fr' => 'Chirurgies, médicaments, dispositifs médicaux, traitements, soins de santé'
            ],
            [
                'code' => 'EDUCATION',
                'icon' => '🎓',
                'color_code' => '#2563EB', // أزرق
                'sort_order' => 3,
                'name' => 'التعليم والمعرفة',
                'name_en' => 'Education & Knowledge',
                'name_fr' => 'Éducation et Connaissance',
                'slug' => 'التعليم-والمعرفة',
                'description' => 'رسوم دراسية، مستلزمات مدرسية، منح تعليمية، تطوير المدارس',
                'description_en' => 'Tuition fees, school supplies, educational grants, school development',
                'description_fr' => 'Frais de scolarité, fournitures scolaires, bourses d\'études, développement scolaire'
            ],
            [
                'code' => 'HOUSING_SHELTER',
                'icon' => '🏠',
                'color_code' => '#7C3AED', // بنفسجي
                'sort_order' => 4,
                'name' => 'السكن والإيواء',
                'name_en' => 'Housing & Shelter',
                'name_fr' => 'Logement et Abri',
                'slug' => 'السكن-والإيواء',
                'description' => 'بناء مساكن، إيجارات، ترميم مساكن، دعم السكن العاجل',
                'description_en' => 'Building houses, rents, restoring houses, emergency housing support',
                'description_fr' => 'Construction de maisons, loyers, restauration de maisons, soutien au logement d\'urgence'
            ],
            [
                'code' => 'EMERGENCY_RELIEF',
                'icon' => '🚨',
                'color_code' => '#EA580C', // برتقالي
                'sort_order' => 5,
                'name' => 'الإغاثة والطوارئ',
                'name_en' => 'Emergency Relief',
                'name_fr' => 'Secours d\'Urgence',
                'slug' => 'الإغاثة-والطوارئ',
                'description' => 'كوارث طبيعية، نازحين، مساعدات عاجلة، استجابة للأزمات',
                'description_en' => 'Natural disasters, displaced persons, urgent aid, crisis response',
                'description_fr' => 'Catastrophes naturelles, personnes déplacées, aide urgente, réponse aux crises'
            ],
            [
                'code' => 'DEBT_SETTLEMENT',
                'icon' => '💳',
                'color_code' => '#CA8A04', // ذهبي
                'sort_order' => 6,
                'name' => 'تسديد الديون',
                'name_en' => 'Debt Settlement',
                'name_fr' => 'Règlement de la Dette',
                'slug' => 'تسديد-الديون',
                'description' => 'قضاء ديون المعسرين، مساعدات مالية عاجلة، تحرير من السجناء المديونين',
                'description_en' => 'Paying off debts of insolvents, urgent financial aid, release from indebted prisoners',
                'description_fr' => 'Remboursement des dettes des insolvables, aide financière urgente, libération des prisonniers endettés'
            ],
            [
                'code' => 'RELIGIOUS_PROJECTS',
                'icon' => '🕌',
                'color_code' => '#0891B2', // تركواز
                'sort_order' => 7,
                'name' => 'المشاريع الدينية',
                'name_en' => 'Religious Projects',
                'name_fr' => 'Projets Religieux',
                'slug' => 'المشاريع-الدينية',
                'description' => 'بناء مساجد، طباعة المصاحف، مشاريع الأوقاف، أعمال خيرية دينية',
                'description_en' => 'Building mosques, printing Qurans, endowment projects, religious charitable works',
                'description_fr' => 'Construction de mosquées, impression de Corans, projets de dotation, œuvres caritatives religieuses'
            ],
            [
                'code' => 'ENVIRONMENT_COMMUNITY',
                'icon' => '🌿',
                'color_code' => '#10B981', // أخضر فاتح
                'sort_order' => 8,
                'is_featured' => true,
                'name' => 'البيئة والخدمات المجتمعية',
                'name_en' => 'Environment & Community Services',
                'name_fr' => 'Environnement et Services Communautaires',
                'slug' => 'البيئة-والخدمات-المجتمعية',
                'description' => 'تشجير، نظافة الأحياء، مبادرات مجتمعية، خدمات عامة',
                'description_en' => 'Afforestation, neighborhood cleanliness, community initiatives, public services',
                'description_fr' => 'Reboisement, propreté des quartiers, initiatives communautaires, services publics',
            ]
        ];

        // إضافة القطاعات إلى قاعدة البيانات
        foreach ($sectors as $sectorData) {
            // إنشاء القطاع الرئيسي
            $category = Category::updateOrCreate(
                ['code' => $sectorData['code']],
                [
                    'title' => $sectorData['name'],
                    'title_en' => $sectorData['name_en'] ?? null,
                    'title_fr' => $sectorData['name_fr'] ?? null,
                    'slug' => $sectorData['slug'],
                    'description' => $sectorData['description'],
                    'description_en' => $sectorData['description_en'] ?? null,
                    'description_fr' => $sectorData['description_fr'] ?? null,
                    'icon' => $sectorData['icon'],
                    'color_code' => $sectorData['color_code'],
                    'parent_id' => null, // كلها قطاعات رئيسية
                    'sort_order' => $sectorData['sort_order'],
                    'is_active' => true,
                    'is_featured' => $sectorData['is_featured'] ?? false,
                ]
            );


        }

        $this->command->info('✅ تم إنشاء ' . count($sectors) . ' قطاع تبرع باللغات العربية والإنجليزية والفرنسية.');
    }
}
