<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\BlogPost;
use App\Models\ContactMessage;
use App\Models\Event;
use App\Models\ImpactStat;
use App\Models\Innovation;
use App\Models\NewsletterSubscriber;
use App\Models\Opportunity;
use App\Models\Partner;
use App\Models\Program;
use App\Models\TeamMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WebsiteController extends Controller
{
    public function home(): View
    {
        return view('websitepart.home', [
            'programs' => Program::where('status', 'active')->latest()->take(4)->get(),
            'opportunities' => Opportunity::where('status', 'open')->orderBy('deadline')->take(4)->get(),
            'innovations' => Innovation::latest()->take(6)->get(),
            'partners' => Partner::where('is_featured', true)->take(8)->get(),
            'impactStats' => ImpactStat::take(4)->get(),
            'events' => Event::where('is_upcoming', true)->orderBy('event_date')->take(3)->get(),
        ]);
    }

    public function about(): View
    {
        return view('websitepart.about', [
            'teamMembers' => TeamMember::orderBy('sort_order')->get(),
        ]);
    }

    public function programs(): View
    {
        return view('websitepart.programs', ['programs' => Program::latest()->get()]);
    }

    public function opportunities(): View
    {
        return view('websitepart.opportunities', ['opportunities' => Opportunity::latest()->get()]);
    }

    public function innovationHub(): View
    {
        return view('websitepart.innovation-hub', ['innovations' => Innovation::latest()->get()]);
    }

    public function impact(): View
    {
        return view('websitepart.impact', ['impactStats' => ImpactStat::latest()->get()]);
    }

    public function partnerships(): View
    {
        return view('websitepart.partnerships', ['partners' => Partner::latest()->get()]);
    }

    public function events(): View
    {
        return view('websitepart.events', [
            'upcoming' => Event::where('is_upcoming', true)->orderBy('event_date')->get(),
            'past' => Event::where('is_upcoming', false)->latest('event_date')->get(),
        ]);
    }

    public function blog(): View
    {
        return view('websitepart.blog', ['posts' => BlogPost::where('is_published', true)->latest()->get()]);
    }

    public function getInvolved(): View
    {
        return view('websitepart.get-involved', [
            'programs' => Program::where('status', 'active')->get(),
            'opportunities' => Opportunity::where('status', 'open')->get(),
        ]);
    }

    public function contact(): View
    {
        return view('websitepart.contact');
    }

    public function storeApplication(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'program_id' => ['nullable', 'exists:programs,id'],
            'opportunity_id' => ['nullable', 'exists:opportunities,id'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'skills' => ['nullable', 'string'],
            'motivation' => ['nullable', 'string'],
        ]);

        Application::create($data);

        return back()->with('success', 'Application submitted successfully.');
    }

    public function storeContact(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        ContactMessage::create($data);

        return back()->with('success', 'Message sent successfully.');
    }

    public function subscribe(Request $request): RedirectResponse
    {
        $data = $request->validate(['email' => ['required', 'email', 'max:255']]);
        NewsletterSubscriber::firstOrCreate(['email' => $data['email']]);

        return back()->with('success', 'Thanks for subscribing to our newsletter.');
    }
}
