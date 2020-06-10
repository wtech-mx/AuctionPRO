<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteLanguage extends Model
{
    protected $table = "site_language";
    protected $fillable = ['home', 'about_us', 'my_account', 'bids',  'days_left', 'donate_anonymous',  'enter_details', 'recent_posts', 'contact_us', 'faq', 'log_in', 'sign_up', 'forgot_password', 'auctions', 'running_auctions', 'completed_auctions', 'conditions', 'buy_now', 'auctions_details', 'highest_bid', 'created_by', 'dates', 'action', 'amount', 'withdraw', 'settings', 'transactions', 'total', 'subscription', 'subscribe', 'address', 'contact_us_today', 'street_address', 'phone', 'email', 'fax', 'submit', 'name', 'dashboard', 'update_profile', 'change_password', 'latest_blogs', 'footer_links', 'view_details', 'blog', 'api_documentation', 'share_in_social', 'logout'];
    public $timestamps = false;
}
