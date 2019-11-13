<?php
	
	namespace App;
	
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Illuminate\Support\Facades\Request;
	
	class User extends Authenticatable
	{
		use Notifiable;
		
		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = [
			'name','email','password',
		];
		
		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
			'password','remember_token',
		];
		
		/**
		 * The attributes that should be cast to native types.
		 *
		 * @var array
		 */
		protected $casts = [
			'email_verified_at' => 'datetime',
		];
		
		public static function isBlocked()
		{
			$ip_address = Request::ip();
			
			$blocked = BlockedList::where('ip_address',$ip_address)->first();
			
//			dd($blocked->ip_address);
			if (!empty($blocked)){
				return $blocked;
			}
			
			return null;
		}
		
		public function twits()
		{
			return $this->hasMany(Twitt::class,'user_id');
		}
		
		public function replies()
		{
			return $this->hasMany(Reply::class,'user_id');
		}
		
		public function likes()
		{
			return $this->hasMany(Like::class,'user_id');
		}
		
		public function block_user_ip()
		{
			$ip_address = Request::ip();
			
			$this->blocked_ips()->create([
				'ip_address' => $ip_address
			]);
			
		}
		
		public function blocked_ips()
		{
			return $this->hasMany(BlockedList::class,'user_id');
		}
		
		public function check_if_ip_is_bloced()
		{
			$ip_address = Request::ip();
			
			$blocked = BlockedList::where('ip_address',$ip_address)->first();
			
			if (!empty($blocked)){
				abort('405','you ip address '.$ip_address.' has been blocked');
			}
			
		}
		
	}
