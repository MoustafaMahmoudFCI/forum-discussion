<?php

use Illuminate\Database\Seeder;
use App\Discussion;
class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $discussion1 = [
          'user_id' => 1 ,
          'channel_id' => 1,
          'title' =>'Middleware Parameters',
          'content' => 'We can also pass parameters with the Middleware.
                         For example, if your application has different roles like user,
                         admin, super admin etc. and you want to authenticate the action based on role,
                         this can be achieved by passing parameters with middleware.
                         The middleware that we create contains the following function and we
                          can pass our custom argument after the $next argument.',
          'slug'=> str_slug('Middleware Parameters')
        ];

        $discussion2 = [
          'user_id' => 2 ,
          'channel_id' => 2,
          'title' =>'Constructor Injection',
          'content' => 'The Laravel service container is used to resolve all Laravel controllers.
                       As a result, you are able to type-hint any dependencies your controller may need in its constructor.
                      The dependencies will automatically be resolved and injected into the controller instance.',
          'slug'=> str_slug('Constructor Injection')
        ];

        $discussion3 = [
          'user_id' => 1 ,
          'channel_id' => 3,
          'title' =>'Retrieving the Request URI',
          'content' => 'The “path” method is used to retrieve the requested URI.
                       The “is” method is used to retrieve the requested URI which matches the particular pattern
                       specified in the argument of the method. To get the full URL,
                       we can use the “url” method.',
          'slug'=> str_slug('Retrieving the Request URI')
        ];

        $discussion4 = [
          'user_id' => 2 ,
          'channel_id' => 1,
          'title' =>'Controller Middleware',
          'content' => 'We have seen middleware before and it can be used with controller also.
                       Middleware can also be assigned to controller’s route or within your controller’s constructor.
                        You can use the middleware method to assign middleware to the controller.
                       The registered middleware can also be restricted to certain method of the controller.',
          'slug'=> str_slug('Controller Middleware')
        ];

        Discussion::create($discussion1);
        Discussion::create($discussion2);
        Discussion::create($discussion3);
        Discussion::create($discussion4);
    }
}
