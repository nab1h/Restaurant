@extends('layouts.overmeat')

@section('content')

<!-- 1. هيدر الصفحة الفاخر مع شعار المطعم كخلفية -->
<section class="menu-page-hero">
    <!-- الشعار كخلفية شفافة (Watermark) -->
    @if($setting->logo)
    <div class="menu-hero-watermark">
        <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo">
    </div>
    @endif

    <div class="menu-hero-content">
        <h1 data-lang="menu_hero_title">Our Menu</h1>
        <div class="menu-hero-divider"></div>
        <p class="text-gold" data-lang="menu_hero_subtitle">A Symphony of Flavors</p>
    </div>
</section>

<!-- 2. سيكشن عرض الأصناف بالصور -->
<section class="visual-categories-section">
    <div class="container">
        <div class="visual-cat-grid">
            <!-- زر الكل -->
            <div class="visual-cat-card active" data-filter="all">
                <img src="https://picsum.photos/seed/all_food/400/400" alt="All">
                <div class="visual-cat-overlay">
                    <h3 data-lang="filter_all">All</h3>
                </div>
            </div>

            <!-- الأصناف الديناميكية -->
            @foreach($categories as $category)
            <div class="visual-cat-card" data-filter="cat-{{ $category->id }}">
                <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://picsum.photos/seed/cat'.$category->id.'/400/400' }}" alt="{{ $category->name_en }}">
                <div class="visual-cat-overlay">
                    <h3 data-content-en="{{ $category->name_en }}" data-content-ar="{{ $category->name_ar }}">
                        {{ $category->name_en }}
                    </h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="menu-items-section">
    <div class="container">
        <div class="menu-luxury-grid">
            @foreach($items as $item)
            <div class="menu-luxury-item" data-category="cat-{{ $item->cat_id }}">
                <div class="menu-luxury-img-box">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://picsum.photos/seed/item'.$item->id.'/600/400' }}" alt="{{ $item->name_en }}">
                </div>
                <div class="menu-luxury-details">
                    <div class="menu-luxury-header">
                        <h3 data-content-en="{{ $item->name_en }}" data-content-ar="{{ $item->name_ar }}">
                            {{ $item->name_en }}
                        </h3>
                        <span class="menu-luxury-price">
                            @if($item->is_discount && $item->discount_price)
                            <span class="old-price">${{ $item->price }}</span>
                            <span class="new-price">${{ $item->discount_price }}</span>
                            @else
                            ${{ $item->price }}
                            @endif
                        </span>
                    </div>
                    <p data-content-en="{{ $item->description_en }}" data-content-ar="{{ $item->description_ar }}">
                        {{ $item->description_en }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const catCards = document.querySelectorAll('.visual-cat-card');
        const menuItems = document.querySelectorAll('.menu-luxury-item');

        // عرض العناصر لأول مرة عند فتح الصفحة
        menuItems.forEach(item => {
            item.style.display = 'block';
            setTimeout(() => item.classList.add('show'), 100);
        });

        // نظام الفلترة بناءً على الصور
        catCards.forEach(card => {
            card.addEventListener('click', () => {
                // إزال الكلاس النشط من باقي الصور وإضافته للصورة المضغوطة
                catCards.forEach(c => c.classList.remove('active'));
                card.classList.add('active');

                const filterValue = card.getAttribute('data-filter');

                menuItems.forEach(item => {
                    item.classList.remove('show');

                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        setTimeout(() => item.classList.add('show'), 10);
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endsection
