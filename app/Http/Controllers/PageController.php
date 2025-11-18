<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Member;
use App\Models\Book;
use App\Models\Application;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\State;
use App\Models\District;
use App\Models\Assembly;
use App\Models\Block;
use App\Models\City;
use App\Models\Corporation;
use App\Models\Perur;
use App\Models\Paguthi;
use App\Models\Vattam;
use App\Models\Postingstage;
use App\Models\Subbody;
use App\Models\Post;
use App\Models\Bearer;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\JoinRequest;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\DonationRequest;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PageController extends Controller
{
    // public function home()
    // {
    //     return view('pages.index');
    // }

    public function home()
    {
        $latest_news = Media::orderBy('event_date', 'desc')->where('category_id', 3)->take(6)->get();
        $press_releases = Media::orderBy('event_date', 'desc')->where('category_id', 1)->take(6)->get();
        $events = Media::orderBy('event_date', 'desc')->where('category_id', 2)->take(6)->get();
        $pressMeetGallery = Media::orderBy('event_date', 'desc')->where('category_id', 4)->take(5)->get();
        $kalathiGallery = Media::orderBy('event_date', 'desc')->where('category_id', 5)->take(9)->get();
        $velichamTvGallery = Media::orderBy('event_date', 'desc')->where('category_id', 7)->take(5)->get();
        $lives = Media::orderBy('event_date', 'desc')->where('category_id', 8)->take(9)->get();
        $videoGallery = Media::orderBy('event_date', 'desc')->where('category_id', 6)->take(5)->get();
        $gallery = Media::orderBy('event_date', 'desc')->where('category_id', 5)->take(6)->get();
        // Fetch latest 10 posts for "LATEST EVENTS" section (all media, sorted by date)
        $latestEvents = Media::orderBy('event_date', 'desc')->take(10)->get();

        // Fetch latest Party News - try to match either a category slug or name
        $partyNews = Media::orderBy('event_date', 'desc')
            ->whereHas('category', function ($q) {
                $q->where('slug', 'party-news')
                  ->orWhere('name_en', 'Latest News');
            })
            ->take(8)
            ->get();

        return view('pages.home', compact('latest_news', 'press_releases', 'events', 'pressMeetGallery', 'kalathiGallery', 'velichamTvGallery', 'lives', 'videoGallery', 'gallery', 'latestEvents', 'partyNews'));
    }

    public function ideology()
    {
        return view('pages.ideology'); // Create this similarly
    }

    public function history()
    {
        return view('pages.history');
    }

    public function showMedia($media)
    {
        $mediaItem = Media::where('slug', $media)->firstOrFail();
        return view('pages.media', compact('mediaItem'));
    }

    public function latest_news()
    {
        $latest_news = Media::orderBy('event_date', 'desc')->where('category_id', 3)->paginate(12);
        return view('pages.latest-news', compact('latest_news'));
    }

    public function pressReleases()
    {
        $press_releases = Media::orderBy('event_date', 'desc')->where('category_id', 1)->paginate(12);
        return view('pages.press-releases', compact('press_releases'));
    }

    public function events()
    {
        $events = Media::orderBy('event_date', 'desc')->where('category_id', 2)->paginate(12);
        return view('pages.events', compact('events'));
    }

    public function gallery()
    {
        $gallery = Media::orderBy('event_date', 'desc')->where('category_id', 5)->paginate(12);
        return view('pages.gallery', compact('gallery'));
    }

    public function videos()
    {
        $videos = Media::orderBy('event_date', 'desc')->where('category_id', 6)->paginate(12);
        return view('pages.videos', compact('videos'));
    }

    public function interviews()
    {
        $interviews = Media::orderBy('event_date', 'desc')->where('category_id', 4)->paginate(12);
        return view('pages.interviews', compact('interviews'));
    }

    public function kalaththilSiruthaigal()
    {
        $kalams = Media::orderBy('event_date', 'desc')->where('category_id', 7)->paginate(12);
        return view('pages.kalaththil-siruthaigal', compact('kalams'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactStore(ContactRequest $request)
    {
        $validated = $request->validated();

        try {
            // Save contact to database
            Contact::create($validated);

            // Send email to info@viduthalaichiruthaigal.com
            Mail::to('info@viduthalaichiruthaigal.com')->send(new ContactMail($validated));

            return redirect()->back()->with('success', __('site.contact.message_sent'));
        } catch (\Exception $e) {
            // Log the error and show user-friendly message
            \Log::error('Contact form email failed: ' . $e->getMessage());

            return redirect()->back()->with('error', __('site.contact.message_failed'))->withInput();
        }
    }

    public function administration()
    {
        return view('pages.administration');
    }

    public function electedMembers()
    {
        return view('pages.elected-members');
    }

    public function officeBearers()
    {
        // Fetch all bearers with their post and assembly relationships
        $bearers = Bearer::with(['post', 'assembly'])
            ->orderBy('post_id')
            ->get();

        // Group bearers by post_id
        $bearersByPost = $bearers->groupBy('post_id');

        // Get all posts that have bearers for display
        $posts = Post::whereHas('bearers')
            ->with('bearers')
            ->orderBy('name_en')
            ->get();

        return view('pages.office-bearers', compact('bearersByPost', 'posts'));
    }

    public function partyRepresentatives()
    {
        // Fetch bearers with post_id = 15 (Party Representatives)
        $representatives = Bearer::with(['post', 'assembly'])
            ->where('post_id', 15)
            ->get();

        // Get the post information for the title
        $post = Post::find(15);

        return view('pages.party-representatives', compact('representatives', 'post'));
    }

    public function join()
    {
        $postingstages = Postingstage::orderBy('name_en')->get();
        return view('pages.join', compact('postingstages'));
    }

    public function joinStore(JoinRequest $request)
    {
        $validatedData = $request->validated();

        $member = new Member();

        // Assign required and always-present fields
        $member->name = $validatedData['name'];
        $member->phone_no = $validatedData['phone_no'];
        $member->email_id = $validatedData['email_id'];

        // Assign optional fields that are always in the request
        $member->father_name = $validatedData['father_name'] ?? null;
        $member->address = $validatedData['address'] ?? null;
        $member->pincode = $validatedData['pincode'] ?? null;
        $member->dob = $validatedData['dob'] ?? null;
        $member->gender = $validatedData['gender'] ?? null;
        $member->blood_group = $validatedData['blood_group'] ?? null;
        $member->voterid = $validatedData['voterid'] ?? null;
        $member->aadhar_no = $validatedData['aadhar_no'] ?? null;

        // Assign location foreign keys that are not dynamic
        $member->state_id = $validatedData['state_id'] ?? null;
        $member->district_id = $validatedData['district_id'] ?? null;
        $member->assembly_id = $validatedData['assembly_id'] ?? null;
        $member->place_type = $validatedData['place_type'] ?? null;

        // Explicitly handle the dynamic, nullable foreign keys
        if (!empty($validatedData['block_id'])) {
            $member->block_id = $validatedData['block_id'];
        }
        if (!empty($validatedData['city_id'])) {
            $member->city_id = $validatedData['city_id'];
        }
        if (!empty($validatedData['perur_id'])) {
            $member->perur_id = $validatedData['perur_id'];
        }
        if (!empty($validatedData['corporation_id'])) {
            $member->corporation_id = $validatedData['corporation_id'];
        }

        // Generate deterministic membership id using state code + VCK + 5-digit sequence
        $member->member_no = \App\Models\Member::generateMembershipId($member->state_id);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('members/photos', 'public');
            $member->photo = $photoPath;
        }

        $member->save();

        return redirect()->back()->with('success', __('site.join.success_message'));
    }

    public function donation()
    {
        return view('pages.donation');
    }

    public function donationStore(DonationRequest $request)
    {
        try {
            // Create donation record with pending status
            $donation = Donation::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'member_id' => $request->member_id,
                'district_id' => $request->district_id,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
                'pan_number' => $request->pan_number ? strtoupper($request->pan_number) : null,
                'amount' => $request->amount,
                'payment_status' => 'pending',
            ]);

            // Initialize Razorpay
            $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Create order
            $order = $api->order->create([
                'receipt' => 'donation_' . $donation->id . '_' . time(),
                'amount' => $request->amount * 100, // Razorpay expects amount in paisa
                'currency' => 'INR',
                'notes' => [
                    'donation_id' => $donation->id,
                    'member_id' => $request->member_id ?? '',
                ]
            ]);

            // Update donation with Razorpay order ID
            $donation->update(['razorpay_order_id' => $order->id]);

            return response()->json([
                'order_id' => $order->id,
                'amount' => $order->amount,
                'currency' => $order->currency,
                'donation_id' => $donation->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create donation order: ' . $e->getMessage()
            ], 500);
        }
    }

    public function donationVerify(Request $request)
    {
        try {
            $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Verify signature
            $attributes = [
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature
            ];

            $api->utility->verifyPaymentSignature($attributes);

            // Find donation by order ID and update
            $donation = Donation::where('razorpay_order_id', $request->razorpay_order_id)->first();

            if ($donation) {
                $donation->update([
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature' => $request->razorpay_signature,
                    'payment_status' => 'success',
                ]);

                return response()->json([
                    'success' => true,
                    'donation_id' => $donation->id,
                    'message' => 'Payment verified successfully'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Donation not found'
            ], 404);

        } catch (\Exception $e) {
            // Mark payment as failed
            if (isset($request->razorpay_order_id)) {
                $donation = Donation::where('razorpay_order_id', $request->razorpay_order_id)->first();
                if ($donation) {
                    $donation->update(['payment_status' => 'failed']);
                }
            }

            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed: ' . $e->getMessage()
            ], 400);
        }
    }

    public function donationSuccess(Request $request)
    {
        $donationId = $request->query('donation_id');
        $donation = Donation::with('district')->findOrFail($donationId);

        if ($donation->payment_status !== 'success') {
            return redirect()->route('donation')->with('error', 'Payment not completed');
        }

        return view('pages.donation-success', compact('donation'));
    }

    public function books()
    {
        $categories = Book::active()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->get()
            ->pluck('category');

        $booksByCategory = [];
        foreach ($categories as $category) {
            $books = Book::active()
                ->where('category', $category)
                ->orderBy('sort_order')
                ->orderBy('title')
                ->get();

            if ($books->isNotEmpty()) {
                $booksByCategory[$category] = $books;
            }
        }

        return view('pages.books', compact('booksByCategory', 'categories'));
    }

    public function showBook($bookSlug)
    {
        $book = Book::active()->where('slug', $bookSlug)->firstOrFail();
        return view('pages.book-viewer', compact('book'));
    }

    public function applications()
    {
        return view('pages.applications');
    }

    public function applicationsStore(ApplicationRequest $request)
    {
        $validatedData = $request->validated();

        $application = new Application();

        // Assign all fields
        $application->name = $validatedData['name'];
        $application->father_name = $validatedData['father_name'] ?? null;
        $application->mother_name = $validatedData['mother_name'] ?? null;
        $application->spouse_name = $validatedData['spouse_name'] ?? null;
        $application->dob = $validatedData['dob'] ?? null;
        $application->gender = $validatedData['gender'] ?? null;
        $application->education = $validatedData['education'] ?? null;
        $application->occupation = $validatedData['occupation'] ?? null;
        $application->marital_status = $validatedData['marital_status'] ?? null;
        $application->social_category = $validatedData['social_category'] ?? null;
        $application->joining_date = $validatedData['joining_date'] ?? null;
        $application->current_post = $validatedData['current_post'] ?? null;
        $application->address = $validatedData['address'] ?? null;
        $application->mobile_number = $validatedData['mobile_number'] ?? null;
        $application->email_id = $validatedData['email_id'] ?? null;
        // New identification fields
        $application->membership_id = $validatedData['membership_id'] ?? null;
        $application->aadhar_no = $validatedData['aadhar_no'] ?? null;
        $application->voterid_no = $validatedData['voterid_no'] ?? null;

        // Location foreign keys
        $application->state_id = $validatedData['state_id'] ?? null;
        $application->district_id = $validatedData['district_id'] ?? null;
        $application->assembly_id = $validatedData['assembly_id'] ?? null;
        $application->postingstage_id = $validatedData['postingstage_id'];
        $application->subbody_id = $validatedData['subbody_id'] ?? null;
        $application->post_id = $validatedData['post_id'] ?? null;

        // Conditional location fields based on posting stage
        $application->block_id = $validatedData['block_id'] ?? null;
        $application->city_id = $validatedData['city_id'] ?? null;
        $application->perur_id = $validatedData['perur_id'] ?? null;
        $application->paguthi_id = $validatedData['paguthi_id'] ?? null;
        $application->vattam_id = $validatedData['vattam_id'] ?? null;
        $application->corporation_id = $validatedData['corporation_id'] ?? null;

        // Store selected names for reference
        if ($application->postingstage_id) {
            $postingstage = Postingstage::find($application->postingstage_id);
            $application->selected_postingstage = $postingstage ? $postingstage->name_en : null;
        }

        if ($application->subbody_id) {
            $subbody = Subbody::find($application->subbody_id);
            $application->selected_subbody = $subbody ? $subbody->name_en : null;
        }

        if ($application->post_id) {
            $post = Post::find($application->post_id);
            $application->selected_post = $post ? $post->name_en : null;
        }

        // Set default status as Pending
        $application->status = 'Pending';

        // Handle document upload
        if ($request->hasFile('document')) {
            $documentPath = $request->file('document')->store('applications/documents', 'public');
            $application->document = $documentPath;
        }

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('applications/photos', 'public');
            $application->photo = $photoPath;
        }

        $application->save();

        return redirect()->back()->with('success', 'Your application has been submitted successfully! We will review it and get back to you soon.');
    }

    // API methods for dynamic dropdowns
    public function getDistricts($stateId)
    {
        $districts = District::where('state_id', $stateId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($districts);
    }

    public function getAssemblies($districtId)
    {
        $assemblies = Assembly::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($assemblies);
    }

    public function getBlocks($assemblyId)
    {
        return Block::where('assembly_id', $assemblyId)->selectRaw('id, name_en as name')->orderBy('name_en')->get();
    }

    public function getCities($districtId)
    {
        $cities = City::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($cities);
    }

    public function getPerurs($cityId)
    {
        $perurs = Perur::where('city_id', $cityId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($perurs);
    }

    public function getBlocksByDistrict($districtId)
    {
        $blocks = Block::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($blocks);
    }

    public function getPerursByDistrict($districtId)
    {
        $perurs = Perur::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($perurs);
    }

    public function getCitiesByDistrict($districtId)
    {
        $cities = City::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($cities);
    }

    public function getCorporationsByDistrict($districtId)
    {
        $corporations = Corporation::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($corporations);
    }

    public function getPaguthis($perurId)
    {
        $paguthis = Paguthi::where('perur_id', $perurId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($paguthis);
    }

    public function getVattams($paguthiId)
    {
        $vattams = Vattam::where('paguthi_id', $paguthiId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($vattams);
    }

    public function getPaguthisByDistrict($districtId)
    {
        $paguthis = Paguthi::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($paguthis);
    }

    public function getVattamsByDistrict($districtId)
    {
        $vattams = Vattam::where('district_id', $districtId)->select('id', 'name_en', 'name_ta')->get();
        return response()->json($vattams);
    }

    public function getSubbodiesByPostingstage($postingstageId)
    {
        $subbodies = Subbody::where('postingstage_id', $postingstageId)->select('id', 'name_en', 'name_ta')->orderBy('name_en')->get();
        return response()->json($subbodies);
    }

    public function getPostsByPostingstage($postingstageId)
    {
        $posts = Post::where('postingstage_id', $postingstageId)->select('id', 'name_en', 'name_ta')->orderBy('name_en')->get();
        return response()->json($posts);
    }

}