<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UserResource;
use App\Models\FaqToClient;
use App\Models\Portfolio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Auth;

class ProviderProfileApiController extends ApiBaseController
{
    public function personalInformation()
    {
        $user = auth()->user();
        $response = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile,
            'business_logo' => asset($user->business_logo),
            'address' => $user->address,
            'rating' => $user->rating,
            'business_name' => $user->business_name,
            'business_url' => $user->business_url,
            'update' => url('/api/provider/profile/personal-information/' . $user->id),
        ];
        return $this->sendResponse($response);
    }



    public function personalInformationUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $image = $request->file('image');
        if ($image) {
            if (file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/customer'), $imageName);
            $user->image = '/uploaded/customer/' . $imageName;
        }
        $user->save();
    }


    public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'new_password' => 'required_with:password_confirmation|same:password_confirmation|min:6',
            'current_password' => 'required|min:6'
        ]);
        $user = User::findOrFail($id);
        if ($user->password == null) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return $this->sendSuccess('Successfully password changed.');
        } else {
            if (Auth::guard('web')->attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                return $this->sendSuccess('Successfully password changed.......');
            } else {
                return $this->sendError('Sorry! Your current password dost not match.');
            }
        }
    }


    public function businessInformation()
    {
        $data['user'] = new UserResource(auth()->user());
        $data['businessCategories'] = auth()->user()->businessCategories->map(function ($query) {
            return [
                'id' => $query->id,
                'name' => $query->category->category_name,
                'slug' => $query->category->slug
            ];
        });
        $data['businessHours'] = auth()->user()->businessHours->makeHidden(['created_at', 'updated_at', 'provider_id']);
        $data['socialMedias'] = auth()->user()->socialMedias->makeHidden(['created_at', 'updated_at', 'provider_id']);
        $data['faqtoClients'] = auth()->user()->faqtoClients->makeHidden(['created_at', 'updated_at', 'provider_id']);
        $data['portfolios'] = auth()->user()->portfolios->makeHidden(['created_at', 'updated_at', 'provider_id']);
        return $this->sendResponse($data);
    }


    public function travelPolicy(Request $request)
    {
        $user = User::findOrFail(auth()->id());

        if ($request->isMethod('put')) {
            // return $request->all(); 
            $this->validate($request, [
                'travel_fee' => 'required|max:100',
                'maximum_travel_distance' => 'required|max:100',
            ]);

            $user->travel_fee   = $request->travel_fee;
            $user->maximum_travel_distance = $request->maximum_travel_distance;
            $user->travel_policy = $request->travel_policy;
            $user->save();
        } elseif ($request->isMethod('get')) {
            $user = [
                'id' => $user->id,
                'travel_fee' => $user->travel_fee,
                'maximum_travel_distance' => $user->maximum_travel_distance,
                'travel_policy' => $user->travel_policy,
            ];
            return $this->sendResponse($user);
        }
    }

    public function FAQtoClient(Request $request, $id = null)
    {
        $FAQ = auth()->user()->faqtoClients;
        if ($request->isMethod('put')) {
            $this->validate($request, [
                'title' => 'required|max:100',
                'description' => 'required|max:500',
            ]);
            FaqToClient::findOrFail($id)->update([
                'title'   => $request->title,
                'description' => $request->description
            ]);
            return $this->sendSuccess('Question Updeted Succesfull');
        } elseif ($request->isMethod('get')) {
            return $this->sendResponse($FAQ->makeHidden(['provider_id', 'updated_at']));
        } elseif ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|max:100',
                'description' => 'required|max:500',
            ]);
            auth()->user()->faqtoClients()->create([
                'title'   => $request->title,
                'description' => $request->description
            ]);
            return $this->sendSuccess('Question added Succesfull');
        } elseif ($request->isMethod('delete')) {
            FaqToClient::findOrFail($id)->delete();
            return $this->sendSuccess('Deleted Succesfull');
        }
    }

    public function businessHours(Request $request)
    {
        if ($request->isMethod('get')) {
            return $this->sendResponse(auth()->user()->businessHours->makeHidden(['provider_id', 'updated_at']));
        } elseif ($request->isMethod('put') || $request->isMethod('post')) {
            $validated = $this->validate($request, [
                'saturday' => 'required',
                'sunday' => 'required',
                'monday' => 'required',
                'tuesday' => 'required',
                'wednesday' => 'required',
                'thursday' => 'required',
                'friday' => 'required',
            ]);
            $request->isMethod('put') ? auth()->user()->businessHours()->update($validated) : auth()->user()->businessHours()->create($validated);
            return $this->sendSuccess('Added Succesfull');
        }
    }


    public function socialMedia(Request $request)
    {
        if ($request->isMethod('put') || $request->isMethod('post')) {
            $validated = $this->validate($request, [
                'facebook' => 'required',
                'twitter' => 'required',
                'linkedin' => 'required',
                'instagram' => 'required',
                'youtube' => 'required'
            ]);
            $request->isMethod('put') ? auth()->user()->socialMedias()->update($validated) : auth()->user()->socialMedias()->create($validated);
            return $this->sendSuccess('Added Succesfull');
        } elseif ($request->isMethod('get')) {
            return $this->sendResponse(auth()->user()->socialMedias->makeHidden(['provider_id', 'updated_at']));
        }
    }


    public function portfolio(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'portfolio_image' => 'mimes:jpg,jpeg,png,webp,gif,svg',
            ]);
            $data = new Portfolio();
            $data->provider_id   = Auth::user()->id;
            $portfolio_image = $request->file('portfolio_image');
            if ($portfolio_image) {
                $imageName = time() . '_' . uniqid() . '.' . $portfolio_image->getClientOriginalExtension();
                $portfolio_image->move(public_path('uploaded/provider/portfolio'), $imageName);
                $data->portfolio_image = '/uploaded/provider/portfolio/' . $imageName;
            }
            $data->save();
            return $this->sendSuccess('Portfolio Added Succesfull');
        } elseif ($request->isMethod('get')) {
            $portfolios = auth()->user()->portfolios->map(function ($portfolio) {
                return [
                    'id' => $portfolio->id,
                    'portfolio_image' => asset($portfolio->portfolio_image)
                ];
            });
            return $this->sendResponse($portfolios);
        } elseif ($request->isMethod('delete')) {
            $portfolio =  Portfolio::findOrFail($id);
            $image_path = public_path($portfolio->portfolio_image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
            $portfolio->delete();
        }
    }
}
