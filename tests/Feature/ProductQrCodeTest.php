<?php

namespace Tests\Feature;

use App\Livewire\ProductTagManager;
use App\Models\Product;
use App\Models\ProductQrCode;
use App\Models\QrCodeScan;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Livewire\Livewire;
use Tests\TestCase;

class ProductQrCodeTest extends TestCase
{
    use DatabaseTransactions;

    public function test_multiple_qr_codes_can_be_created_and_deleted_for_a_product(): void
    {
        $product = Product::query()->firstOrFail();

        Livewire::test(ProductTagManager::class)
            ->call('openQrCodeModal', $product->id)
            ->set('qrCodeSource', ProductQrCode::SourceCarton)
            ->call('createQrCode')
            ->set('qrCodeSource', ProductQrCode::SourceCounter)
            ->call('createQrCode')
            ->assertSee('Download');

        $qrCodes = ProductQrCode::query()->whereBelongsTo($product)->get();

        $this->assertCount(2, $qrCodes);
        $this->assertEqualsCanonicalizing(
            [ProductQrCode::SourceCarton, ProductQrCode::SourceCounter],
            $qrCodes->pluck('source')->all(),
        );

        Livewire::test(ProductTagManager::class)
            ->call('openQrCodeModal', $product->id)
            ->call('deleteQrCode', $qrCodes->first()->id);

        $this->assertModelMissing($qrCodes->first());
        $this->assertCount(1, ProductQrCode::query()->whereBelongsTo($product)->get());
    }

    public function test_scanning_a_qr_code_records_scan_details_and_approximate_location(): void
    {
        $product = Product::query()->firstOrFail();
        $qrCode = $product->qrCodes()->firstOrCreate(
            ['source' => ProductQrCode::SourceCarton],
            ['url' => ''],
        );
        $qrCode->ensurePublicToken();
        $qrCode->update([
            'url' => route('product.qr.show', ['qrCode' => $qrCode]),
        ]);

        $this->get(route('product.qr.show', ['qrCode' => $qrCode]))
            ->assertOk()
            ->assertSee('Opening product details');

        $scan = QrCodeScan::query()->whereBelongsTo($qrCode, 'qrCode')->latest('id')->firstOrFail();

        $this->assertModelExists($scan);
        $this->assertSame($product->id, $scan->product_id);
        $this->assertSame(ProductQrCode::SourceCarton, $scan->source);

        $this->postJson(route('product.qr.location', ['qrCodeScan' => $scan]), [
            'latitude' => 22.5726,
            'longitude' => 88.3639,
            'accuracy' => 125,
        ])->assertNoContent();

        $scan->refresh();

        $this->assertEquals(22.57, $scan->latitude);
        $this->assertEquals(88.36, $scan->longitude);
        $this->assertEquals(125, $scan->location_accuracy);
    }

    public function test_a_qr_code_can_be_downloaded_as_a_png_image(): void
    {
        $product = Product::query()->firstOrFail();
        $qrCode = $product->qrCodes()->firstOrCreate(
            ['source' => ProductQrCode::SourceCat],
            ['url' => ''],
        );
        $qrCode->ensurePublicToken();
        $qrCode->update([
            'url' => route('product.qr.show', ['qrCode' => $qrCode]),
        ]);

        $this->actingAs(User::factory()->create())
            ->get(route('product.qr.download', ['qrCode' => $qrCode]))
            ->assertDownload('product-qr-'.$qrCode->id.'-'.$qrCode->source.'.png')
            ->assertHeader('Content-Type', 'image/png');
    }
}
