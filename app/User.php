<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public static $activeUser;
    public const COOKIE_VAR = 'userID';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public static function getIdentifiedUser(Request $request)
    {
        if (static::$activeUser instanceof self) {
            return static::$activeUser;
        }

        if ($playerId = $request->cookie(self::COOKIE_VAR)) {
            static::$activeUser = self::find($playerId);
        }

        $visit = $request->session()->has(Visit::SESSION_VAR)
            ? Visit::find($request->session()->get(Visit::SESSION_VAR))
            : null;

        if ($visit && is_numeric($visit->player_id) && $visit->player_id > 0) {
            static::$activeUser = self::find($visit->player_id);
        }

        if ($email = $request->input('email')) {
            $player = self::where('email', $email)->first();

            if ($player) {
                static::$activeUser = $player;
            }
        }

        return static::$activeUser ?? null;
    }

}
