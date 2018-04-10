<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitStage extends Model
{
    // available stage names
    public const STAGE_GATE = 'gate';
    public const STAGE_ENTRY = 'entry';
    public const STAGE_STARTING_POINT = 'starting_point';
    public const STAGE_GAME_ENTRY = 'game_entry';
    public const STAGE_SUCCESS = 'success';
    public const STAGE_SORRY = 'sorry';
    public const STAGE_FACEBOOK_SHARE = 'facebook_share';
    public const STAGE_TWITTER_SHARE = 'twitter_share';
    public const STAGE_SOCIAL_MEDIA_LOGIN = 'social_media_login';
    public const STAGE_EMAIL_OPTIN = 'email_optin';
    public const STAGE_SMS_OPTIN = 'sms_optin';
    public const STAGE_DECLARATION_FORM = 'declaration_form';
    public const STAGE_END_POINT = 'end_point';
    
    public const STAGE_PLAY_REGULAR = 'game_play_regular';
    public const STAGE_PLAY_BONUS = 'game_play_bonus';
    public const STAGE_WON = 'game_won';
    public const STAGE_LOST = 'game_lost';
    public const STAGE_WINNER_FORM = 'winner_form';
    public const STAGE_ANIMATION = 'animation';
    
    public const STAGE_BEFORE_START= 'before_start';
    public const STAGE_ENDED = 'ended';
    public const STAGE_VISIT_US_LATER = 'visit_us_later';
    
    
    
    protected $table = 'visit_stages';
    
    protected $fillable = [
        'stage_name',
        'ip',
        'agent_string',
        'options',
        'notes',
    ];
    
    
    
    public function visit()
    {
        return $this->belongsTo(Visit::class);
    }
}
