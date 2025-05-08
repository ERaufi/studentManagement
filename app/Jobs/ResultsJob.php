<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;


class ResultsJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $email;
    public function __construct(string $email)
    {
        //
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        Mail::to($this->email)->send(new WelcomeMail());
    }
}
