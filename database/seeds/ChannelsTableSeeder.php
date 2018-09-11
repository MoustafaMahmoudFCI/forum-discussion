<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $channel1 = ['title'=> 'Laravel' , 'slug' => str_slug('Laravel')];
      $channel2 = ['title'=> 'wordpress' , 'slug' => str_slug('wordpress')];
      $channel3 = ['title'=> 'php' , 'slug' => str_slug('php')];
      $channel4 = ['title'=> 'Vuejs' , 'slug' => str_slug('Vuejs')];
      $channel5 = ['title'=> 'Ajax' , 'slug' => str_slug('Ajax')];
      $channel6 = ['title'=> 'Bootstrap' , 'slug' => str_slug('Bootstrap')];
      $channel7 = ['title'=> 'Codeiginator' , 'slug' => str_slug('Codeiginator')];
      $channel8 = ['title'=> 'symfony' , 'slug' => str_slug('symfony')];

      Channel::create($channel1);
      Channel::create($channel2);
      Channel::create($channel3);
      Channel::create($channel4);
      Channel::create($channel5);
      Channel::create($channel6);
      Channel::create($channel7);
      Channel::create($channel8);
    }
}
