<?php

namespace App\Http\Controllers\Frontend;

use App\AllServiceCupon;
use Illuminate\Validation\Rule;
use App\BusinessHourUpdate;
use App\EmployeeService;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Admin_Review;
use App\Models\Amenity;
use App\Models\Appointment;
use App\Models\Blog;
use App\Models\BusinessCategory;
use App\Models\BusinessHour;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CustomerReview;
use App\Models\Faq;
use App\Models\FaqToClient;
use App\Models\FavouriteBusiness;
use App\Models\FeaturePlan;
use App\Models\IcPortfolio;
use App\Models\IcReview;
use App\Models\IcSocialMedia;
use App\Models\Plan;
use App\Models\Portfolio;
use App\Models\Pricing;
use App\Models\Privacy_Policy;
use App\Models\Promocode;
use App\Models\SafetyRule;
use App\Models\Service;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Models\Terms_service;
use Illuminate\Support\Str;
use App\User;
use Auth;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateInterval;
use DatePeriod;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Validator;
use DB;
use Dotenv\Dotenv;

class FrontendController extends Controller
{
    public function index(Request $request)
    {

        // $ip = $request->ip(); //Dynamic ip
        $ip = '103.135.254.233'; //Static ip
        $loc = \Location::get($ip);

        $lat = $loc->latitude;
        $lon = $loc->longitude;

        $data['recommend'] = DB::table("users")
            ->select("*", DB::raw("6371 * acos(cos(radians(" . $lat . "))
        * cos(radians(users.latitude))
        * cos(radians(users.longitude) - radians(" . $lon . "))
        + sin(radians(" . $lat . "))
        * sin(radians(users.latitude))) AS distance"))
            ->having('distance', '<', 20)
            ->where('usertype', 1)
            ->where('providertype', 1)
            ->take(8)
            ->get();

        $data['categories'] = Category::where('status', 1)->orderBy('order', 'ASC')->get();
        $allcats = Category::where('status', 1)->orderBy('order', 'ASC')->get();
        $data['bannercats'] = $allcats->splice(0, 5);
        $data['bannercats_more'] = $allcats->splice(0);

        $data['allvendors'] = User::where('usertype', 1)->where('providertype', 1)->inRandomOrder()->take(8)->get();

        // $data['topvendors'] = User::where('usertype', 1)->where('providertype',1)->where('rating', '>=', '4.3')->take(8)->inRandomOrder()->get();

        $data['topvendors'] = User::where('usertype', 1)->where('providertype', 1)->inRandomOrder()->take(8)->get();


        $data['adminreviews'] = Admin_Review::where('status', 1)->get();


        // $data['offervendor'] = User::where('usertype', 1)->where('providertype',1)->whereIn('id', $providerId)->inRandomOrder()->take(8)->get();
        $data['offervendor'] = User::where('usertype', 1)->where('providertype', 1)->inRandomOrder()->take(8)->get();


        return view('frontend.home', $data);
    }



    public function blog()
    {
        $blogs = Blog::where('status', 1)->latest()->get();
        $blog = Blog::where('status', 1)->latest()->first();
        return view('frontend.blog', compact('blogs', 'blog'));
    }

    public function blogdetails($slug)
    {
        $blogsdtls = Blog::where('slug', $slug)->first();
        return view('frontend.blog-details', compact('blogsdtls'));
    }

    // This Function for Aboutus

    public function aboutUs()
    {
        $abouts = AboutUs::latest()->get();
        return view('frontend.aboutUs', compact('abouts'));
    }
    // This Function for Privacy and Policy

    public function privacy()
    {
        $privacy = Privacy_Policy::latest()->first();
        return view('frontend.privacy-policy', compact('privacy'));
    }
    // This Function for Terms of Service

    public function terms()
    {
        $terms = Terms_service::latest()->first();
        return view('frontend.terms-service', compact('terms'));
    }

    public function plan()
    {

        if (Auth::check() && Auth::user()->usertype == 1 && Auth::user()->providertype == 1) {
            $plans = Plan::all();
            $currentPlan = Auth::user()->subscription('default') ?? NULL;
            return view('frontend.plan', compact('plans', 'currentPlan'));
        } elseif(Auth::check() && Auth::user()->usertype == 1 && Auth::user()->providertype == 2){
            $plans = Plan::all();
            $currentPlan = Auth::user()->subscription('default') ?? NULL;
            return view('frontend.plan', compact('plans', 'currentPlan'));
        }else {
            $notification = array(
                'message' => 'Please at first login as a vendor!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }






    public function contact()
    {
        return view('frontend.contact');
    }
    public function faq()
    {
        $faqs = Faq::all();
        return view('frontend.faq', compact('faqs'));
    }
    public function allvandor()
    {
        $data['vendors'] = User::where('role', 2)->where('usertype', 1)->where('providertype', 1)->paginate(10);
        $data['slideVendors'] = User::where('role', 2)->where('usertype', 1)->where('providertype', 1)->take(6)->get();

        return view('frontend.vandor.vandor', $data);
    }
    public function vandorregister()
    {
        $data = Category::all();
        // $data  = DB::table('categories')->select('category_name' , 'id')->get();
        return view('frontend.vandor-register', compact('data'));
    }

    public function icregister(){
        $data = Category::all();
        return view('frontend.independent_contractor.register', compact('data'));
    }

    public function userLogin()
    {
        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        } else {
            return view('frontend.login');
        }
    }
    public function userRegister()
    {

        if (Auth::check()) {
            return redirect()->route('user.dashboard');
        } else {
            return view('frontend.register');
        }
    }

    /** @test */
    public function vendorDetails($slug)
    {

        $data['vendor'] = User::where('business_url', $slug)->first();


        if($data['vendor'] && $data['vendor']->providertype == 3){
            $data['user'] = $data['vendor']->ic_provider_id;
       }
        else{
            $data['user'] =  $data['vendor']->id;
        }

        $data['vendorName'] = $data['vendor']->business_name;
        $vendorId = $data['vendor']->id;

        $data['vendoric'] = User::where('usertype', 1)->where('providertype', 2)->where('ic_provider_id', $vendorId)->get();
        $data['vendoricall'] = User::where('providertype', 3)->where('ic_provider_id', $vendorId)->get();
        $data['nameIc'] = User::where('id',  $data['vendor']->ic_provider_id)->first();
        // dd($data['nameIc']);


        $data['ratingCount'] = CustomerReview::where('provider_id', $vendorId)->count();
        $starSum = CustomerReview::where('provider_id', $vendorId)->sum('rating');

        $ratingCount = CustomerReview::where('provider_id', $vendorId)->count();

        if ($ratingCount != 0) {
            $data['ratingAvg'] = round(($starSum / $ratingCount), 1);
        } else {
            $data['ratingAvg'] = 0;
        }

        $data['ratings'] = CustomerReview::where('provider_id', $vendorId)->latest()->paginate(5);

        if($data['vendor']->providertype == 3 ){
            $data['serviceCount'] = Service::where('provider_id', $data['vendor']->ic_provider_id)->where('status', 1)->count();
        }else{
            $data['serviceCount'] = Service::where('provider_id', $vendorId)->where('status', 1)->count();
        }




        if (Auth::check()) {
            $data['favCount'] = FavouriteBusiness::where('user_id', Auth::user()->id)->where('provider_id', $vendorId)->count();
        }

        if(BusinessHour::where('provider_id', $vendorId)->where('saloon_id' , $data['vendor']->ic_provider_id )->exists()){
            $data['businessHour'] = BusinessHourUpdate::where('provider_id', $vendorId)->where('saloon_id' , $data['vendor']->ic_provider_id )->first();
        }elseif($data['vendor']->providertype == 3 ){
            $data['businessHour'] = BusinessHourUpdate::where('provider_id', $data['vendor']->ic_provider_id)->first();
        }
        else{
            $data['businessHour'] = BusinessHourUpdate::where('provider_id', $vendorId)->first();
        }
        $data['socialMedias'] = SocialMedia::where('provider_id', $vendorId)->first();
        $data['amenities'] = Amenity::where('user_id', $vendorId)->first();
        $data['safetyRuls'] = SafetyRule::where('user_id', $vendorId)->get();


        $portfolios = Portfolio::where('provider_id', $vendorId)->get();

        $data['portfolio1'] = $portfolios->splice(0, 1);
        $data['portfolioMulti'] = $portfolios->splice(0, 4);

        if($data['vendor']->providertype != 3){
            $employeeService = EmployeeService::where('id' , $vendorId )->get();

            if($data['vendor']->ic_provider_id != null){
                $data['services'] = Service::where('provider_id', $data['vendor']->ic_provider_id)->where('status', 1)->get();
            }else{
                $data['services'] = Service::where('provider_id', $vendorId)->where('status', 1)->get();
            }


        }else{
            $service = EmployeeService::where('user_id' ,  $vendorId)->get();
            $serviceIds  = $service->pluck('service_id');
            $data['services'] = Service::whereIn('id', $serviceIds)->where('status', 1)->get();

        }




        // $data['vendorportfolio'] = User::where('usertype', 1)->where('providertype', 1)->get();
        $data['faqtoClient'] = FaqToClient::where('provider_id', $vendorId)->get();
        return view('frontend.vandor.vandor-profile', $data);
    }
    // provider portfolio function
    public function vendorportfolio($slug)
    {
        $data['vendor'] = User::where('business_url', $slug)->first();
        $data['vendorName'] = $data['vendor']->business_name;
        $vendorId = $data['vendor']->id;

        $data['vendoric'] = User::where('usertype', 1)->where('providertype', 2)->where('ic_provider_id', $vendorId)->get();






        if (Auth::check()) {
            $data['favCount'] = FavouriteBusiness::where('user_id', Auth::user()->id)->where('provider_id', $vendorId)->count();
        }
        $data['businessHour'] = BusinessHour::where('provider_id', $vendorId)->first();
        $data['socialMedias'] = SocialMedia::where('provider_id', $vendorId)->first();
        $data['portfolios'] = Portfolio::where('provider_id', $vendorId)->get();


        return view('frontend.vandor.all-portfollio', $data);
    }
    // IC Provider function
    public function icDetails($slug)
    {
        $data['vendor'] = User::where('business_url', $slug)->first();
        $data['icName'] = $data['vendor']->name;
        $icId = $data['vendor']->id;

        $data['Icportfolios'] = IcPortfolio::where('ic_id', $icId)->get();
        $data['Icsocial'] = IcSocialMedia::where('ic_id', $icId)->first();

        $data['ratingCount'] = IcReview::where('ic_id', $icId)->count();
        $starSum = IcReview::where('ic_id', $icId)->sum('rating');

        $ratingCount = IcReview::where('ic_id', $icId)->count();

        if ($ratingCount != 0) {
            $data['ratingAvg'] = round(($starSum / $ratingCount), 1);
        } else {
            $data['ratingAvg'] = 0;
        }

        $data['ratings'] = IcReview::where('ic_id', $icId)->latest()->paginate(5);

        return view('frontend.vandor.ic-profile', $data);
    }

    /** @categoryVendor */
    public function categoryVendor($slug)
    {

        $cat = Category::where('slug', $slug)->first();
        $id = $cat->id;
        $data['businessCats'] = BusinessCategory::where('category_id', $id)->get();
        $data['catsName'] = $cat->category_name;
        return view('frontend.vandor.category-vendor', $data);
    }

    /** @checkout */
    public function checkout()
    {
        $data['provider'] = '';
        $cuponPrice = '';
            foreach (Cart::content() as $cont) {
                $prov = User::where('id', $cont->options->provider_id)
                    ->latest()
                    ->first();
                    $data['provider'] = $prov;
            }

        return view('frontend.checkout',$data);
    }


    public function advance_search(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'service_name'=> [Rule::requiredIf(!$request->name)],
            'name'=> [Rule::requiredIf(!$request->service_name)]
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Name Are Validate , Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        if($request->service_name){
            $catagories = Service::where('name', 'like', '%' . $request->service_name . '%');
            $services = $catagories->pluck('provider_id');
            $servicesId = $catagories->pluck('id');
            $EmployeeService = EmployeeService::whereIn('service_id' , $servicesId)->pluck('user_id');
            $merged = $services->merge($EmployeeService);
            $data['vendors'] = User::whereIn('id', $merged)->paginate(10);
            $data['slideVendors'] = User::whereIn('id', $merged)->get();
        }else{
            $data['vendors'] = User::whereKeyNot(1)->where('usertype', '!=', 2 )->where('name', 'like', '%' . request()->input('name') . '%')->orWhere('business_name' , 'like', '%' . request()->input('name') . '%')->get();
            $data['slideVendors'] = User::whereKeyNot(1)->where('usertype', '!=', 2 )->where('name', 'like', '%' . request()->input('name') . '%')->orWhere('business_name' ,'like', '%' . request()->input('name') . '%')->get();

        }



         return view('frontend.vandor.vandor', $data);

    }


    public function check()
    {
        return view('frontend.check');
    }

    public function icregisterStore(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'business_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $data = new User;
        $data->role = 2;
        $data->usertype = 1;
        $data->providertype = 2;
        $data->name = $request->name;
        $data->business_name = $request->business_name;
        $data->business_url =  Str::slug($request->name.Str::random(15), '-');;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->password = bcrypt($request->password);
        $data->save();

        $business_category = $request->business_category;
        if (!empty($business_category)) {
            foreach ($business_category as $category) {
                $mycolor = new BusinessCategory();
                $mycolor->provider_id = $data->id;
                $mycolor->category_id = $category;
                $mycolor->save();
            }
        }
        Auth::login($data);
        return redirect('user/dashboard');
    }


    public function userCheckOut($id , $vendorId){
        $user = User::where('id' , $vendorId)->first();

        $servicePrice = Service::where('id' , $id)->first();
        $employeeService = EmployeeService::where('service_id' , $id)->pluck('user_id');
        $providerId = Service::where('id' , $id)->pluck('provider_id');
        $merged = $providerId->merge($employeeService);
        if($user->ic_provider_id == null && $user->providertype == 2){
            $users = User::where('id' , $vendorId)->get();
        }elseif($user->ic_provider_id =! null){
            $user = User::where('id' , $vendorId)->first();
            $userIc = User::where('id' , $user->ic_provider_id)->first();
            $servicePrice = Service::where('id' , $id)->first();
            $employeeService = EmployeeService::where('service_id' , $id)->pluck('user_id');
            $providerId = Service::where('id' , $id)->pluck('provider_id');
            $merged = $providerId->merge($employeeService);
            $users = User::whereIn('providertype' , [2,3])->whereIn('id' , $merged)->get();
        }
        else{
            $users = User::whereIn('providertype' , [2,3])->whereIn('id' , $merged)->get();
        }
        return view('frontend.vandor.usercheck' , compact('users' , 'vendorId' , 'id' , 'servicePrice'));
    }

    public function couponSet(Request $request){


      $allServiceCuponSet = AllServiceCupon::where(['user_id' => $request->vendorId ,'promocode' => $request->data, ]);
      $allServiceCupon = $allServiceCuponSet->first();
      $couponSet = Promocode::where(['promocode' => $request->data , 'user_id' => $request->vendorId, 'created_by' => $request->serviceId, 'status' => 1]);
      $coupon = $couponSet->first();


      if($allServiceCupon != null){
        if($allServiceCuponSet->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->exists() == true){
            $service = Service::where('id' , $request->serviceId)->first();
            $percentange = ($allServiceCupon->percentage/100) ;
            $cuponPrice = $service->selling_price *$percentange;
            $price = $service->selling_price - $cuponPrice;
        }
        else{
            return response()->json([404,'Date are not Set']);
        }
      }else if($coupon != null){

        if($couponSet->where('start_date', '<', Carbon::now())->where('end_date', '>', Carbon::now())->exists() == true){
            $service = Service::findOrFail($request->serviceId);
            $cuponPrice = $coupon->percetange_price;
            $price = $service->selling_price - $cuponPrice;
        }else{
            return response()->json([404,'Date are not Set']);
        }
      }else{
        return response()->json([404,'Cupon  are not found']);
      }

       return response()->json([
           'price' => $price,
           'coupon_price' => $cuponPrice,
        ]);

    }

    public function servicePrice($id){
        $service = Service::findOrFail($id);
        return response()->json($service);
    }

    public function generateCode(){
        $length = 10;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return response()->json($randomString);
    }

    public function vendorDateShow(Request $request){
        $userBusinessHoure = BusinessHourUpdate::where('provider_id',auth()->id())->first();
        return response()->json($userBusinessHoure);
    }
}
