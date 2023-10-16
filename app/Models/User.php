<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'role_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasMany(UserProfile::class, "user_id", 'id');
    }

    public function profileData()
    {

        $data = [];
        foreach ($this->profile as $p_data) {
            $data[$p_data['meta_key']] = $p_data['meta_value'];
        }

        return $data;
    }

    public function profileImageUrl()
    {
        $path = "";
        if (isset($this->profileData()['profile_picture'])) {
            $path = $this->profileData()['profile_picture'];
        } else {
            $path = "default-user-profile.png";
        }


        return Storage::url($path);
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function teams()
    {
        return $this->hasMany(TeamUsers::class, "user_id", "id");
    }

    public function teamsIDs()
    {
        return TeamUsers::where("user_id", $this->id)->pluck("team_id");
    }

    public function belongsToTeam($team_id)
    {
        $team_user = TeamUsers::where("team_id", $team_id)->where("user_id", $this->id)->first();

        if ($team_user) {
            return true;
        }
        return false;
    }
}