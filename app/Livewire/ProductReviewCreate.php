<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Productreview;
use Illuminate\Support\Facades\Http;

class ProductReviewCreate extends Component
{
    public $productId;
    public $userRate = 0;
    public $name;
    public $email;
    public $comment;
    public $recaptcha;

    public function mount($productId){
        $this->productId = $productId;
    }

    public function submitReview()
    {
        $this->validate([
            'userRate' => 'required|integer|min:1|max:5',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
            'recaptcha' => 'required',
        ],[
            'userRate.min' => 'The user rate field must be at least 1 star',
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
            Productreview::create([
                'product_id' => $this->productId,
                'user_rate' => $this->userRate,
                'name' => $this->name,
                'email' => $this->email,
                'comment' => $this->comment,
                'status' => 0, // Pending review status
            ]);
    
            session()->flash('message', 'Your review has been submitted successfully!');
            $this->reset(['userRate', 'name', 'email', 'comment']);
        }
    }


    public function render()
    {
        return view('livewire.product-review-create');
    }
}
