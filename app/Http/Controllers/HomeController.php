<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\HomeContent;
use App\Models\Faq;
use App\Models\Media;
use App\Models\Statistic;
use App\Models\Testimonial;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $setting= Setting::first();
        $content = HomeContent::firstOrCreate(['id' => 1]);
        $faqs = Faq::where('is_active', true)->get();
        $heroVideo = Media::where('type', 'hero_video')->where('is_active', true)->first();
        $heroImage = Media::where('type', 'hero_image')->where('is_active', true)->first();
        $galleryImages = Media::where('type', 'gallery_image')->where('is_active', true)->ordered()->get();
        $stats = Statistic::orderBy('sort_order')->get();
        $testimonials = Testimonial::where('is_active', true)
            ->latest()
            ->get();

        $categories = Category::where('is_active', 1)->get();
        $items = Product::where('is_available', 1)->get();
        $limitedOffer = Product::where('is_discount', 1)
            ->where('is_available', 1)
            ->where('offer_expires_at', '>', now())
            ->first();

        return view('welcome',compact('limitedOffer','categories', 'items','setting', 'stats', 'content', 'faqs',  'heroVideo', 'heroImage', 'galleryImages', 'testimonials'));
    }


    public function menu()
    {
        $setting = Setting::first();
        $categories = Category::where('is_active', 1)->get();
        $items = Product::where('is_available', 1)->get();

        return view('menu', compact('categories', 'items', 'setting'));
    }
}
