<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeyfeatureController;
use App\Http\Controllers\MountinginfoController;
use App\Http\Controllers\PageFaqController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReconkitController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SeoMetaController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TsparameterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/optcr', function () {
    Artisan::call('optimize:clear');
    echo '<script>alert("Optimized clear")</script>';
});

Route::get('/shop', function () {
    return redirect()->away('https://shop.swetonspeakers.com/');
});

Route::get('/home_loudspeaker', function () {
    return redirect()->away('https://shop.swetonspeakers.com/');
});

Route::get('/allseries/wooferseries', function () {
    return redirect()->away('https://shop.swetonspeakers.com/home-loudspeaker/woofer-series');
});

Route::get('/shop/product-list/subwoofer-series', function () {
    return redirect()->away('https://shop.swetonspeakers.com/home-loudspeaker/subwoofer-series');
});

Route::get('/allseries/fullrange', function () {
    return redirect()->away('https://shop.swetonspeakers.com/home-loudspeaker/full-range-speaker-series');
});

Route::get('/pro_loudspeaker', function () {
    return redirect()->away('https://swetonspeakers.com/speaker/pro-loudspeaker');
});

Route::get('/speakerdetails/27', function () {
    return redirect()->away('https://swetonspeakers.com/speaker/pro-loudspeaker');
});

Route::get('/shop/product-list/home-loudspeakers', function () {
    return redirect()->away('https://swetonspeakers.com/speaker/home-loudspeaker/');
});

Route::get('/about', function () {
    return redirect()->away('https://swetonspeakers.com/about-us');
});

Route::get('/Sweton_Catalogue_FS.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/Sweton_Catalogue_FS.pdf');
});

Route::get('/Sweton_Catalogue_2025.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/Sweton_Catalogue_2025.pdf');
});

Route::get('/10IT400MID.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/10IT400MID.pdf');
});

Route::get('/10IT500MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/10IT500MB.pdf');
});

Route::get('/8IT201MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/8IT201MB.pdf');
});

Route::get('/8IT200MID.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/8IT200MID.pdf');
});

Route::get('/12IT800MID.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/12IT800MID.pdf');
});

Route::get('/12PA300MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/12PA300MB.pdf');
});

Route::get('/12PA400MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/12PA400MB.pdf');
});

Route::get('/12PT200FR.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/12PT200FR.pdf');
});

Route::get('/12PT200MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/12PT200MB.pdf');
});

Route::get('/12PT400LAMB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/12PT400LAMB.pdf');
});

Route::get('/12PT400VAMID.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/12PT400VAMID.pdf');
});

Route::get('/12PT500MBGold.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/12PT500MBGold.pdf');
});

Route::get('/12PT600MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/12PT600MB.pdf');
});

Route::get('/15PA500MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/15PA500MB.pdf');
});

Route::get('/15PT1200MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/15PT1200MB.pdf');
});

Route::get('/15PT500MBGOLD.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/15PT500MBGOLD.pdf');
});

Route::get('/15PT500MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/8IT201MB.pdf');
});

Route::get('/15PT600MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/15PT600MB.pdf');
});

Route::get('/15PT800MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/15PT800MB.pdf');
});

Route::get('/18IT1800SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18IT1800SUB.pdf');
});

Route::get('/18KL1845SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18KL1845SUB.pdf');
});

Route::get('/18KL1850SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18KL1850SUB.pdf');
});

Route::get('/18KL1851SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18KL1851SUB.pdf');
});

Route::get('/18KL1860SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18KL1860SUB.pdf');
});

Route::get('/18PT1000SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18PT1000SUB.pdf');
});

Route::get('/18PT1200SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18PT1200SUB.pdf');
});

Route::get('/18PT1500SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18PT1500SUB.pdf');
});

Route::get('/8IT201MB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/8IT201MB.pdf');
});

Route::get('/18PT1800SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18PT1800SUB.pdf');
});

Route::get('/18PT2000SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/18PT2000SUB.pdf');
});

Route::get('/21KL2160SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/21KL2160SUB.pdf');
});

Route::get('/21PT2000SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/21PT2000SUB.pdf');
});

Route::get('/21PT2500SUB.pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/21PT2500SUB.pdf');
});

Route::get('/15PT1000MB[3.0].pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/15PT1000MB[3.0].pdf');
});

