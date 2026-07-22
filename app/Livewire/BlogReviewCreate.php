<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Blogreview;
use Illuminate\Support\Facades\Http;

class BlogReviewCreate extends Component
{
    public $blogId;
    public $name;
    public $email;
    public $comment;
    public $recaptcha;

    public function mount($blogId){
        $this->blogId = $blogId;
    }

    public function submitReview()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
            'recaptcha' => 'required',
        ]);
        
        // Verify reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $this->recaptcha,
        ]);
        
        if (!$response->json('success')) {
            $this->message = "reCAPTCHA verification failed.";
            session()->flash('error', $this->message);
        }else{
            Blogreview::create([
                'blog_id' => $this->blogId,
                'name' => $this->name,
                'email' => $this->email,
                'comment' => $this->comment,
                'status' => 0, // Pending review status
            ]);
    
            session()->flash('message', 'Your review has been submitted successfully!');
            $this->reset(['name', 'email', 'comment']);
        }
    }


    public function render()
    {
        return view('livewire.blog-review-create');
    }
}
