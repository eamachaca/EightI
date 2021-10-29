<?php

namespace App\Console\Commands;

use App\Mail\SendBookMail;
use App\Models\Book;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eight:i';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email with a command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $email = new SendBookMail(Book::with('information.copyright', 'information.mediaType', 'formats')->inRandomOrder()->first());
            Mail::to(config('eight_i.email'))->queue($email);
            $this->info('Intentó enviar Correctamente');
        } catch (\Exception $exception) {
            Log::error($exception);
            $this->error('Se ha producido un error al intentar enviar el correo');
        }
    }
}
