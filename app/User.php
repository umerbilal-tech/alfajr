<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacher(){
    	return $this->hasOne('App\TeacherProfile');
	}
	public function non_teacher(){
    	return $this->hasOne('App\NonTeaching');
	}

	public function can_access($request){

    	if($this->role==0){
    		return true;
		}else{
			$permission=Permission::where('user_id',$this->id)->first();
			if($permission){

				if($permission[$request]==1){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

	}
}
