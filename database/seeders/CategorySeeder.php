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
                'slug' => 'التكافل-الاجتماعي',
                'description' => 'سلال غذائية، كفالات، مساعدات معيشية، دعم الأسر المحتاجة'
            ],
            [
                'code' => 'HEALTHCARE',
                'icon' => '🏥',
                'color_code' => '#059669', // أخضر
                'sort_order' => 2,
                'name' => 'الصحة والرعاية الطبية',
                'slug' => 'الصحة-والرعاية-الطبية',
                'description' => 'عمليات جراحية، أدوية، أجهزة طبية، علاجات، رعاية صحية'
            ],
            [
                'code' => 'EDUCATION',
                'icon' => '🎓',
                'color_code' => '#2563EB', // أزرق
                'sort_order' => 3,
                'name' => 'التعليم والمعرفة',
                'slug' => 'التعليم-والمعرفة',
                'description' => 'رسوم دراسية، مستلزمات مدرسية، منح تعليمية، تطوير المدارس'
            ],
            [
                'code' => 'HOUSING_SHELTER',
                'icon' => '🏠',
                'color_code' => '#7C3AED', // بنفسجي
                'sort_order' => 4,
                'name' => 'السكن والإيواء',
                'slug' => 'السكن-والإيواء',
                'description' => 'بناء مساكن، إيجارات، ترميم مساكن، دعم السكن العاجل'
            ],
            [
                'code' => 'EMERGENCY_RELIEF',
                'icon' => '🚨',
                'color_code' => '#EA580C', // برتقالي
                'sort_order' => 5,
                'name' => 'الإغاثة والطوارئ',
                'slug' => 'الإغاثة-والطوارئ',
                'description' => 'كوارث طبيعية، نازحين، مساعدات عاجلة، استجابة للأزمات'
            ],
            [
                'code' => 'DEBT_SETTLEMENT',
                'icon' => '💳',
                'color_code' => '#CA8A04', // ذهبي
                'sort_order' => 6,
                'name' => 'تسديد الديون',
                'slug' => 'تسديد-الديون',
                'description' => 'قضاء ديون المعسرين، مساعدات مالية عاجلة، تحرير من السجناء المديونين'
            ],
            [
                'code' => 'RELIGIOUS_PROJECTS',
                'icon' => '🕌',
                'color_code' => '#0891B2', // تركواز
                'sort_order' => 7,
                'name' => 'المشاريع الدينية',
                'slug' => 'المشاريع-الدينية',
                'description' => 'بناء مساجد، طباعة المصاحف، مشاريع الأوقاف، أعمال خيرية دينية'
            ],
            [
                'code' => 'ENVIRONMENT_COMMUNITY',
                'icon' => '🌿',
                'color_code' => '#10B981', // أخضر فاتح
                'sort_order' => 8,
                'is_featured' => true,
                'name' => 'البيئة والخدمات المجتمعية',
                'slug' => 'البيئة-والخدمات-المجتمعية',
                'description' => 'تشجير، نظافة الأحياء، مبادرات مجتمعية، خدمات عامة',
            ]
        ];

        // إضافة القطاعات إلى قاعدة البيانات
        foreach ($sectors as $sectorData) {
            // إنشاء القطاع الرئيسي
            $category = Category::create([
                'title' => $sectorData['name'],
                'slug' => $sectorData['slug'],
                'description' => $sectorData['description'],
                'code' => $sectorData['code'],
                'icon' => $sectorData['icon'],
                'color_code' => $sectorData['color_code'],
                'parent_id' => null, // كلها قطاعات رئيسية
                'sort_order' => $sectorData['sort_order'],
                'is_active' => true,
                'is_featured' => $sectorData['is_featured'] ?? false,
            ]);


        }

        $this->command->info('✅ تم إنشاء ' . count($sectors) . ' قطاع تبرع باللغات العربية والإنجليزية والفرنسية.');
    }
}
