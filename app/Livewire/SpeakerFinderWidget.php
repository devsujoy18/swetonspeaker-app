<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Productcombination;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Livewire\Component;

class SpeakerFinderWidget extends Component
{
    public bool $isOpen = false;

    public string $step = 'series';

    public ?int $selectedTypeId = null;

    public array $selectedSizes = [];

    public string $sizeInput = '';

    public ?string $selectedApplication = null;

    public array $messages = [];

    public array $results = [];

    public function mount(): void
    {
        $this->resetConversation();
    }

    public function openWidget(): void
    {
        $this->isOpen = true;
    }

    public function closeWidget(): void
    {
        $this->isOpen = false;
    }

    public function resetConversation(): void
    {
        $this->step = 'series';
        $this->selectedTypeId = null;
        $this->selectedSizes = [];
        $this->sizeInput = '';
        $this->selectedApplication = null;
        $this->results = [];
        $this->messages = [[
            'role' => 'bot',
            'text' => 'Whether you are interested in Pro series or Home series?',
        ]];
    }

    public function chooseSeries(int|string $typeId): void
    {
        $typeId = (int) $typeId;
        $series = collect($this->seriesOptions())->firstWhere('type_id', $typeId);

        if (! $series) {
            $this->addMessage('bot', 'Please choose one of the available speaker series.');

            return;
        }

        $this->selectedTypeId = $typeId;
        $this->selectedSizes = [];
        $this->selectedApplication = null;
        $this->results = [];
        $this->step = 'size';
        $this->addMessage('user', $series['label']);
        $this->addMessage('bot', 'In which size are you interested? You can select more than one size or type them below.');
    }

    public function toggleSize(int|string $size): void
    {
        $size = (int) $size;

        if (! in_array($size, $this->availableSizes(), true)) {
            return;
        }

        if (in_array($size, $this->selectedSizes, true)) {
            $this->selectedSizes = array_values(array_diff($this->selectedSizes, [$size]));

            return;
        }

        $this->selectedSizes[] = $size;
        sort($this->selectedSizes);
    }

    public function submitSizeInput(): void
    {
        $sizes = collect(preg_split('/\D+/', $this->sizeInput, -1, PREG_SPLIT_NO_EMPTY))
            ->map(fn (string $size): int => (int) $size)
            ->filter(fn (int $size): bool => in_array($size, $this->availableSizes(), true))
            ->unique()
            ->values()
            ->all();

        if ($sizes === []) {
            $this->addMessage('bot', 'Please enter an available size such as 8, 10, 12, 15, 18, or 21 inches.');

            return;
        }

        $this->selectedSizes = collect($this->selectedSizes)
            ->merge($sizes)
            ->unique()
            ->sort()
            ->values()
            ->all();
        $this->sizeInput = '';
    }

    public function continueFromSizes(): void
    {
        if ($this->selectedSizes === []) {
            $this->addMessage('bot', 'Please select or enter at least one size first.');

            return;
        }

        if ($this->applicationOptions() === []) {
            $this->addMessage('bot', 'There are no active speaker categories for the selected size. Please choose another size.');

            return;
        }

        $this->step = 'application';
        $this->addMessage('user', implode('", "', $this->selectedSizes).'"');
        $this->addMessage('bot', 'Which speaker type or category are you interested in?');
    }

    public function chooseApplication(string $application): void
    {
        $option = collect($this->applicationOptions())->firstWhere('value', $application);

        if (! $option) {
            $this->addMessage('bot', 'Please choose one of the available speaker types.');

            return;
        }

        $this->selectedApplication = $application;
        $this->results = $this->findProducts();
        $this->step = 'results';
        $this->addMessage('user', $option['label']);
        $this->addMessage('bot', $this->results === []
            ? 'I could not find an active product for that combination. Please try another size or speaker type.'
            : 'Here are the matching Sweton speakers.');
    }

    /**
     * @return array<int, array{type_id: int, label: string}>
     */
    private function seriesOptions(): array
    {
        return Category::query()
            ->whereIn('type_id', [1, 2])
            ->where('status', 0)
            ->whereHas('products', function (Builder $query): void {
                $query->where('status', 0)
                    ->whereHas('combinations', fn (Builder $combinationQuery): Builder => $combinationQuery->where('status', 0));
            })
            ->orderBy('type_id')
            ->get(['type_id'])
            ->unique('type_id')
            ->map(fn (Category $category): array => [
                'type_id' => (int) $category->type_id,
                'label' => (int) $category->type_id === 1 ? 'Pro series' : 'Home series',
            ])
            ->values()
            ->all();
    }

