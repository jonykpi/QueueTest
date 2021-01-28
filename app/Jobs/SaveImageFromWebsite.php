<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SaveImageFromWebsite implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $urls;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($urls)
    {
        $this->urls = $urls;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
     foreach($this->urls as $key => $url){
         $api = "https://api.apiflash.com/v1/urltoimage?access_key=042ba02a8afa4742a52ee9dcb247f6ef&css=.modal%7B%20display%253Anone!important%7D&no_ads=true&no_cookie_banners=true&width=840&height=910&url=";
         $contents = file_get_contents($api.$url);
         $name = strtotime(Carbon::now())."-".$key.".png";
         Storage::put($name, $contents);
     }
    }
}
