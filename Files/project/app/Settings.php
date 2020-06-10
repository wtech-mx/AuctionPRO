<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $table = "settings";
    protected $fillable = ['logo', 'favicon', 'title', 'url', 'about', 'address', 'phone', 'fax', 'email', 'footer', 'background', 'currency_sign', 'currency_code', 'paypal_business', 'stripe_key', 'stripe_secret', 'theme_color', 'success_msg', 'basic_charge', 'featured_charge', 'withdraw_charge', 'paypal_payment', 'stripe_payment'];
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
}