Route::get('/15PA400MB(GOLD).pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/15PA400MB(GOLD).pdf');
});

Route::get('/15PA400MB[2.0].pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/15PA400MB[2.0].pdf');
});

Route::get('/15PT1000MB[2.0].pdf', function () {
    return redirect()->away('https://www.swetonspeakers.com/public_assets/images/15PT1000MB[2.0].pdf');
});

Route::get('/', function () {
    return view('home');
})->name('home');

// Route::get('/home-copy', function () {
//     return view('home_copy');
// })->name('home');

Route::get('/check-extensions', function () {
    $extensions = ['tokenizer', 'highlight'];
    $results = [];

    foreach ($extensions as $extension) {
        $results[$extension] = extension_loaded($extension) ? 'Enabled' : 'Not Enabled';
    }

    return response()->json($results);
});

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/tags', [TagController::class, 'search'])->name('tag.search');
Route::get('speaker/{type}', [CategoryController::class, 'all_category'])->name('category.list');
Route::get('speaker/{type}/{slug}', [ProductController::class, 'category_products'])->name('category.products');
Route::get('speaker/{type}/{category}/{slug}', [ProductController::class, 'product_public_details'])->name('product.public.details');
Route::get('speaker/{type}/{category}/{slug}/whatsapp', [ProductController::class, 'product_whatsapp_form'])->name('product.whatsapp.form');
Route::post('speaker/{type}/{category}/{slug}/whatsapp', [ProductController::class, 'product_whatsapp_connect'])->name('product.whatsapp.connect');
Route::get('p/{qrCode:public_token}', [ProductController::class, 'qr_code_product'])->name('product.qr.show');
Route::post('p/scan/{qrCodeScan:scan_token}/location', [ProductController::class, 'record_qr_code_location'])->name('product.qr.location');
Route::get('compare', [ProductController::class, 'product_compare'])->name('product.compare');

Route::get('/product-enquiry', function () {
    return view('pages.product_enquiry');
})->name('product.enquiry');
Route::post('product-enquiry', [ProductController::class, 'product_enquiry'])->name('product.enquiry.store');
Route::get('/product-enquiry/success', function () {
    if (! session()->has('whatsapp_link')) {
        return redirect()->route('product.enquiry');
    }

    return view('pages.product_enquiry_success');
})->name('product.enquiry.success');

Route::get('/application-for-dealership', function () {
    return view('pages.application_for_dealership');
})->name('application.dealership');
Route::post('application-for-dealership', [ProductController::class, 'application_for_dealership'])->name('application.dealership.store');
Route::get('/application-for-dealership/success', function () {
    if (! session()->has('whatsapp_link')) {
        return redirect()->route('application.dealership');
    }

    return view('pages.application_for_dealership_success');
})->name('application.dealership.success');

Route::get('/contact-us', function () {
    return view('pages.contact_us');
})->name('contact.us');
Route::post('/contact-us', [ProductController::class, 'contact_us_store'])->name('contact.us.store');
Route::get('/contact-us/success', function () {
    if (! session()->has('whatsapp_link')) {
        return redirect()->route('contact.us');
    }

    return view('pages.contact_us_success');
})->name('contact.us.success');

Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('login', [UserController::class, 'process_login']);

Route::get('events-and-blogs', [BlogController::class, 'public_blog_list'])->name('public.blogs');
Route::get('event-blog/{slug}', [BlogController::class, 'public_blog_details'])->name('public.blogdetails');

/* static pages */
Route::get('/about-us', function () {
    return view('pages.about_us');
});
Route::get('/events', function () {
    return view('pages.event_list');
});

Route::get('/videos', function () {
    return view('pages.video_list');
});

// Route::get('/blog-details', function () {
//     return view('pages.blog_details');
// });

Route::get('/disclaimer', function () {
    return view('pages.disclaimer');
});
Route::get('/privacy-policy', function () {
    return view('pages.privacy_policy');
});
Route::get('/cancellation-policy', function () {
    return view('pages.cancellation_policy');
});
Route::get('/refund-policy', function () {
    return view('pages.refund_policy');
});
Route::get('/shipping-policy', function () {
    return view('pages.shipping_policy');
});
Route::get('/terms-and-conditions', function () {
    return view('pages.term_conditions');
});
Route::get('/test-standard', function () {
    return view('pages.test_standard');
});
Route::get('/legal-disclaimer', function () {
    return view('pages.legal_disclaimer');
});

