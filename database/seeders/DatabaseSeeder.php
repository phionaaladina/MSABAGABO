<?php

namespace Database\Seeders;

use App\Models\NewsUpdate;
use App\Models\Partner;
use App\Models\Project;
use App\Models\QuickLink;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'phionaaladina@gmail.com'],
            ['name' => 'Admin', 'password' => bcrypt('password')]
        );

        $quickLinks = [
            ['title' => 'Land & Property', 'href' => 'https://ugnlis.mlhud.go.ug/public', 'icon' => 'quick-links/land.jpg', 'sort_order' => 1],
            ['title' => 'HR Service', 'href' => 'https://hr.hcm.go.ug/hr/security/login?ReturnUrl=%2fhr', 'icon' => 'quick-links/hr.jpg', 'sort_order' => 2],
            ['title' => 'BIMs', 'href' => 'https://bims.go.ug/', 'icon' => 'quick-links/bmis.jpg', 'sort_order' => 3],
            ['title' => 'National ID Application', 'href' => 'https://www.nira.go.ug/home', 'icon' => 'quick-links/id.jpg', 'sort_order' => 4],
            ['title' => 'Passport Application', 'href' => 'https://passports.go.ug/', 'icon' => 'quick-links/passport.jpeg', 'sort_order' => 5],
            ['title' => 'Pay your taxes with URA/EFRIS', 'href' => 'https://ura.go.ug/', 'icon' => 'quick-links/taxes.jpg', 'sort_order' => 6],
        ];

        foreach ($quickLinks as $link) {
            QuickLink::updateOrCreate(['title' => $link['title']], $link);
        }

        $newsUpdates = [
            [
                'title' => 'The Private Sector WASH Financing Forum scheduled for 10th-March-2026, 9:00am at the Municipal Headquarter.',
                'slug' => 'the-private-sector-wash-financing-forum-scheduled-for-10th-march-2026',
                'published_date' => '2026-03-04',
                'image' => 'news/wash.jpg',
                'external_url' => 'https://msabagabo.go.ug/the-private-sector-wash-financing-forum-scheduled-for-10th-march-2026/',
            ],
            [
                'title' => 'FY2026/2027 Municipal Council Budget Approval scheduled for 5th/March/2026',
                'slug' => 'fy2026-2027-municipal-council-budget-approval-scheduled-for-5th-march-2026',
                'published_date' => '2026-03-03',
                'image' => 'news/budget.jpg',
                'external_url' => 'https://msabagabo.go.ug/fy2026-2027-municipal-council-budget-approval-scheduled-for-5th-march-2026/',
            ],
            [
                'title' => 'Laying of Budget for Financial Year 2026/2027 is scheduled on 4th/March/2026.',
                'slug' => 'laying-of-budget-for-financial-year-2026-2027-is-scheduled-on-4th-march-2026',
                'published_date' => '2026-03-03',
                'image' => 'news/budget2.jpg',
                'external_url' => 'https://msabagabo.go.ug/laying-of-budget-for-financial-year-2026-2027-is-scheduled-on-4th-march-2026/',
            ],
        ];

        foreach ($newsUpdates as $news) {
            NewsUpdate::updateOrCreate(['slug' => $news['slug']], $news);
        }

        $projects = [
            ['image' => 'https://msabagabo.go.ug/wp-content/uploads/2026/02/Picture1.jpg', 'caption' => 'Construction of a 4 stored classroom block at Lubugumu Jamia Secondary School.', 'sort_order' => 1],
            ['image' => 'https://msabagabo.go.ug/wp-content/uploads/2026/02/Picture2.jpg', 'caption' => 'Construction of a 2 classrooms block at Aggrey Memorial Secondary School.', 'sort_order' => 2],
            ['image' => 'https://msabagabo.go.ug/wp-content/uploads/2026/02/Picture3.jpg', 'caption' => 'Construction of a 2 classrooms block at Busabala Primary School.', 'sort_order' => 3],
            ['image' => 'https://msabagabo.go.ug/wp-content/uploads/2026/02/Picture4.jpg', 'caption' => 'Construction of a 2 units staff house at Bunamwaya CU Primary School.', 'sort_order' => 4],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['caption' => $project['caption']], $project);
        }

        $partners = [
            ['name' => 'World Bank', 'href' => 'https://www.worldbank.org/ext/en/home', 'icon' => 'partners/world-bank-logo.jpg', 'sort_order' => 1],
            ['name' => 'AFD', 'href' => 'https://www.afd.fr/en', 'icon' => 'partners/AFD-logo.jpg', 'sort_order' => 2],
            ['name' => 'Greater Kampala Metropolitan', 'href' => 'https://msabagabo.go.ug/#', 'icon' => 'partners/Greater-Kampala-Metropolitanlogo.jpg', 'sort_order' => 3],
            ['name' => 'NITA', 'href' => 'https://www.nita.go.ug/', 'icon' => 'partners/nitalogo.png', 'sort_order' => 4],
        ];

        foreach ($partners as $partner) {
            Partner::updateOrCreate(['name' => $partner['name']], $partner);
        }

        $this->call(Phase1ContentSeeder::class);
    }
}
