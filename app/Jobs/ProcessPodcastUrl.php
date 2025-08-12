<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessPodcastUrl implements ShouldQueue
{
    use Queueable;

    public $rssUrl;

    /**
     * Create a new job instance.
     */
    public function __construct($rssUrl)
    {
        $this->rssUrl = $rssUrl;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
    }
}
