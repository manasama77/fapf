<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KelengkapanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nama_lengkap;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama_lengkap)
    {
        $this->nama_lengkap = $nama_lengkap;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->nama_lengkap . ' - Fap-Agri Submit Form Kelengkapan Success')
            ->view('emails.kelengkapan');
    }
}
