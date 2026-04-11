<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\Event;
use App\Models\ImpactStat;
use App\Models\Innovation;
use App\Models\Opportunity;
use App\Models\Partner;
use App\Models\Program;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@kijana.africa'], [
            'name' => 'Kijana Admin',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        Program::insert([
            ['title' => 'Digital Skills Training', 'description' => 'Data analytics, AI/ML, software and web development.', 'category' => 'Training', 'duration' => '12 weeks', 'schedule' => 'Weekend Cohorts', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Innovation & Project-Based Learning', 'description' => 'Hackathons and applied innovation labs solving real challenges.', 'category' => 'Innovation', 'duration' => '8 weeks', 'schedule' => 'Hybrid', 'status' => 'active', 'created_at' => now(), 'updated_at' => now()],
        ]);
        Opportunity::insert([
            ['title' => 'AI Bootcamp', 'type' => 'bootcamp', 'description' => 'Practical AI skills for youth.', 'duration' => '4 weeks', 'eligibility' => 'Students and graduates', 'deadline' => now()->addMonth()->toDateString(), 'status' => 'open', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Innovation Challenge', 'type' => 'innovation_challenge', 'description' => 'Build solutions for agriculture, health, and education.', 'duration' => '6 weeks', 'eligibility' => 'Youth innovators', 'deadline' => now()->addWeeks(6)->toDateString(), 'status' => 'open', 'created_at' => now(), 'updated_at' => now()],
        ]);
        Event::insert([
            ['title' => 'Youth Tech Summit', 'description' => 'Regional summit for youth innovators.', 'event_date' => now()->addWeeks(2)->toDateString(), 'location' => 'Dar es Salaam', 'type' => 'workshop', 'is_upcoming' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
        BlogPost::insert([
            ['title' => 'Bridging Talent and Opportunity', 'content' => 'How practical technology pathways transform youth employability.', 'category' => 'Career Advice', 'author' => 'Kijana Team', 'is_published' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
        Innovation::insert([
            ['title' => 'AgriLink', 'description' => 'Youth-led digital marketplace for smallholder farmers.', 'owner_name' => 'Youth Startup Team', 'category' => 'Startup', 'sector' => 'Agriculture', 'status' => 'ongoing', 'created_at' => now(), 'updated_at' => now()],
        ]);
        Partner::insert([
            ['name' => 'University Collaboration Network', 'website' => 'https://example.org', 'description' => 'Academic partnership for training delivery.', 'is_featured' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
        ImpactStat::insert([
            ['title' => 'Youth Trained', 'value' => 500, 'icon' => 'bi-people', 'description' => 'Year 1 training target', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Innovations Supported', 'value' => 60, 'icon' => 'bi-lightbulb', 'description' => '3-year innovation target', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Women Participation', 'value' => 50, 'icon' => 'bi-gender-female', 'description' => 'Minimum annual inclusion target (%)', 'created_at' => now(), 'updated_at' => now()],
        ]);
        TeamMember::insert([
            ['name' => 'Victoria Solomon', 'position' => 'Founder', 'bio' => 'Technology and youth empowerment leader.', 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fanleck John Chaula', 'position' => 'Founder (MBA)', 'bio' => 'Program strategy and innovation ecosystems specialist.', 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fransisca Mwakinyali', 'position' => 'Founder', 'bio' => 'Community engagement and capacity-building expert.', 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
