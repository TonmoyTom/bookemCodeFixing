<?php

namespace App;

use App\Models\Appointment;
use App\Models\BusinessCategory;
use App\Models\BusinessHour;
use App\Models\CustomerReview;
use App\Models\FaqToClient;
use App\Models\IcReview;
use App\Models\Portfolio;
use App\Models\Promocode;
use App\Models\ProviderReview;
use App\Models\Service;
use App\Models\SocialMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'name', 'email', 'password', 'google_id', 'facebook_id', 'trial_ends_at' ,'ic_provider_id' , 'ic_status',
    // ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['customerRatings'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['trial_ends_at'];


    public function scopeProvidor($query)
    {
        return $query->where('usertype', 1);
    }

    public function scopeCustomer($query)
    {
        return $query->where('usertype', 2);
    }

    public function scopeTopVendor($query)
    {
        return $query->where('usertype', 1)->where('rating', '>=', '4.3');
    }

    public function offervendor()
    {
        return $this->hasMany(Promocode::class, 'provider_id');
    }

    public function customerReviews()
    {
        return $this->hasMany(CustomerReview::class, 'provider_id');
    }

    public function providerReviews()
    {
        return $this->hasMany(ProviderReview::class, 'provider_id');
    }

    public function getCustomerRatingsAttribute()
    {
        if ($ratingCount = $this->customerReviews->count() > 0) {
            $ratingAvg = round($this->customerReviews->sum('rating') / $ratingCount, 1);
        } else {
            $ratingAvg = 0;
        }
        return $ratingAvg;
    }

    public function businessHours()
    {
        return $this->hasMany(BusinessHour::class, 'provider_id');
    }
    public function socialMedias()
    {
        return $this->hasMany(SocialMedia::class, 'provider_id');
    }
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'provider_id');
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'provider_id');
    }
    public function faqtoClients()
    {
        return $this->hasMany(FaqToClient::class, 'provider_id');
    }

    public function userAppointments()
    {
        return $this->hasMany(Appointment::class, 'user_id');
    }

    public function providerAppointments()
    {
        return $this->hasMany(Appointment::class, 'provider_id');
    }

    public function businessCategories()
    {
        return $this->hasMany(BusinessCategory::class, 'provider_id');
    }

    public function IC()
    {
        return $this->hasMany(User::class, 'ic_provider_id')->where('usertype',1)->where('providertype',2);
    }

    public function providerCustomers()
    {
        return $this->hasMany(User::class, 'provider_id')->where('usertype', 2);
    }

    public function exprineces(){
        return $this->hasOne(Expreinces::class, 'user_id');
    }

    public function empolyeeServices(){
        return $this->hasMany(EmployeeService::class , 'user_id');
    }

    public function businessHoursUpdate(){
        return $this->hasMany(BusinessHourUpdate::class, 'provider_id');
    }

    public function icReview(){
        return $this->hasMany(IcReview::class , 'ic_id');
    }

    public function providerReview(){
        return $this->hasMany(IcReview::class , 'provider_id');
    }

}
