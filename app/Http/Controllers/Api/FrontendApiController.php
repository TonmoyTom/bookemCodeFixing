<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\AdminReviewResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\VendorCategoryResource;
use App\Models\Admin_Review;
use App\Models\BusinessCategory;
use App\Models\Category;
use App\User;

/**
 * Class FrontendApiController
 * @package App\Http\Controllers\Api
 */

class FrontendApiController extends ApiBaseController
{

    /**
     * Display a listing of the categories, all_vendors, admin_reviews, 
     * offer_vendor.
     * GET|HEAD /
     *
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        $data['categories'] = CategoryResource::collection(Category::where('status', 1)->latest()->get());
        // $data['banner_categories'] = "Get from categories from 0 to 5";
        // $data['banner_categories_more'] = "Get all categories";
        $users = User::query();
        $data['all_vendors'] = UserResource::collection($users->providor()->inRandomOrder()->take(8)->get());
        // $data['top_vendors'] = "Get from allvendors where 'rating >= 4.3'";
        $data['top_reviews'] = [];
        $data['admin_reviews'] =  AdminReviewResource::collection(Admin_Review::where('status', 1)->get());
        $data['offer_vendors'] = UserResource::collection($users->has('offervendor')->get());        
        return $data ? $this->sendResponse($data, 'Data Retrive successfull') : $this->sendError("Something went to be wrong!");
    }

    /**
     * Display the specified vendor's categories.
     * GET|HEAD /vendorsByCategory/{slug}
     *
     * @param string $slug
     *
     * @return Response
     */
    public function vendorsByCategory($slug)
    {
        $cat = Category::where('slug', $slug)->first();
        $businessCats = BusinessCategory::where('category_id', $cat->id)->pluck('provider_id');   
        $data['vendors'] = VendorCategoryResource::collection(User::whereIn('id', $businessCats)->get());     
        $data['category_name'] = $cat->category_name;

        return $this->sendResponse($data, 'Data Retrive successfull');
    }

    /**
     * Display the all vendor.
     * GET|HEAD /vendors
     *
     *
     * @return Response
     */
    public function allVendors()
    {
        $vendors = UserResource::collection(User::where('role', 2)->where('usertype', 1)->paginate(10));
        // $data['slideVendors'] = User::where('role', 2)->where('usertype', 1)->take(6)->get();

        return $this->sendResponse($vendors);
    }

    
    /**
     * Display the specified vendor's details by category.
     * GET|HEAD /vendors/{slug}
     *
     * @param string $slug
     *
     * @return Response
     */
    public function vendorDetails($slug)
    {
        $vendor = User::where('business_url', $slug)->select('id', 'business_name')
                            ->withCount('customerReviews')
                            ->with('businessHours', 'socialMedias', 'portfolios', 'services', 'faqtoClients')
                            ->first();
        return $this->sendResponse($vendor, 'Data Retrive successfull');
    }

}
