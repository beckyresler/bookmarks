<?php
namespace App;

use Carbon\Carbon;
use Config;
use Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Encrypts the password attribute when it is set for the model.
     * @param string $password The password.
     * @return string the encrypted password.
     */
    public function setPasswordAttribute($password)
    {
        // does the password still need to be hashed?
        if(Hash::needsRehash($password))
            $password = bcrypt($password);

        return $this->attributes['password'] = $password;
    }

    /**
	 * Gets the value of the created_at field after converting it to the site timezone.
	 * @param string $value The value of the created_at attribute from the database. The value is a UTC timestamp.
	 * @return \Carbon\Carbon A Carbon object converted to the timezone in the site config.
	 */
    public function getCreatedAtAttribute($value)
    {
    	return Carbon::parse($value)->timezone(Config::get('site.timezone'));
    }

	/**
	 * Gets the value of the updated_at field after converting it to the site timezone.
	 * @param string $value The value of the updated_at attribute from the database. The value is a UTC timestamp.
	 * @return \Carbon\Carbon A Carbon object converted to the timezone in the site config.
	 */
    public function getUpdatedAtAttribute($value)
    {
    	return Carbon::parse($value)->timezone(Config::get('site.timezone'));
    }
}