    /**
     * @return array<int, int>
     */
    private function availableSizes(): array
    {
        if (! $this->selectedTypeId) {
            return [];
        }

        return $this->activeProductsQuery($this->selectedTypeId)
            ->pluck('name')
            ->map(fn (string $name): ?int => $this->productSize($name))
            ->filter()
            ->unique()
            ->sort()
            ->values()
            ->all();
    }

    /**
     * @return array<int, array{value: string, label: string}>
     */
    private function applicationOptions(): array
    {
        if (! $this->selectedTypeId || $this->selectedSizes === []) {
            return [];
        }

        $products = $this->productsMatchingSelectedSizes();

        if ($this->selectedTypeId === 2) {
            return $products
                ->pluck('category')
                ->filter()
                ->unique('id')
                ->sortBy('order_no')
                ->map(fn (Category $category): array => [
                    'value' => 'category-'.$category->id,
                    'label' => $category->name,
                ])
                ->values()
                ->all();
        }

        $labels = [
            'mid' => 'Mid',
            'mid_bass' => 'Mid Bass',
            'subwoofer' => 'Subwoofer',
            'full_range' => 'Full Range',
        ];

        return $products
            ->flatMap(fn (Product $product): array => $this->applicationsForProduct($product))
            ->unique()
            ->map(fn (string $value): array => ['value' => $value, 'label' => $labels[$value]])
            ->values()
            ->all();
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function findProducts(): array
    {
        if (! $this->selectedTypeId || ! $this->selectedApplication) {
            return [];
        }

        return $this->productsMatchingSelectedSizes()
            ->filter(fn (Product $product): bool => $this->matchesApplication($product))
            ->map(fn (Product $product): array => [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'category_slug' => $product->category?->slug,
                'type_id' => (int) $product->category?->type_id,
                'image' => $product->productimages->first()?->path,
                'combinations' => $product->combinations
                    ->pluck('name')
                    ->filter()
                    ->map(fn (?string $name): string => Productcombination::formatCombinationName($name))
                    ->values()
                    ->all(),
            ])
            ->values()
            ->all();
    }

    /**
     * @return Collection<int, Product>
     */
    private function productsMatchingSelectedSizes(): Collection
    {
        if (! $this->selectedTypeId) {
            return collect();
        }

        $selectedSizes = array_map('intval', $this->selectedSizes);

        return $this->activeProductsQuery($this->selectedTypeId)
            ->with([
                'category',
                'productimages' => fn ($query) => $query->where('status', 0)->orderBy('order_no')->limit(1),
                'combinations' => fn ($query) => $query->where('status', 0)->orderBy('order_no'),
                'tags' => fn ($query) => $query->where('status', 0),
            ])
            ->orderBy('order_no')
            ->get()
            ->filter(fn (Product $product): bool => in_array($this->productSize($product->name), $selectedSizes, true))
            ->values();
    }

    private function matchesApplication(Product $product): bool
    {
        if ($this->selectedTypeId === 2 && str_starts_with($this->selectedApplication, 'category-')) {
            return (int) $product->category_id === (int) str_replace('category-', '', $this->selectedApplication);
        }

        return in_array($this->selectedApplication, $this->applicationsForProduct($product), true);
    }

    /**
     * @return array<int, string>
     */
    private function applicationsForProduct(Product $product): array
    {
        $name = Str::upper($product->name);
        $tags = $product->tags->pluck('title')->map(fn (string $title): string => Str::lower($title));
        $applications = [];

        if (Str::contains($name, ' MID') || $tags->contains('midrange')) {
            $applications[] = 'mid';
        }

        if (Str::contains($name, ' MB') || $tags->contains('mid-bass')) {
            $applications[] = 'mid_bass';
        }

        if (Str::contains($name, ' SUB') || $tags->contains('subwoofer')) {
            $applications[] = 'subwoofer';
        }

        if (Str::contains($name, ' FR') || Str::contains($name, 'FULL RANGE')) {
            $applications[] = 'full_range';
        }

        return $applications;
    }

    private function activeProductsQuery(int $typeId): Builder
    {
        return Product::query()
            ->where('status', 0)
            ->whereHas('category', function (Builder $query) use ($typeId): void {
                $query->where('type_id', $typeId)
                    ->where('status', 0);
            })
            ->whereHas('combinations', fn (Builder $query): Builder => $query->where('status', 0));
    }

    private function productSize(string $productName): ?int
    {
        if (preg_match('/^\s*(\d{1,2})\s*(?:["\'’”])?/u', $productName, $matches) !== 1) {
            return null;
        }

        return (int) $matches[1];
    }

    private function addMessage(string $role, string $text): void
    {
        $this->messages[] = compact('role', 'text');
    }

    public function render(): View
    {
        return view('livewire.speaker-finder-widget', [
            'seriesOptions' => $this->seriesOptions(),
            'availableSizes' => $this->availableSizes(),
            'applicationOptions' => $this->applicationOptions(),
        ]);
    }
}
