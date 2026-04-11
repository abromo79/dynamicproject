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
use App\Models\Setting;
use App\Models\SuccessStory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function loginForm(): View
    {
        return view('adminpart.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $admin = User::where('email', $credentials['email'])->first();
        if (! $admin || ! Hash::check($credentials['password'], $admin->password) || ! in_array($admin->role, ['admin', 'staff'], true)) {
            return back()->withErrors(['email' => 'Invalid admin credentials.'])->onlyInput('email');
        }

        session(['admin_id' => $admin->id, 'admin_name' => $admin->name, 'admin_role' => $admin->role]);

        return redirect()->route('admin.dashboard');
    }

    public function logout(): RedirectResponse
    {
        session()->forget(['admin_id', 'admin_name', 'admin_role']);
        return redirect()->route('admin.login');
    }

    public function dashboard(): View
    {
        $this->guard();

        return view('adminpart.dashboard', [
            'totals' => [
                'users' => User::count(),
                'applications' => Application::count(),
                'programs' => Program::where('status', 'active')->count(),
                'events' => Event::where('is_upcoming', true)->count(),
            ],
            'recentApplications' => Application::latest()->take(8)->get(),
        ]);
    }

    public function index(Request $request, string $module): View
    {
        $this->guard();
        return view("adminpart.$module", $this->payload($module, $request));
    }

    public function store(Request $request, string $module): RedirectResponse
    {
        $this->guard();
        $model = $this->model($module);
        $data = $this->validatedData($module, $request);
        
        // Handle file upload for success stories
        if ($module === 'success-stories' && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/success-stories'), $imageName);
            $data['image'] = 'assets/success-stories/' . $imageName;
        }
        
        if ($module === 'users' && isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }
        
        $model::create($data);
        return back()->with('success', ucfirst(str_replace('-', ' ', $module)).' record created.');
    }

    public function update(Request $request, string $module, int $id): RedirectResponse
    {
        $this->guard();
        $model = $this->model($module);
        $data = $this->validatedData($module, $request, true, $id);
        
        // Handle file upload for success stories
        if ($module === 'success-stories' && $request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/success-stories'), $imageName);
            $data['image'] = 'assets/success-stories/' . $imageName;
        }
        
        if ($module === 'users') {
            if (! empty($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            } else {
                unset($data['password']);
            }
        }
        
        $model::query()->whereKey($id)->update($data);
        return back()->with('success', ucfirst(str_replace('-', ' ', $module)).' record updated.');
    }

    public function destroy(string $module, int $id): RedirectResponse
    {
        $this->guard();
        $model = $this->model($module);
        $model::query()->whereKey($id)->delete();
        return back()->with('success', ucfirst(str_replace('-', ' ', $module)).' record deleted.');
    }

    public function updateApplicationStatus(Request $request, int $id): RedirectResponse
    {
        $this->guard();
        $data = $request->validate(['status' => ['required', 'in:pending,accepted,rejected']]);
        Application::query()->whereKey($id)->update($data);
        return back()->with('success', 'Application status updated.');
    }

    public function exportNewsletter(): Response
    {
        $this->guard();
        $rows = NewsletterSubscriber::orderBy('created_at')->get(['email', 'created_at']);
        $content = "email,subscribed_at\n";
        foreach ($rows as $row) {
            $content .= $row->email.','.$row->created_at."\n";
        }

        return response($content, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="newsletter-subscribers.csv"',
        ]);
    }

    private function guard(): void
    {
        abort_unless(session()->has('admin_id'), 403);
    }

    private function model(string $module): string
    {
        return match ($module) {
            'programs' => Program::class,
            'opportunities' => Opportunity::class,
            'events' => Event::class,
            'blog' => BlogPost::class,
            'innovations' => Innovation::class,
            'partners' => Partner::class,
            'impact-stats' => ImpactStat::class,
            'newsletter' => NewsletterSubscriber::class,
            'contact-messages' => ContactMessage::class,
            'success-stories' => SuccessStory::class,
            'users' => User::class,
            'settings' => Setting::class,
            default => abort(404),
        };
    }

    private function payload(string $module, Request $request): array
    {
        $q = $request->string('q')->toString();
        $search = function (Builder $builder, array $fields) use ($q): Builder {
            if ($q === '') {
                return $builder;
            }
            return $builder->where(function (Builder $inner) use ($fields, $q): void {
                foreach ($fields as $i => $field) {
                    if ($i === 0) {
                        $inner->where($field, 'like', "%$q%");
                    } else {
                        $inner->orWhere($field, 'like', "%$q%");
                    }
                }
            });
        };

        return match ($module) {
            'programs' => ['rows' => $search(Program::query()->latest(), ['title', 'category'])->paginate(10)->withQueryString()],
            'opportunities' => ['rows' => $search(Opportunity::query()->latest(), ['title', 'type'])->paginate(10)->withQueryString()],
            'applications' => ['rows' => $search(Application::with(['program', 'opportunity'])->latest(), ['full_name', 'email', 'skills', 'status'])->paginate(10)->withQueryString()],
            'events' => ['rows' => $search(Event::query()->latest(), ['title', 'location', 'type'])->paginate(10)->withQueryString()],
            'blog' => ['rows' => $search(BlogPost::query()->latest(), ['title', 'category', 'author'])->paginate(10)->withQueryString()],
            'innovations' => ['rows' => $search(Innovation::query()->latest(), ['title', 'owner_name', 'sector'])->paginate(10)->withQueryString()],
            'partners' => ['rows' => $search(Partner::query()->latest(), ['name', 'website'])->paginate(10)->withQueryString()],
            'impact-stats' => ['rows' => $search(ImpactStat::query()->latest(), ['title'])->paginate(10)->withQueryString()],
            'newsletter' => ['rows' => $search(NewsletterSubscriber::query()->latest(), ['email'])->paginate(20)->withQueryString()],
            'contact-messages' => ['rows' => $search(ContactMessage::query()->latest(), ['name', 'email', 'subject', 'message'])->paginate(10)->withQueryString()],
            'success-stories' => ['rows' => $search(SuccessStory::query()->orderBy('sort_order')->latest(), ['name', 'program', 'testimonial'])->paginate(10)->withQueryString()],
            'users' => ['rows' => $search(User::query()->latest(), ['name', 'email', 'role'])->paginate(10)->withQueryString()],
            'settings' => ['rows' => $search(Setting::query()->latest(), ['key', 'value'])->paginate(10)->withQueryString()],
            default => abort(404),
        };
    }

    private function validatedData(string $module, Request $request, bool $isUpdate = false, ?int $id = null): array
    {
        return match ($module) {
            'programs' => $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'duration' => ['nullable', 'string', 'max:255'],
                'category' => ['required', 'string', 'max:255'],
                'status' => ['nullable', 'in:active,inactive'],
            ]),
            'opportunities' => $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'type' => ['required', 'in:bootcamp,hackathon,internship,innovation_challenge,startup_program'],
                'description' => ['required', 'string'],
                'deadline' => ['nullable', 'date'],
                'status' => ['nullable', 'in:open,closed'],
            ]),
            'events' => $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'event_date' => ['required', 'date'],
                'location' => ['nullable', 'string', 'max:255'],
                'type' => ['required', 'in:webinar,workshop,bootcamp,community_event'],
                'is_upcoming' => ['nullable', 'boolean'],
            ]),
            'blog' => $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'content' => ['required', 'string'],
                'category' => ['required', 'string', 'max:255'],
                'author' => ['nullable', 'string', 'max:255'],
                'image' => ['nullable', 'string', 'max:255'],
                'is_published' => ['nullable', 'boolean'],
            ]),
            'innovations' => $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string'],
                'owner_name' => ['nullable', 'string', 'max:255'],
                'sector' => ['nullable', 'string', 'max:255'],
                'status' => ['nullable', 'string', 'max:255'],
            ]),
            'partners' => $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'website' => ['nullable', 'url', 'max:255'],
                'description' => ['nullable', 'string'],
                'logo' => ['nullable', 'string', 'max:255'],
                'is_featured' => ['nullable', 'boolean'],
            ]),
            'impact-stats' => $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'value' => ['required', 'integer', 'min:0'],
                'icon' => ['nullable', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
            ]),
            'contact-messages' => $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'subject' => ['nullable', 'string', 'max:255'],
                'message' => ['required', 'string'],
                'is_read' => ['nullable', 'boolean'],
            ]),
            'success-stories' => $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'program' => ['required', 'string', 'max:255'],
                'testimonial' => ['required', 'string'],
                'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,gif', 'max:2048'],
                'is_featured' => ['nullable', 'boolean'],
                'sort_order' => ['nullable', 'integer', 'min:0'],
                'status' => ['nullable', 'boolean'],
            ]),
            'users' => $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email,'.($id ?? 'NULL').',id'],
                'role' => ['required', 'in:admin,staff,user'],
                'password' => [$isUpdate ? 'nullable' : 'required', 'string', 'min:6'],
            ]),
            'settings' => $request->validate([
                'key' => ['required', 'string', 'max:255', 'unique:settings,key,'.($id ?? 'NULL').',id'],
                'value' => ['nullable', 'string'],
            ]),
            'newsletter' => $request->validate([
                'email' => ['required', 'email', 'max:255', 'unique:newsletter_subscribers,email,'.($id ?? 'NULL').',id'],
            ]),
            default => $request->except('_token', '_method'),
        };
    }
}
