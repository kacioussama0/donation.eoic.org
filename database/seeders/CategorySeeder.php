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
                'translations' => [
                    'ar' => [
                        'name' => 'التكافل الاجتماعي والإنساني',
                        'slug' => 'التكافل-الاجتماعي',
                        'description' => 'سلال غذائية، كفالات، مساعدات معيشية، دعم الأسر المحتاجة'
                    ],
                    'en' => [
                        'name' => 'Social & Humanitarian Solidarity',
                        'slug' => 'social-solidarity',
                        'description' => 'Food baskets, sponsorships, living assistance, support for needy families'
                    ],
                    'fr' => [
                        'name' => 'Solidarité Sociale et Humanitaire',
                        'slug' => 'solidarite-sociale',
                        'description' => 'Paniers alimentaires, parrainages, aide à la vie, soutien aux familles dans le besoin'
                    ]
                ]
            ],
            [
                'code' => 'HEALTHCARE',
                'icon' => '🏥',
                'color_code' => '#059669', // أخضر
                'sort_order' => 2,
                'translations' => [
                    'ar' => [
                        'name' => 'الصحة والرعاية الطبية',
                        'slug' => 'الصحة-والرعاية-الطبية',
                        'description' => 'عمليات جراحية، أدوية، أجهزة طبية، علاجات، رعاية صحية'
                    ],
                    'en' => [
                        'name' => 'Health & Medical Care',
                        'slug' => 'healthcare',
                        'description' => 'Surgeries, medications, medical equipment, treatments, healthcare'
                    ],
                    'fr' => [
                        'name' => 'Santé et Soins Médicaux',
                        'slug' => 'sante-soins',
                        'description' => 'Chirurgies, médicaments, équipement médical, traitements, soins de santé'
                    ]
                ]
            ],
            [
                'code' => 'EDUCATION',
                'icon' => '🎓',
                'color_code' => '#2563EB', // أزرق
                'sort_order' => 3,
                'translations' => [
                    'ar' => [
                        'name' => 'التعليم والمعرفة',
                        'slug' => 'التعليم-والمعرفة',
                        'description' => 'رسوم دراسية، مستلزمات مدرسية، منح تعليمية، تطوير المدارس'
                    ],
                    'en' => [
                        'name' => 'Education & Knowledge',
                        'slug' => 'education',
                        'description' => 'Tuition fees, school supplies, educational scholarships, school development'
                    ],
                    'fr' => [
                        'name' => 'Éducation et Savoir',
                        'slug' => 'education-savoir',
                        'description' => 'Frais de scolarité, fournitures scolaires, bourses d\'études, développement scolaire'
                    ]
                ]
            ],
            [
                'code' => 'HOUSING_SHELTER',
                'icon' => '🏠',
                'color_code' => '#7C3AED', // بنفسجي
                'sort_order' => 4,
                'translations' => [
                    'ar' => [
                        'name' => 'السكن والإيواء',
                        'slug' => 'السكن-والإيواء',
                        'description' => 'بناء مساكن، إيجارات، ترميم مساكن، دعم السكن العاجل'
                    ],
                    'en' => [
                        'name' => 'Housing & Shelter',
                        'slug' => 'housing-shelter',
                        'description' => 'Building homes, rent assistance, housing renovation, emergency shelter support'
                    ],
                    'fr' => [
                        'name' => 'Logement et Hébergement',
                        'slug' => 'logement-hebergement',
                        'description' => 'Construction de logements, aide au loyer, rénovation de logements, soutien d\'urgence'
                    ]
                ]
            ],
            [
                'code' => 'EMERGENCY_RELIEF',
                'icon' => '🚨',
                'color_code' => '#EA580C', // برتقالي
                'sort_order' => 5,
                'translations' => [
                    'ar' => [
                        'name' => 'الإغاثة والطوارئ',
                        'slug' => 'الإغاثة-والطوارئ',
                        'description' => 'كوارث طبيعية، نازحين، مساعدات عاجلة، استجابة للأزمات'
                    ],
                    'en' => [
                        'name' => 'Emergency & Relief',
                        'slug' => 'emergency-relief',
                        'description' => 'Natural disasters, displaced people, urgent aid, crisis response'
                    ],
                    'fr' => [
                        'name' => 'Secours et Urgences',
                        'slug' => 'secours-urgences',
                        'description' => 'Catastrophes naturelles, personnes déplacées, aide urgente, réponse aux crises'
                    ]
                ]
            ],
            [
                'code' => 'DEBT_SETTLEMENT',
                'icon' => '💳',
                'color_code' => '#CA8A04', // ذهبي
                'sort_order' => 6,
                'translations' => [
                    'ar' => [
                        'name' => 'تسديد الديون',
                        'slug' => 'تسديد-الديون',
                        'description' => 'قضاء ديون المعسرين، مساعدات مالية عاجلة، تحرير من السجناء المديونين'
                    ],
                    'en' => [
                        'name' => 'Debt Settlement',
                        'slug' => 'debt-settlement',
                        'description' => 'Paying off debts of the insolvent, urgent financial aid, freeing indebted prisoners'
                    ],
                    'fr' => [
                        'name' => 'Règlement des Dettes',
                        'slug' => 'reglement-dettes',
                        'description' => 'Paiement des dettes des insolvables, aide financière urgente, libération des prisonniers endettés'
                    ]
                ]
            ],
            [
                'code' => 'RELIGIOUS_PROJECTS',
                'icon' => '🕌',
                'color_code' => '#0891B2', // تركواز
                'sort_order' => 7,
                'translations' => [
                    'ar' => [
                        'name' => 'المشاريع الدينية',
                        'slug' => 'المشاريع-الدينية',
                        'description' => 'بناء مساجد، طباعة المصاحف، مشاريع الأوقاف، أعمال خيرية دينية'
                    ],
                    'en' => [
                        'name' => 'Religious Projects',
                        'slug' => 'religious-projects',
                        'description' => 'Building mosques, printing Qurans, endowment projects, religious charitable works'
                    ],
                    'fr' => [
                        'name' => 'Projets Religieux',
                        'slug' => 'projets-religieux',
                        'description' => 'Construction de mosquées, impression du Coran, projets de waqf, œuvres caritatives religieuses'
                    ]
                ]
            ],
            [
                'code' => 'ENVIRONMENT_COMMUNITY',
                'icon' => '🌿',
                'color_code' => '#10B981', // أخضر فاتح
                'sort_order' => 8,
                'is_featured' => true, // كنموذج لقطاع مميز
                'translations' => [
                    'ar' => [
                        'name' => 'البيئة والخدمات المجتمعية',
                        'slug' => 'البيئة-والخدمات-المجتمعية',
                        'description' => 'تشجير، نظافة الأحياء، مبادرات مجتمعية، خدمات عامة'
                    ],
                    'en' => [
                        'name' => 'Environment & Community Services',
                        'slug' => 'environment-community',
                        'description' => 'Afforestation, neighborhood cleanliness, community initiatives, public services'
                    ],
                    'fr' => [
                        'name' => 'Environnement et Services Communautaires',
                        'slug' => 'environnement-services',
                        'description' => 'Reforestation, propreté des quartiers, initiatives communautaires, services publics'
                    ]
                ]
            ]
        ];

        // إضافة القطاعات إلى قاعدة البيانات
        foreach ($sectors as $sectorData) {
            // إنشاء القطاع الرئيسي
            $category = Category::create([
                'code' => $sectorData['code'],
                'icon' => $sectorData['icon'],
                'color_code' => $sectorData['color_code'],
                'parent_id' => null, // كلها قطاعات رئيسية
                'sort_order' => $sectorData['sort_order'],
                'is_active' => true,
                'is_featured' => $sectorData['is_featured'] ?? false,
            ]);

            // إضافة الترجمات للغات الثلاث
            foreach ($sectorData['translations'] as $locale => $translation) {
                CategoryTranslation::create([
                    'category_id' => $category->id,
                    'locale' => $locale,
                    'name' => $translation['name'],
                    'slug' => $translation['slug'],
                    'description' => $translation['description'],
                ]);
            }
        }

        $this->command->info('✅ تم إنشاء ' . count($sectors) . ' قطاع تبرع باللغات العربية والإنجليزية والفرنسية.');
    }
}
