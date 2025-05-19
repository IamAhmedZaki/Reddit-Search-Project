<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $proof_of_funds_file;
    public $disclosure_form_file;
    public $mls_listing_file;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $proof_of_funds_file, $disclosure_form_file, $mls_listing_file)
    {
        $this->data = $data;
        $this->proof_of_funds_file = $proof_of_funds_file;
        $this->disclosure_form_file = $disclosure_form_file;
        $this->mls_listing_file = $mls_listing_file;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email =  $this->subject('New Contact Form Submission')
                    ->view('email')
                    ->with('data', $this->data);

                    if ($this->proof_of_funds_file) {
                        $email->attach($this->proof_of_funds_file->getRealPath(), [
                            'as' => $this->proof_of_funds_file->getClientOriginalName(),
                            'mime' => $this->proof_of_funds_file->getMimeType(),
                        ]);
                    }
            
                    if ($this->disclosure_form_file) {
                        $email->attach($this->disclosure_form_file->getRealPath(), [
                            'as' => $this->disclosure_form_file->getClientOriginalName(),
                            'mime' => $this->disclosure_form_file->getMimeType(),
                        ]);
                    }
            
                    if ($this->mls_listing_file) {
                        $email->attach($this->mls_listing_file->getRealPath(), [
                            'as' => $this->mls_listing_file->getClientOriginalName(),
                            'mime' => $this->mls_listing_file->getMimeType(),
                        ]);
                    }
            
                    return $email;
    }
}
