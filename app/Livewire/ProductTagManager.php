<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\ProductQrCode;
use App\Models\QrCodeScan;
use App\Models\Tag;
use F9WebLtd\QrCode\Facades\QrCode;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ProductTagManager extends Component
{
    public $tagProductId = null;

    public $tagProductName = '';

    public $selectedTags = [];

    public $qrCodeProductId = null;

    public $qrCodeProductName = '';

    public $qrCodeSource = '';

    public $qrCodes = [];

    public $scanQrCodeSource = '';

    public $qrCodeScans = [];

    public function openTagModal(int $productId): void
    {
        $product = Product::with('tags')->findOrFail($productId);
        $this->tagProductId = $product->id;
        $this->tagProductName = $product->name;
        $this->selectedTags = $product->tags->pluck('id')->toArray();
        $this->resetValidation();
        $this->dispatch('open-modal', name: 'product-tags');
    }

    public function saveProductTags(): void
    {
        $this->validate([
            'selectedTags' => ['array'],
            'selectedTags.*' => ['integer', 'exists:tags,id'],
        ]);

        if ($this->tagProductId) {
            $product = Product::findOrFail($this->tagProductId);
            $product->tags()->sync($this->selectedTags);
            session()->flash('success', 'Tags updated successfully.');
        }

        $this->dispatch('close-modal');
    }

    public function openQrCodeModal(int $productId): void
    {
        $product = Product::findOrFail($productId);
        $this->qrCodeProductId = $product->id;
        $this->qrCodeProductName = $product->name;
        $this->qrCodeSource = '';
        $this->loadQrCodes($product);
        $this->resetValidation();
        $this->dispatch('open-modal', name: 'product-qr-code');
    }

    public function createQrCode(): void
    {
        $this->validate([
            'qrCodeSource' => [
                'required',
                'string',
                Rule::in(ProductQrCode::sources()),
                Rule::unique('product_qr_codes', 'source')->where('product_id', $this->qrCodeProductId),
            ],
        ]);

        $product = Product::findOrFail($this->qrCodeProductId);
        $qrCode = $product->qrCodes()->create([
            'source' => $this->qrCodeSource,
            'url' => '',
        ]);

        $qrCode->update([
            'url' => route('product.qr.show', ['qrCode' => $qrCode]),
        ]);

        $this->qrCodeSource = '';
        $this->loadQrCodes($product);
        session()->flash('success', 'QR code created successfully.');
    }

    public function deleteQrCode(int $qrCodeId): void
    {
        $product = Product::findOrFail($this->qrCodeProductId);
        $product->qrCodes()->whereKey($qrCodeId)->firstOrFail()->delete();

        $this->loadQrCodes($product);
        session()->flash('success', 'QR code deleted successfully.');
    }

    public function openQrCodeScansModal(int $qrCodeId): void
    {
        $product = Product::findOrFail($this->qrCodeProductId);
        $qrCode = $product->qrCodes()->findOrFail($qrCodeId);
        $this->scanQrCodeSource = $qrCode->source;
        $this->qrCodeScans = $qrCode->scans()
            ->latest()
            ->get()
            ->map(fn (QrCodeScan $scan): array => [
                'scanned_at' => $scan->created_at->format('d M Y, h:i A'),
                'device' => $scan->device ?? 'Unknown',
                'location' => $scan->latitude === null
                    ? 'Not shared'
                    : $scan->latitude.', '.$scan->longitude.' (± '.$scan->location_accuracy.' m)',
            ])
            ->all();
        $this->dispatch('open-modal', name: 'qr-code-scans');
    }

    private function loadQrCodes(Product $product): void
    {
        $this->qrCodes = $product->qrCodes()
            ->latest()
            ->get()
            ->map(function (ProductQrCode $qrCode): array {
                $qrCode->ensurePublicToken();
                $qrCode->url = route('product.qr.show', ['qrCode' => $qrCode]);
                $qrCode->save();

                return [
                    'id' => $qrCode->id,
                    'source' => $qrCode->source,
                    'url' => $qrCode->url,
                    'download_url' => route('product.qr.download', ['qrCode' => $qrCode]),
                    'svg' => (string) QrCode::size(180)->generate($qrCode->url),
                ];
            })
            ->all();
    }

    public function render()
    {
        return view('livewire.product-tag-manager', [
            'products' => Product::with('tags')->withCount('qrCodes')->orderBy('order_no')->get(),
            'allTags' => Tag::where('status', 0)->orderBy('title')->get(),
        ]);
    }
}
