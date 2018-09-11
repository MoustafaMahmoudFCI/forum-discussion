<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reply1=[
          'discussion_id' => 1,
          'user_id' => 1,
          'content' => 'We can also pass parameters with the Middleware. For example,
                       if your application has different roles like user,
                       admin, super admin etc. and you want to authenticate the action based on role'
        ];

        $reply2=[
          'discussion_id' => 1,
          'user_id' => 2,
          'content' => 'The Laravel service container is used to resolve all Laravel controllers. As a result,
                        you are able to type-hint any dependencies your controller may need in its constructor. '
        ];

        $reply3=[
          'discussion_id' => 2,
          'user_id' => 1,
          'content' => 'We can also pass parameters with the Middleware. For example,
                       if your application has different roles like user,
                       admin, super admin etc. and you want to authenticate the action based on role'
        ];

        Reply::create($reply1);
        Reply::create($reply2);
        Reply::create($reply3);

    }
}