Route::get('/attention-manufacturers', function () {
    return view('pages.attention_manufacturers');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    /* All master routes */
    Route::resource('keyfeature', KeyfeatureController::class);
    Route::get('keyfeature/status/{id}', [KeyfeatureController::class, 'change_status'])->name('keyfeature.status');
    Route::resource('mountinginfo', MountinginfoController::class);
    Route::get('mountinginfo/status/{id}', [MountinginfoController::class, 'change_status'])->name('mountinginfo.status');
    Route::resource('specification', SpecificationController::class);
    Route::get('specification/status/{id}', [SpecificationController::class, 'change_status'])->name('specification.status');
    Route::resource('tsparameter', TsparameterController::class);
    Route::get('tsparameter/status/{id}', [TsparameterController::class, 'change_status'])->name('tsparameter.status');
    Route::resource('reconkit', ReconkitController::class);
    Route::get('reconkit/status/{id}', [ReconkitController::class, 'change_status'])->name('reconkit.status');

    /* Category routes */
    Route::resource('category', CategoryController::class);
    Route::get('category/status/{id}', [CategoryController::class, 'change_status'])->name('category.status');
    Route::get('category/keyfeatures-add/{id}', [CategoryController::class, 'keyfeature_add'])->name('category.keyfeatures.add');
    Route::post('category/keyfeatures-store/{id}', [CategoryController::class, 'keyfeature_store'])->name('category.keyfeatures.store');
    Route::get('category/{categoryId}/keyfeatures/{keyfeatureId}/edit', [CategoryController::class, 'keyfeature_edit'])->name('category.keyfeatures.edit');
    Route::put('category/keyfeatures-update/{id}', [CategoryController::class, 'keyfeature_update'])->name('category.keyfeatures.update');

    /* Product routes */
    Route::resource('product', ProductController::class);
    Route::get('product/status/{id}', [ProductController::class, 'change_status'])->name('product.status');
    Route::get('product/qr-code/{qrCode}/download', [ProductController::class, 'download_qr_code'])->name('product.qr.download');

    Route::resource('seo-meta', SeoMetaController::class)
        ->parameters(['seo-meta' => 'seoMeta'])
        ->except(['create', 'show', 'edit']);

    Route::resource('page-faq', PageFaqController::class)
        ->parameters(['page-faq' => 'pageFaq'])
        ->except(['create', 'show', 'edit']);

    Route::get('product/{id}/image', [ProductController::class, 'upload_image'])->name('product.image');
    Route::post('product/image/store/{id}', [ProductController::class, 'store_image'])->name('product.image.store');
    Route::get('product/{productId}/image/{editId}/edit', [ProductController::class, 'edit_image'])->name('product.image.edit');
    Route::put('product/image-update/{productId}', [ProductController::class, 'update_image'])->name('product.image.update');

    /* Remove Drawing Image */
    Route::delete('product/{id}/remove-drawing', [ProductController::class, 'remove_drawing'])->name('remove.drawing');
    /* Remove Datasheet Image */
    Route::delete('product/{id}/remove-datasheet', [ProductController::class, 'remove_datasheet'])->name('remove.datasheet');

    Route::get('product/combination-add/{productId}', [ProductController::class, 'combination_add'])->name('product.combination.add');
    Route::post('product/combination/store/{productId}', [ProductController::class, 'combination_store'])->name('product.combination.store');
    Route::get('product/{productId}/combination/{combinationId}/edit', [ProductController::class, 'combination_edit'])->name('product.combination.edit');
    Route::put('product/combination-update/{productId}', [ProductController::class, 'combination_update'])->name('product.combination.update');

    /* Product keyfeatures */
    Route::get('product/combination/{combinationId}/keyfeature/add', [ProductController::class, 'combination_keyfeature_add'])->name('combination.keyfeature.add');
    Route::post('product/combination/{combinationId}/keyfeature/store', [ProductController::class, 'combination_keyfeature_store'])->name('combination.keyfeature.store');
    Route::get('product/combination/keyfeature/{editId}/edit', [ProductController::class, 'combination_keyfeature_edit'])->name('combination.keyfeature.edit');
    Route::put('product/combination/keyfeature/update/{editId}', [ProductController::class, 'combination_keyfeature_update'])->name('combination.keyfeature.update');

    /* Product mountinginfos */
    Route::get('product/combination/{combinationId}/mountinginfo/add', [ProductController::class, 'combination_mountinginfo_add'])->name('combination.mountinginfo.add');
    Route::post('product/combination/{combinationId}/mountinginfo/store', [ProductController::class, 'combination_mountinginfo_store'])->name('combination.mountinginfo.store');
    Route::get('product/combination/mountinginfo/{editId}/edit', [ProductController::class, 'combination_mountinginfo_edit'])->name('combination.mountinginfo.edit');
    Route::put('product/combination/mountinginfo/update/{editId}', [ProductController::class, 'combination_mountinginfo_update'])->name('combination.mountinginfo.update');

    /* Product specifications */
    Route::get('product/combination/{combinationId}/specification/add', [ProductController::class, 'combination_specification_add'])->name('combination.specification.add');
    Route::post('product/combination/{combinationId}/specification/store', [ProductController::class, 'combination_specification_store'])->name('combination.specification.store');
    Route::get('product/combination/specification/{editId}/edit', [ProductController::class, 'combination_specification_edit'])->name('combination.specification.edit');
    Route::put('product/combination/specification/update/{editId}', [ProductController::class, 'combination_specification_update'])->name('combination.specification.update');

    /* Product tsparameters */
    Route::get('product/combination/{combinationId}/tsparameter/add', [ProductController::class, 'combination_tsparameter_add'])->name('combination.tsparameter.add');
    Route::post('product/combination/{combinationId}/tsparameter/store', [ProductController::class, 'combination_tsparameter_store'])->name('combination.tsparameter.store');
    Route::get('product/combination/tsparameter/{editId}/edit', [ProductController::class, 'combination_tsparameter_edit'])->name('combination.tsparameter.edit');
    Route::put('product/combination/tsparameter/update/{editId}', [ProductController::class, 'combination_tsparameter_update'])->name('combination.tsparameter.update');

    /* Product reconkits */
    Route::get('product/combination/{combinationId}/reconkit/add', [ProductController::class, 'combination_reconkit_add'])->name('combination.reconkit.add');
    Route::post('product/combination/{combinationId}/reconkit/store', [ProductController::class, 'combination_reconkit_store'])->name('combination.reconkit.store');
    Route::get('product/combination/reconkit/{editId}/edit', [ProductController::class, 'combination_reconkit_edit'])->name('combination.reconkit.edit');
    Route::put('product/combination/reconkit/update/{editId}', [ProductController::class, 'combination_reconkit_update'])->name('combination.reconkit.update');

    /* All product enquiries list */
    Route::get('all-enquiries', [ProductController::class, 'all_product_enquiries'])->name('product.enquiry.list');
    Route::delete('all-enquiries/{id}', [ProductController::class, 'delete_product_enquiry'])->name('product.enquiry.delete');
    Route::get('all-applications-for-dealership', [ProductController::class, 'all_applications_for_dealership'])->name('applications.for.dealership');
    Route::get('all-contact-us', [ProductController::class, 'all_contact_us'])->name('all.contact.us');
    Route::get('all-product-reviews', [ProductController::class, 'all_reviews'])->name('all.product.review');
    Route::get('product-review/status/{id}', [ProductController::class, 'change_review_status'])->name('product.review.status');

    /* All blog/event routes */
    Route::get('blog-list', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog-create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog-store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog-status/{id}', [BlogController::class, 'change_status'])->name('blog.status');
    Route::get('blog-edit/{blogId}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::get('blog-show/{blogId}', [BlogController::class, 'show'])->name('blog.show');
    Route::put('blog-update/{blogId}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('blog-images/{blogId}', [BlogController::class, 'blog_images'])->name('blog.images');
    Route::post('blog-images-upload/{blogId}', [BlogController::class, 'upload_multi_image'])->name('blog.uploadImages');
    Route::get('blog-image-delete/{imgId}', [BlogController::class, 'blog_images_del'])->name('delete.uploadImages');

    Route::get('all-blog-reviews', [BlogController::class, 'all_blog_reviews'])->name('blog.review.list');
    Route::get('blog-review/status/{id}', [BlogController::class, 'change_review_status'])->name('blog.review.status');

    /* All Tags */
    Route::get('all-tags', [TagController::class, 'index'])->name('tag.index');

});
