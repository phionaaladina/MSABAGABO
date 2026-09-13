<?php

namespace App\Http\Controllers;

use App\Models\AboutPageSetting;
use App\Models\Division;
use App\Models\DivisionDutyCategory;
use App\Models\GalleryImage;
use App\Models\HeroSlide;
use App\Models\HomePageSetting;
use App\Models\HomeStat;
use App\Models\Leader;
use App\Models\NewsUpdate;
use App\Models\Partner;
use App\Models\PriorityArea;
use App\Models\Program;
use App\Models\ProgramStat;
use App\Models\Project;
use App\Models\QuickLink;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        return view('public.home', [
            'slides' => HeroSlide::where('is_active', true)->orderBy('sort_order')->get(),
            'stats' => HomeStat::orderBy('sort_order')->get(),
            'homeSettings' => HomePageSetting::firstOrCreate([]),
            'quickLinks' => QuickLink::orderBy('sort_order')->get(),
            'news' => NewsUpdate::where('is_published', true)->orderByDesc('published_date')->get(),
            'projects' => Project::orderBy('sort_order')->get(),
            'partners' => Partner::orderBy('sort_order')->get(),
        ]);
    }

    public function about(): View
    {
        return view('public.about', [
            'settings' => AboutPageSetting::firstOrCreate([]),
            'leaders' => Leader::orderBy('sort_order')->get(),
            'priorityAreas' => PriorityArea::orderBy('sort_order')->get(),
        ]);
    }

    public function divisions(): View
    {
        return view('public.divisions', [
            'divisions' => Division::orderBy('sort_order')->get(),
            'dutyCategories' => DivisionDutyCategory::with('duties')->orderBy('sort_order')->get(),
        ]);
    }

    public function division(string $slug): View
    {
        return view('public.division-detail', [
            'division' => Division::where('slug', $slug)->firstOrFail(),
            'dutyCategories' => DivisionDutyCategory::with('duties')->orderBy('sort_order')->get(),
        ]);
    }

    public function news(): View
    {
        return view('public.news.index', [
            'news' => NewsUpdate::where('is_published', true)->orderByDesc('published_date')->get(),
        ]);
    }

    public function newsDetail(string $slug): View
    {
        return view('public.news.detail', [
            'article' => NewsUpdate::where('is_published', true)->where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function gallery(): View
    {
        return view('public.gallery', [
            'images' => GalleryImage::orderBy('sort_order')->get(),
            'partners' => Partner::orderBy('sort_order')->get(),
        ]);
    }

    public function programs(): View
    {
        return view('public.programs', [
            'programs' => Program::orderBy('sort_order')->get(),
            'stats' => ProgramStat::orderBy('sort_order')->get(),
        ]);
    }

    public function jobs(): View
    {
        return view('public.jobs');
    }

    public function library(): View
    {
        return view('public.library', [
            'partners' => Partner::orderBy('sort_order')->get(),
        ]);
    }

    public function contact(): View
    {
        return view('public.contact', [
            'settings' => SiteSetting::firstOrCreate([]),
        ]);
    }

    public function department(string $slug): View
    {
        $departments = [
            'administration' => [
                'title' => 'Administration Department',
                'tagline' => 'The engine room of the Council — policy, people, and resources.',
                'overview' => 'Administration keeps nine directorates and three divisions moving in the same direction, turning council decisions and national policy into results on the ground.',
                'mandate' => 'Policy, resources, and leadership for the Institution.',
                'heading' => 'What We’re Driving Towards',
                'items' => ['Grow the areas that matter most.', 'Back the private sector to create jobs.', 'Build infrastructure that lasts.', 'Improve wellbeing for every resident.', 'Lead development with a steady hand.'],
            ],
            'community-based-services' => [
                'title' => 'Community Based Services Department',
                'tagline' => 'Protecting the vulnerable. Strengthening the community.',
                'overview' => 'Community Based Services mobilizes and supports vulnerable groups, coordinates social welfare data, and links residents to government and partner programs across the municipality.',
                'mandate' => 'Promote social protection, equality, equity, human rights, culture, and decent work conditions.',
                'heading' => 'Focus Areas',
                'items' => ['Mobilize vulnerable groups across the municipality.', 'Build their capacity to stand on their own.', 'Link them to government and partner programs.', 'Coordinate social welfare data and analysis.', 'Supervise statutory community care obligations.'],
            ],
            'education' => [
                'title' => 'Education Department',
                'tagline' => 'Equipping every child with the knowledge to shape their future.',
                'overview' => 'The Education Department oversees UPE and USE schools across the municipality, drawing its authority from the Education Act 2008 and Uganda’s 1995 Constitution, in line with Vision 2040.',
                'mandate' => 'To provide education to all school-going children, equipping them with knowledge, skills, values and attitudes for sustainable development.',
                'heading' => 'What Keeps Schools Running',
                'items' => ['Implement education laws, policies, and regulations.', 'Roll out approved education and development plans.', 'Offer technical advice on education and sports.', 'Organize teachers’ awareness training.', 'Coordinate school inspection and educational activities.', 'Monitor educational events and examinations.', 'Maintain an updated teachers’ personnel database.', 'Sensitize private schools for digital licensing.', 'Generate and disseminate data and statistics for planning.'],
            ],
            'finance-accounting' => [
                'title' => 'Finance & Accounting Department',
                'tagline' => 'Managing public funds with accountability and transparency.',
                'overview' => 'Finance & Accounting supervises the municipality’s financial activities under the Local Governments Financial and Accounting Regulations, grows revenue collection to meet service delivery standards, and promotes accountability through required financial reporting.',
                'mandate' => 'To improve the management and accountability of the financial resources of the municipality.',
                'heading' => 'What Keeps The Books Balanced',
                'items' => ['Coordinate Revenue Collection', 'Manage Financial Resources', 'Municipality Budgets', 'Financial Reporting', 'Development Planning'],
            ],
            'health' => [
                'title' => 'Health Department',
                'tagline' => 'Care that reaches every home in the municipality.',
                'overview' => 'Six government-aided facilities — five public, one PNFP — put most residents within 5km of care, backed by 110 trained Village Health Teams (55 ICCM-trained).',
                'mandate' => 'Contribute to the improvement of health care services for the people in the municipality, so as to lead a socially and economically productive life.',
                'heading' => 'Health Facilities',
                'items' => ['Ndejje Health Centre IV', 'Mutungo Health Centre II', 'Bunamwaya Health Centre II', 'Seguku Health Centre II', 'Mutundwe Health Centre II', 'Magdalene Health Centre III (PNFP)'],
            ],
            'natural-resources' => [
                'title' => 'Natural Resources Department',
                'tagline' => 'Protecting what the municipality can’t grow back.',
                'overview' => 'Natural resources are conserved and managed sustainably for the benefit of the local, national and international community — providing continuous, sustainable benefits while contributing to environmental conservation and protection.',
                'mandate' => 'Implement the National Environment Management and National Wetland Management Policies.',
                'heading' => 'How We Protect Our Environment',
                'items' => ['Coordinate implementation of policies on natural resource exploitation.', 'Provide natural resources extension services.', 'Create environmental management awareness.', 'Ascertain compliance to land use regulations and municipal infrastructure designs.', 'Guide urban growth and approve building plans.', 'Ensure conservation of natural resources and biodiversity.', 'Greening of the municipality.'],
            ],
            'production-marketing' => [
                'title' => 'Production & Marketing Department',
                'tagline' => 'Growing farmers, markets, and livelihoods.',
                'overview' => 'About 70,780 farming households across the municipality grow bananas, cassava, maize, vegetables and fruits, and raise livestock and fish under zero-grazing, semi-intensive, extensive and intensive systems. We help them turn that into prosperity.',
                'mandate' => 'Ensure policy formulation and implementation of Council resolution.',
                'heading' => 'How We Support Farmers',
                'items' => ['Formulates and implements standards, plans and strategies on crop production, livestock farming and fisheries development.', 'Disseminate appropriate production technologies to the farming communities.', 'Focuses on increasing agricultural yields, promoting food security, and urban farming.', 'Collects, analyses and disseminates data on agricultural production.', 'Promotes value chain addition in agriculture, ensuring sustainable resource use.'],
            ],
            'works-engineering' => [
                'title' => 'Works and Engineering Department',
                'tagline' => 'Building the roads, structures and systems the municipality runs on.',
                'overview' => 'Works and Engineering ensures sustainable, planned development across roads, physical planning, environment, buildings, water and engineering sectors in the municipality.',
                'mandate' => 'Delivery of reliable and safe engineering works and transport infrastructure and services.',
                'heading' => 'What Keeps The Municipality Built',
                'items' => ['Enforce engineering and works laws, policies, and regulations.', 'Verify and recommend plans for civil works and structural plans.', 'Supervise all technical works in the Municipal Council.', 'Develop a Master Plan and Engineering Designs for the Municipal Council.', 'Construct and rehabilitate Municipal Council roads as per approved budgets and work plans.', 'Operationalize physical planning and building control laws.', 'Provide technical advice and guidance to stakeholders.', 'Prepare technical specifications of contracts.'],
            ],
            'statutory-bodies' => [
                'title' => 'Statutory Bodies',
                'tagline' => 'The boards and committees that keep governance accountable.',
                'overview' => 'Statutory Bodies brings together the boards, commissions and committees established under the Local Governments Act to guide decision-making, safeguard public resources, and keep the Municipal Council accountable to residents.',
                'mandate' => null,
                'heading' => 'What This Page Covers',
                'items' => ['Detailed information on individual boards and committees will be published here soon.'],
            ],
            'trade-industry-led' => [
                'title' => 'Trade, Industry & LED Department',
                'tagline' => 'Growing local enterprise and opportunity.',
                'overview' => 'The department supports local economic development, trade, industry, enterprise growth and inclusive livelihoods across the municipality.',
                'mandate' => 'Promote sustainable local economic development and inclusive enterprise.',
                'heading' => 'Focus Areas',
                'items' => ['Enterprise development', 'Market linkages', 'Business support and compliance', 'Local economic development planning'],
            ],
            'internal-audit' => [
                'title' => 'Internal Audit Department',
                'tagline' => 'Strengthening accountability through independent assurance.',
                'overview' => 'Internal Audit provides independent assurance and advisory services to improve governance, risk management and control across the municipality.',
                'mandate' => 'Support effective, transparent and accountable municipal operations.',
                'heading' => 'Core Functions',
                'items' => ['Audit planning and reporting', 'Risk-based reviews', 'Internal controls assessment', 'Follow-up of audit recommendations'],
            ],
        ];

        abort_unless(isset($departments[$slug]), 404);

        return view('public.department', ['department' => $departments[$slug], 'slug' => $slug]);
    }
}
