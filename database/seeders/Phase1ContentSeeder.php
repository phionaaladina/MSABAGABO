<?php

namespace Database\Seeders;

use App\Models\AboutPageSetting;
use App\Models\Division;
use App\Models\DivisionDutyCategory;
use App\Models\GalleryImage;
use App\Models\HeroSlide;
use App\Models\HomePageSetting;
use App\Models\HomeStat;
use App\Models\Leader;
use App\Models\PriorityArea;
use App\Models\Program;
use App\Models\ProgramStat;
use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class Phase1ContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedHeroSlides();
        $this->seedHomeStats();
        $this->seedDivisions();
        $this->seedPrograms();
        $this->seedGallery();
        $this->seedLeaders();
        $this->seedPriorityAreas();
        $this->seedSiteSettings();
        $this->seedAboutPageSettings();
        $this->seedHomePageSettings();
    }

    private function seedHeroSlides(): void
    {
        $slides = [
            ['title' => 'Building The Ssabagabo Of Tomorrow', 'description' => 'UGX 460 billion in roads, drainage and public works underway across the Municipality.', 'image' => 'hero-slides/groundbreaking.jpeg', 'label' => 'Groundbreaking Ceremony', 'sort_order' => 1],
            ['title' => 'A Metro That Works For You', 'description' => 'World Bank and AFD-backed investment connecting Makindye Ssabagabo to Greater Kampala.', 'image' => 'hero-slides/hero-event-12.jpg', 'label' => 'GKMA-UDP Community Engagement', 'sort_order' => 2],
            ['title' => 'Deals That Build Communities', 'description' => 'Formal agreements turning national programs into paved roads, classrooms and clean water.', 'image' => 'hero-slides/contractsigning.jpg', 'label' => 'Contract Signing', 'sort_order' => 3],
            ['title' => 'Service, Measured And Delivered', 'description' => 'Data-driven planning and transparent budgeting guiding every shilling we spend.', 'image' => 'hero-slides/bencmarking.jpg', 'label' => 'Benchmarking Review', 'sort_order' => 4],
            ['title' => '439,605 Residents. One Municipality.', 'description' => 'From Bunamwaya to Ndejje — services, opportunity, and a voice for every resident.', 'image' => 'hero-slides/hero-event-01.jpg', 'label' => 'Grievance Redress Committee — Field Team', 'sort_order' => 5],
        ];

        foreach ($slides as $slide) {
            HeroSlide::updateOrCreate(['title' => $slide['title']], $slide);
        }
    }

    private function seedHomeStats(): void
    {
        $stats = [
            ['value' => 3, 'suffix' => null, 'label' => 'Divisions served', 'sort_order' => 1],
            ['value' => 11, 'suffix' => null, 'label' => 'Departments', 'sort_order' => 2],
            ['value' => 50, 'suffix' => '+', 'label' => 'Active projects', 'sort_order' => 3],
            ['value' => 439605, 'suffix' => null, 'label' => 'Residents', 'sort_order' => 4],
        ];

        foreach ($stats as $stat) {
            HomeStat::updateOrCreate(['label' => $stat['label']], $stat);
        }
    }

    private function seedDivisions(): void
    {
        $divisions = [
            ['slug' => 'bunamwaya', 'name' => 'Bunamwaya Division', 'tagline' => 'Grassroots governance and service delivery for the parishes of Bunamwaya.', 'image' => 'divisions/bunamwaya.jpg', 'sort_order' => 1],
            ['slug' => 'masajja', 'name' => 'Masajja Division', 'tagline' => 'Grassroots governance and service delivery for the parishes of Masajja.', 'image' => 'divisions/masajja.jpg', 'sort_order' => 2],
            ['slug' => 'ndejje', 'name' => 'Ndejje Division', 'tagline' => 'Grassroots governance and service delivery for the parishes of Ndejje.', 'image' => 'divisions/ndejje.jpeg', 'sort_order' => 3],
        ];

        foreach ($divisions as $division) {
            Division::updateOrCreate(['slug' => $division['slug']], $division);
        }

        $categories = [
            [
                'name' => 'Governance & Law',
                'sort_order' => 1,
                'duties' => [
                    ['title' => 'Make By-Laws', 'description' => 'Make by-laws applicable within the division, consistent with national laws and policies.'],
                    ['title' => 'Laws & Regulations', 'description' => 'Enforce council by-laws and regulations.'],
                    ['title' => 'Local Council Courts', 'description' => 'Work with local council courts where applicable.'],
                    ['title' => 'Conflict Resolution', 'description' => 'Mediate and resolve local disputes where possible, especially at grassroots levels.'],
                ],
            ],
            [
                'name' => 'Planning & Resources',
                'sort_order' => 2,
                'duties' => [
                    ['title' => 'Work Plans', 'description' => 'Approve work plans, budgets, and reports for the division.'],
                    ['title' => 'Local Development', 'description' => 'Participate in the formulation of local development plans.'],
                    ['title' => 'Resource Allocation', 'description' => 'Prioritize and allocate resources based on local needs.'],
                    ['title' => 'Monitoring', 'description' => 'Monitor and evaluate the implementation of programs and projects.'],
                ],
            ],
            [
                'name' => 'Community Engagement',
                'sort_order' => 3,
                'duties' => [
                    ['title' => 'Representation', 'description' => 'Represent the views and interests of residents in the division.'],
                    ['title' => 'Community Development', 'description' => 'Mobilize the community for development and public participation.'],
                    ['title' => 'Civic Education', 'description' => 'Promote civic education and public awareness.'],
                    ['title' => 'Civil Society', 'description' => 'Coordinate with civil society, NGOs, and development partners operating in the area.'],
                ],
            ],
            [
                'name' => 'Oversight & Accountability',
                'sort_order' => 4,
                'duties' => [
                    ['title' => 'Supervise', 'description' => 'Oversee the implementation of council decisions and service delivery.'],
                    ['title' => 'Local Councils', 'description' => 'Supervise lower local councils like parishes and villages.'],
                    ['title' => 'Accountability', 'description' => 'Ensure transparency, accountability, and proper use of public resources.'],
                ],
            ],
            [
                'name' => 'Service Delivery & Public Order',
                'sort_order' => 5,
                'duties' => [
                    ['title' => 'Service Delivery', 'description' => 'Monitor service delivery (education, health, sanitation, roads, etc.) at the division level.'],
                    ['title' => 'Sanitation', 'description' => 'Support and implement sanitation and garbage collection policies within the division.'],
                    ['title' => 'Public & Health Standards', 'description' => 'Support law enforcement efforts, especially in maintaining public order and health standards.'],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $duties = $categoryData['duties'];
            unset($categoryData['duties']);

            $category = DivisionDutyCategory::updateOrCreate(['name' => $categoryData['name']], $categoryData);

            foreach ($duties as $index => $duty) {
                $category->duties()->updateOrCreate(
                    ['title' => $duty['title']],
                    [...$duty, 'sort_order' => $index + 1]
                );
            }
        }
    }

    private function seedPrograms(): void
    {
        $programs = [
            ['acronym' => 'GKMA-UDP', 'name' => 'Greater Kampala Metropolitan Area Urban Development Program', 'tagline' => 'Roads, drainage and jobs across the Kampala metro area.', 'fact' => 'UGX 460B · 5-year investment', 'description' => "GKMA-UDP is a Government of Uganda programme supporting nine Greater Kampala entities: KCCA, Wakiso, Mukono and Mpigi local governments, and the municipalities of Kira, Nansana, Makindye Ssabagabo, Mukono and Entebbe.\n\nIt aims to improve mobility and connectivity, workspaces, job creation, climate resilience, environmental management and institutional capacity. The programme is worth UGX 460 billion over five years and is supported by the World Bank and AFD.\n\nKey focus areas include better roads and public transport, storm-water drainage, solid waste management, green spaces, vendor and business facilities, youth employment and stronger municipal systems.\n\nFunding uses performance-based financing. Implementing local governments earn infrastructure funding by meeting agreed annual performance indicators and delivering results.", 'image' => 'programs/gkma-udp.jpg', 'theme' => 'infrastructure', 'sort_order' => 1],
            ['acronym' => 'Projects', 'name' => 'Municipal Infrastructure Projects', 'tagline' => 'New classroom blocks and public infrastructure, underway now.', 'fact' => 'Schools, buildings and public works', 'description' => 'Makindye Ssabagabo Municipal Council delivers public infrastructure as part of its service mandate.\n\nCurrent work includes improved education facilities, spacious classrooms and public buildings. A two-classroom block with an office was completed at Lubugumu UMEA, while a storeyed building is under construction at Namasuba UMEA.\n\nThe projects page also highlights housing and classroom improvements, technical works and planning under the Greater Kampala Metropolitan Area Master Plan, prepared by Government with support from the Japan International Cooperation Agency (JICA).', 'image' => 'programs/projects.jpeg', 'theme' => 'infrastructure', 'sort_order' => 2],
            ['acronym' => 'WEP', 'name' => 'Uganda Women Entrepreneurship Programme', 'tagline' => 'Interest-free capital and skills training for women in business.', 'fact' => 'Up to UGX 12.5M · 0% interest', 'description' => 'The Uganda Women Entrepreneurship Programme (UWEP) improves women\'s access to finance, enterprise skills, value addition, markets and appropriate technology. It is implemented under the Ministry of Gender, Labour and Social Development.\n\nWomen receive enterprise training and interest-free revolving credit through groups of 10-15 members. The programme prioritises unemployed women, single mothers, widows, survivors of gender-based violence, women with disabilities, women living with HIV/AIDS, household heads, women in hard-to-reach areas and other vulnerable groups.\n\nRepayments attract no interest during the first 12 months, followed by a 5% annual service fee. No physical collateral is required, and repayment normally runs for 1-3 years depending on the enterprise. Districts can approve proposals up to UGX 12.5 million; larger proposals may be approved by the Ministry.', 'image' => 'programs/wep.jpg', 'theme' => 'economic', 'sort_order' => 3],
            ['acronym' => 'YLP', 'name' => 'Youth Livelihood Programme', 'tagline' => 'Soft loans and vocational skills for unemployed youth.', 'fact' => 'No collateral · ages 18–30', 'description' => "The Youth Livelihood Programme is a Government of Uganda response to youth unemployment and poverty. It supports unemployed and poor young people aged 18-30, including school dropouts, graduates, youth with disabilities, single parents and youth living with HIV/AIDS.\n\nYLP has three components: marketable skills development, livelihood support and institutional support. Skills may include tailoring, carpentry, masonry, metal fabrication, hairdressing, agro-processing, ICT, mechanics and other trades. Livelihood support provides productive assets for viable income-generating activities such as poultry, dairy, crops, aquaculture, trade and services.\n\nSupport is delivered through Youth Interest Groups of 10-15 people. Groups can access revolving soft loans without physical collateral, with flexible repayment of 1-3 years. There is no interest in the first 12 months, followed by a 5% annual surcharge, and group requests may range from UGX 1 million to UGX 25 million.", 'image' => 'programs/ylp.jpg', 'theme' => 'economic', 'sort_order' => 4],
            ['acronym' => 'PDM', 'name' => 'Parish Development Model', 'tagline' => 'Parish-level SACCOs moving households into the money economy.', 'fact' => '7 pillars · parish SACCOs', 'description' => "The Parish Development Model uses the parish or ward as the centre of government support, helping subsistence households move into the money economy and improve their incomes and quality of life.\n\nIt supports households across production, storage, processing and marketing, while improving infrastructure, financial inclusion and social services. The seven pillars are agricultural value-chain development; infrastructure and economic services; financial inclusion; social services; community mobilisation and mindset change; the parish management information system; and governance and administration.\n\nEnterprise groups may include farmers, youth, community organisations and traders. Groups normally have 10-30 members and can join a PDM SACCO after meeting the required formation and registration conditions.", 'image' => 'programs/pdm.jpg', 'theme' => 'economic', 'sort_order' => 5],
            ['acronym' => 'UPE', 'name' => 'Universal Primary Education', 'tagline' => 'Free tuition in government primary schools, since 1997.', 'fact' => 'Free tuition · nationwide', 'description' => 'Universal Primary Education was launched in 1997 to provide free primary education to children across Uganda. Government support includes capitation, learning materials, teacher deployment, classroom construction and curriculum development.\n\nUPE has expanded access, improved enrolment for girls and disadvantaged children, reduced the wealth gap in school attendance and supported more inclusive education for children with disabilities. It also helped narrow the gender enrolment gap and increased education spending and staffing.\n\nChallenges remain in hard-to-reach areas, teacher training, infrastructure and learning quality. The programme continues to support access to government-aided primary schools in Makindye Ssabagabo.', 'image' => 'programs/upe.jpg', 'theme' => 'education', 'sort_order' => 6],
            ['acronym' => 'USE', 'name' => 'Universal Secondary Education', 'tagline' => 'Subsidized secondary tuition so more teens stay in school.', 'fact' => 'UGX 47,000 · per student/term', 'description' => 'Universal Secondary Education was introduced in 2007 to expand access to secondary school, especially for families in areas with limited government and government-aided schools.\n\nGovernment provides a fixed subsidy of UGX 47,000 per student per term to eligible government and participating private schools. Students who meet the required Primary Leaving Examination standard can access the programme; parents continue to provide uniforms, stationery and meals.\n\nParticipating schools must submit work plans, budgets and progress reports, with financial management and accountability controls. USE began with Senior One in 2007 and expanded year by year. It has helped increase secondary enrolment, including enrolment of girls from lower-income households.', 'image' => 'programs/use.jpg', 'theme' => 'education', 'sort_order' => 7],
            ['acronym' => 'SAGE', 'name' => 'Social Assistance Grants for Empowerment', 'tagline' => 'Monthly cash grants for senior citizens, no strings attached.', 'fact' => 'Unconditional · monthly stipend', 'description' => 'SAGE, best known locally as the Senior Citizens Grant, is a social protection programme for older people. It provides a regular unconditional cash transfer to eligible senior citizens through the Ministry of Gender, Labour and Social Development.\n\nThe grant helps older residents meet essential needs, manage vulnerability and maintain dignity when they can no longer rely on regular employment or family support. Unlike a loan or enterprise fund, it does not require repayment, collateral or participation in a business group.\n\nThe programme is part of the national effort to reduce old-age poverty and strengthen household welfare. Local implementation depends on community mobilisation, registration and verification of eligible beneficiaries.', 'image' => 'programs/sage.jpg', 'theme' => 'protection', 'sort_order' => 8],
            ['acronym' => 'GRM', 'name' => 'Grievance Redress Mechanism', 'tagline' => 'A committee that hears project complaints and gets them fixed.', 'fact' => 'Field visits · case reviews', 'description' => 'The Grievance Redress Mechanism gives residents a safe, formal channel to raise concerns about Council projects, construction impacts, land and property issues, access routes, compensation or service delivery.\n\nThe Grievance Redress Committee receives and records complaints, engages the affected person, conducts field visits and site inspections, reviews evidence and works with technical teams, contractors and community leaders to agree on a response.\n\nGRM supports transparency under projects such as GKMA-UDP. It helps identify problems early, keeps communities informed and provides a documented route for follow-up instead of leaving residents without an answer.', 'image' => 'programs/grm.jpg', 'theme' => 'governance', 'sort_order' => 9],
            ['acronym' => 'MDF', 'name' => 'Metropolitan Development Forum', 'tagline' => 'Stakeholders meet regularly to shape local priorities.', 'fact' => 'Meets bi-monthly · community-led', 'description' => 'The Metropolitan Development Forum is a stakeholder platform linked to Greater Kampala development work. It brings together municipal leaders, technical officers, residents, community representatives, private-sector actors and development partners.\n\nThe forum creates space to share project information, discuss local priorities, hear community concerns and coordinate actions across the metropolitan area. Meetings and engagements help connect major infrastructure investments with the needs of neighbourhoods, businesses and service users.\n\nIts value is practical: stakeholders can review progress, raise issues, exchange ideas and build shared ownership of urban development instead of relying on decisions made without local participation.', 'image' => 'programs/mdf.jpg', 'theme' => 'governance', 'sort_order' => 10],
        ];

        foreach ($programs as $program) {
            Program::updateOrCreate(['acronym' => $program['acronym']], $program);
        }

        $stats = [
            ['value' => 'UGX 460B', 'label' => 'GKMA-UDP metro investment', 'sort_order' => 1],
            ['value' => 'UGX 265B', 'label' => 'National youth livelihood fund', 'sort_order' => 2],
            ['value' => 'UGX 12.5M', 'label' => "Max women's enterprise loan", 'sort_order' => 3],
            ['value' => 'Free', 'label' => 'Primary & secondary tuition support', 'sort_order' => 4],
        ];

        foreach ($stats as $stat) {
            ProgramStat::updateOrCreate(['label' => $stat['label']], $stat);
        }
    }

    private function seedGallery(): void
    {
        $images = [
            ['image' => 'gallery/event-01.jpg', 'category' => 'governance', 'title' => 'Grievance Redress Committee — Field Team', 'caption' => "The Municipal Council's Grievance Redress Committee assembles ahead of a site verification exercise under the GKMA Urban Development Program."],
            ['image' => 'gallery/event-02.jpg', 'category' => 'governance', 'title' => 'GRC Team Muster', 'caption' => 'Committee members gather before heading out to visit project-affected sites.'],
            ['image' => 'gallery/event-03.jpg', 'category' => 'works', 'title' => 'Site Safety Orientation', 'caption' => 'Workers and community representatives attend a safety induction ahead of construction activities.'],
            ['image' => 'gallery/event-04.jpg', 'category' => 'governance', 'title' => 'Construction Site Inspection', 'caption' => 'The Grievance Redress Committee inspects an ongoing building project to verify progress and address community concerns.'],
            ['image' => 'gallery/event-05.jpg', 'category' => 'governance', 'title' => 'Community Consultation', 'caption' => 'Residents and traders gather at a local trading center for a public consultation on planned works.'],
            ['image' => 'gallery/event-06.jpg', 'category' => 'governance', 'title' => 'Grievance Case Review', 'caption' => 'Committee members and residents review a grievance case during a closed-door session.'],
            ['image' => 'gallery/event-07.jpg', 'category' => 'works', 'title' => 'Project Corridor Walk-Through', 'caption' => 'The Grievance Redress Committee walks the project corridor to assess affected properties.'],
            ['image' => 'gallery/event-08.jpg', 'category' => 'works', 'title' => 'Site Walk-Through', 'caption' => 'Committee members and residents tour a section of the development corridor.'],
            ['image' => 'gallery/event-09.jpg', 'category' => 'partners', 'title' => 'World Bank Team Site Visit', 'caption' => 'A World Bank delegation joins Council leadership on a project monitoring visit.'],
            ['image' => 'gallery/event-10.jpg', 'category' => 'works', 'title' => 'Works Site Visit', 'caption' => 'Municipal officials inspect ongoing works at a project site.'],
            ['image' => 'gallery/event-11.jpg', 'category' => 'works', 'title' => 'Drainage Corridor Inspection', 'caption' => 'The team walks a drainage and road corridor to assess progress and encroachments.'],
            ['image' => 'gallery/event-12.jpg', 'category' => 'partners', 'title' => 'GKMA-UDP Community Engagement', 'caption' => 'Council leaders and residents at a Greater Kampala Metropolitan Area Urban Development Program community event.'],
        ];

        foreach ($images as $index => $image) {
            GalleryImage::updateOrCreate(['title' => $image['title']], [...$image, 'sort_order' => $index + 1]);
        }
    }

    private function seedLeaders(): void
    {
        $leaders = [
            ['name' => 'Galabuzi Bosco Sserunkuma', 'title' => 'Mayor', 'sort_order' => 1],
            ['name' => 'Otimong Moses', 'title' => 'Town Clerk', 'sort_order' => 2],
            ['name' => 'Mukiibi Bilali Katende', 'title' => 'Municipal Speaker', 'sort_order' => 3],
        ];

        foreach ($leaders as $leader) {
            Leader::updateOrCreate(['name' => $leader['name']], $leader);
        }
    }

    private function seedPriorityAreas(): void
    {
        $areas = [
            ['title' => 'Infrastructure Development', 'image' => 'about/priority-infrastructure.jpeg', 'description' => 'Emphasis on road tarmacking, installation of street lights, construction of drainage systems, and municipal beautification.'],
            ['title' => 'Education Sector Development', 'image' => 'about/priority-education.jpg', 'description' => "Construction of new classroom blocks, teachers' houses, latrine facilities, and provision of learning materials."],
            ['title' => 'Healthcare Strengthening', 'image' => 'about/priority-health.jpg', 'description' => 'Construction and renovation of health facilities, provision of medical supplies, and community health outreaches.'],
            ['title' => 'Environmental Protection', 'image' => 'about/priority-environment.jpg', 'description' => 'Tree planting, wetland restoration, solid waste management, and enforcement of environmental laws.'],
            ['title' => 'Revenue Enhancement', 'image' => 'about/priority-revenue.jpg', 'description' => 'Streamlining of revenue collection through digital systems, expansion of the revenue base, and sensitization of taxpayers.'],
            ['title' => 'Youth and Women Empowerment', 'image' => 'about/priority-youth.jpg', 'description' => 'Skills development, entrepreneurship support, and access to special grants (YLP, UWEP).'],
            ['title' => 'Governance and Community Engagement', 'image' => 'about/priority-governance.jpg', 'description' => 'Regular Baraza meetings, feedback mechanisms, and transparency initiatives.'],
            ['title' => 'Urban Planning and Regulation', 'image' => 'about/priority-planning.jpg', 'description' => 'Proper land use planning, development of structural plans, and enforcement of physical planning laws.'],
        ];

        foreach ($areas as $index => $area) {
            PriorityArea::updateOrCreate(['title' => $area['title']], [...$area, 'sort_order' => $index + 1]);
        }
    }

    private function seedSiteSettings(): void
    {
        SiteSetting::firstOrCreate([])->update([
            'address' => "Makindye Ssabagabo Municipal Council\nP.O Box 1872, Kampala, Uganda\nNdejje Zanta",
            'phones' => [
                ['label' => 'Town Clerk', 'number' => '+256 326 808091'],
                ['label' => 'Deputy Town Clerk', 'number' => '+256 326 808092'],
                ['label' => 'Mayor', 'number' => '+256 326 808093'],
                ['label' => 'Finance', 'number' => '+256 326 808094'],
                ['label' => 'Toll Free', 'number' => '0800 2562 60'],
            ],
            'emails' => [
                ['label' => 'General', 'email' => 'info@msabagabo.go.ug'],
                ['label' => 'Alternate', 'email' => 'Makindyessabagabomc@gmail.com'],
            ],
            'socials' => [
                ['label' => 'Facebook', 'href' => '#'],
                ['label' => 'X (Twitter)', 'href' => '#'],
                ['label' => 'TikTok', 'href' => '#'],
                ['label' => 'YouTube', 'href' => '#'],
            ],
            'map_embed_url' => 'https://www.google.com/maps?q=Makindye+Ssabagabo+Municipal+Council,+Ndejje,+Uganda&output=embed',
            'directions_url' => 'https://maps.app.goo.gl/8tFGDjcqJw99XzFy8',
            'whatsapp_number' => '256772653980',
        ]);
    }

    private function seedAboutPageSettings(): void
    {
        AboutPageSetting::firstOrCreate([])->update([
            'hero_title' => 'About Makindye Ssabagabo Municipal Council',
            'history_intro' => "Makindye Ssabagabo is one of the four newly created Municipal Councils in Wakiso District, having been upgraded to Municipal status in 2015 from a sub-county. The Municipal Council is located in Wakiso District, bordering Kampala City in the North, Kajjansi Town Council in the West, and Lake Victoria in the South East.\n\nSince inception, the Municipal Council has embarked on the implementation of its urban mandate in the bid to render improved service delivery to the citizenry. The Municipality has a total land area of 87.2 sq. km and a total road network of 393km, of which 18% is paved and 72% is gravel. Makindye Ssabagabo has a total population of 439,605 as per the recent UBOS census report 2024, of which 229,298 and 210,307 are males and females respectively.",
            'mandate_intro' => 'Our mandate is to offer Urban decentralized services to the people, subject to Article 176 of the Constitution of the Republic of Uganda, 1995 as amended, and sections 105, 106, 107 and 108, including Schedule 5, part 3 and part 5 of the Local Governments Act Cap.138.',
            'mandate_promise' => 'The Municipal Council shall perform the following functions and offer services as conditioned in the second schedule of the Local Government Act Cap 243:',
            'priority_areas_intro' => 'Over the five-year period, Makindye Ssabagabo Municipal Council has prioritized the following areas to improve the quality of life for residents:',
            'leadership_intro' => 'The Municipal Council has both Administrative and Political Leadership, headed by the Town Clerk and His Worship the Mayor respectively.',
            'quick_facts' => [
                ['label' => 'Divisions', 'value' => '3'],
                ['label' => 'Area', 'value' => '87.2 km²'],
                ['label' => 'Road Network', 'value' => '393 km'],
                ['label' => 'Population (2024)', 'value' => '439,605'],
            ],
            'pillars' => [
                ['tag' => 'Vision', 'text' => 'A well-planned, clean and prosperous Municipal Council.'],
                ['tag' => 'Mission', 'text' => 'To provide Quality, Cost-Effective and Sustainable Urban Driven Services.'],
                ['tag' => 'Development Goal', 'text' => 'A Municipal Council where people live a quality life through access to basic social services with sustainable household income.'],
            ],
            'mandate_functions' => [
                'Establish, acquire, erect, maintain, promote citizenry activity.',
                'Establish, maintain or control public parks, garden and recreation grounds.',
                'Establish, erect, maintain and control public facilities.',
                'Prohibit, restrict, regulate licensing.',
                'Decorate streets and public buildings / structures.',
            ],
        ]);
    }

    private function seedHomePageSettings(): void
    {
        HomePageSetting::firstOrCreate([])->update([
            'about_teaser_heading' => 'Makindye Ssabagabo Municipal Council',
            'about_teaser_text' => 'Makindye Ssabagabo Municipal Council serves three divisions with a mandate to deliver public services, drive local development, and give residents a direct voice in how their community grows.',
            'about_teaser_image' => 'home-page/about-teaser.jpg',
            'about_teaser_link_url' => '/about',
            'cta_heading' => 'Have a concern or an idea for your community?',
            'cta_text' => "Reach out to the Municipal Council — we're here to listen and respond.",
            'view_all_news_url' => 'https://msabagabo.go.ug/news-media/',
        ]);
    }
}
