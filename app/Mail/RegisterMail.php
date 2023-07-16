<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nama_lengkap;
    public $nama_jabatan;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nama_lengkap, $nama_jabatan)
    {
        $this->nama_lengkap = $nama_lengkap;
        $this->nama_jabatan = $nama_jabatan;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject($this->nama_lengkap . ' - Fap-Agri Apply Job ' . $this->nama_jabatan . ' - Apply Job Success')
            ->view('emails.register');
    }
}
