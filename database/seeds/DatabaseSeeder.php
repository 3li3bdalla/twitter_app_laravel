<?php
	
	use App\BlockedKeyword;
	use App\Like;
	use App\Reply;
	use App\Twitt;
	use App\User;
	use Illuminate\Database\Seeder;
	
	class DatabaseSeeder extends Seeder
	{
		/**
		 * Seed the application's database.
		 *
		 * @return void
		 */
		public function run()
		{
			factory(User::class,10)->create();
			factory(Twitt::class,400)->create();
			factory(Like::class,1000)->create();
			factory(Reply::class,1000)->create();
			factory(BlockedKeyword::class,20)->create();
//         $this->call(UsersTableSeeder::class);
		}
	}
