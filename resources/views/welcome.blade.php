@extends('layouts.overmeat')


@section('content')

<!-- Hero Section -->
<section id="home" class="hero">
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="{{ asset('storage/' . $heroVideo->path) }}" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-subtitle"
            data-content-en="{{ $content->hero_subtitle_en }}"
            data-content-ar="{{ $content->hero_subtitle_ar }}">
            {{ $content->hero_subtitle_en }}
        </span>
        <h1 class="hero-title"
            data-content-en="{{ $content->hero_title_en }}"
            data-content-ar="{{ $content->hero_title_ar }}">
            {{ $content->hero_title_en }}
        </h1>
        <div class="hero-buttons">
            <a href="#reservation" class="btn btn-fill" data-lang="btn_book">Book a Table</a>
            <a href="#menu" class="btn" data-lang="btn_menu">View Menu</a>
        </div>
    </div>
</section>

<!-- Limited Time Offer - Luxury Section -->
@if(isset($limitedOffer))
<section id="luxury-offer" class="luxury-offer-wrapper">
    <div class="container">
        <div class="luxury-offer-layout">

            <!-- جانب الصورة مع التأثيرات -->
            <div class="luxury-offer-image-side">
                <div class="luxury-img-glow"></div>
                <img src="{{ $limitedOffer->image ? asset('storage/' . $limitedOffer->image) : 'https://picsum.photos/seed/luxury_dish/600/700' }}" alt="{{ $limitedOffer->name_en }}" class="luxury-offer-img">

                <!-- شارة العرض النابضة -->
                <div class="luxury-offer-badge">
                    <i class="fas fa-bolt"></i>
                    <span data-lang="lux_offer_badge">Limited Time</span>
                </div>
            </div>

            <!-- جانب التفاصيل والتايمر -->
            <div class="luxury-offer-content">
                <p class="luxury-eyebrow" data-lang="lux_offer_eyebrow">Don't Miss Out</p>

                <h2 class="luxury-offer-title"
                    data-content-en="{{ $limitedOffer->name_en }}"
                    data-content-ar="{{ $limitedOffer->name_ar }}">
                    {{ $limitedOffer->name_en }}
                </h2>

                <p class="luxury-offer-desc"
                    data-content-en="{{ $limitedOffer->description_en }}"
                    data-content-ar="{{ $limitedOffer->description_ar }}">
                    {{ $limitedOffer->description_en }}
                </p>

                <!-- الأسعار -->
                <div class="luxury-pricing">
                    <span class="luxury-old-price">${{ $limitedOffer->price }}</span>
                    <span class="luxury-new-price">${{ $limitedOffer->discount_price }}</span>
                </div>

                <!-- مؤقت العد التنازلي الفاخر -->
                <div class="luxury-countdown-head" data-lang="lux_countdown_head">Offer Ends In:</div>
                <div class="luxury-countdown" id="luxury-timer" data-expires="{{ $limitedOffer->offer_expires_at }}">
                    <div class="luxury-time-box">
                        <span class="lux-time-num" id="lux-days">00</span>
                        <span class="lux-time-label" data-lang="lux_days">Days</span>
                    </div>
                    <div class="luxury-time-sep">:</div>
                    <div class="luxury-time-box">
                        <span class="lux-time-num" id="lux-hours">00</span>
                        <span class="lux-time-label" data-lang="lux_hours">Hours</span>
                    </div>
                    <div class="luxury-time-sep">:</div>
                    <div class="luxury-time-box">
                        <span class="lux-time-num" id="lux-mins">00</span>
                        <span class="lux-time-label" data-lang="lux_mins">Mins</span>
                    </div>
                    <div class="luxury-time-sep">:</div>
                    <div class="luxury-time-box">
                        <span class="lux-time-num" id="lux-secs">00</span>
                        <span class="lux-time-label" data-lang="lux_secs">Secs</span>
                    </div>
                </div>

                <a href="#reservation" class="btn btn-fill luxury-offer-btn" data-lang="lux_offer_btn">Reserve Your Spot</a>
            </div>

        </div>
    </div>
</section>
@endif
<!-- About Section -->
<section id="about" class="section-padding">
    <div class="container">
        <div class="about-grid">
            <div class="about-image-wrapper">
                <img src="{{ asset('storage/' . $heroImage->path) }}" alt="Executive Chef" class="about-image">
            </div>
            <div class="about-text">
                <h2 data-content-en="{{ $content->about_title_en }}"
                    data-content-ar="{{ $content->about_title_ar }}">
                    {{ $content->about_title_en }}
                </h2>
                <p data-content-en="{{ $content->about_desc_en }}"
                    data-content-ar="{{ $content->about_desc_ar }}">
                    {{ $content->about_desc_en }}
                </p>
                <a href="#menu" class="btn" data-lang="about_btn">Discover More</a>

                <div class="stats-container">
                    @forelse($stats as $index => $item)
                    <div class="stat-item">
                        <h4>{{ $item->number }}</h4>
                        <p data-lang="stat_exp"
                            data-content-en="{{ $item->title_en }}"
                            data-content-ar="{{ $item->title_ar }}">
                            {{ $item->title_en }}
                        </p>
                    </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Menu Section -->
<!-- Menu Section -->
<section id="menu" class="section-padding menu-section">
    <div class="container">
        <div class="section-header">
            <h2 data-lang="menu_title">Culinary Masterpieces</h2>
            <p data-lang="menu_subtitle" class="text-gold">Seasonally Inspired | Globally Sourced</p>
        </div>

        <div class="menu-filters">
            <!-- زر الكل -->
            <button class="filter-btn active" data-filter="all" data-lang="filter_all">All</button>

            <!-- أزرار الأصناف الديناميكية -->
            @foreach($categories as $category)
            <button class="filter-btn" data-filter="cat-{{ $category->id }}">
                <span data-content-en="{{ $category->name_en }}" data-content-ar="{{ $category->name_ar }}">
                    {{ $category->name_en }}
                </span>
            </button>
            @endforeach
        </div>

        <div class="menu-grid">
            @foreach($items as $item)
            <div class="menu-item" data-category="cat-{{ $item->cat_id }}">
                <div class="menu-img-container">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://picsum.photos/seed/default/400/300' }}" alt="{{ $item->name_en }}" class="menu-img">
                </div>
                <div class="menu-details">
                    <div class="dish-header">
                        <h3 class="dish-name"
                            data-content-en="{{ $item->name_en }}"
                            data-content-ar="{{ $item->name_ar }}">
                            {{ $item->name_en }}
                        </h3>

                        <span class="dish-price">
                            @if($item->is_discount && $item->discount_price)
                            <!-- عرض السعر القديم مشطوب والسعر الجديد -->
                            <span style="text-decoration: line-through; color: #888; font-size: 0.8em; margin-right: 5px;">${{ $item->price }}</span>
                            <span style="color: #4ade80;">${{ $item->discount_price }}</span>
                            @else
                            ${{ $item->price }}
                            @endif
                        </span>
                    </div>
                    <p class="dish-desc"
                        data-content-en="{{ $item->description_en }}"
                        data-content-ar="{{ $item->description_ar }}">
                        {{ $item->description_en }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="section-padding">
    <div class="container">
        <div class="section-header">
            <h2 data-lang="gallery_title">Visual Feast</h2>
            <p class="text-gold" data-lang="gallery_subtitle">Atmosphere & Plating</p>
        </div>
        <div class="gallery-grid">
            @foreach ($galleryImages as $image)
            <div class="gallery-item">
                <img src="{{ asset('storage/' .$image->path) }}" alt="Gallery" class="gallery-img">
                <div class="gallery-overlay"><i class="fas fa-search-plus gallery-icon"></i></div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="modern-testimonials">
    <div class="container">
        <div class="testimonial-slider">

            @forelse($testimonials as $item)
            <div class="testimonial-card {{ $loop->first ? 'active' : '' }}" data-index="{{ $loop->index }}">
                <div class="big-quote">“</div>
                <img src="https://picsum.photos/seed/{{ $item->id ?? 'user' }}/200/200" alt="User" class="user-img">
                <div class="t-stars">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <=$item->rating)
                        <i class="fas fa-star"></i>
                        @else
                        <i class="far fa-star" style="opacity: 0.3;"></i>
                        @endif
                        @endfor
                </div>
                <p class="testimonial-text">{{ $item->message }}</p>
                <div class="user-info">
                    <h5 class="user-name">{{ $item->name }}</h5>
                    @if($item->role)
                    <span class="user-role">{{ $item->role }}</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="text-center text-gray-400 py-10">
                <p>لا توجد آراء لعرضها حالياً.</p>
            </div>
            @endforelse

            <div class="slider-dots" id="slider-dots">
                @foreach($testimonials as $item)
                <div class="dot {{ $loop->first ? 'active' : '' }}" onclick="setSlide({{ $loop->index }})"></div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Testimonial Form Section -->
<section class="testimonial-form-section">
    <div class="container">
        <div class="form-layout">
            <div class="form-intro">
                <h3 data-lang="share_exp_title">Share Your Experience</h3>
                <p data-lang="share_exp_desc">
                    We always strive to provide the best dining experience. Your opinion matters greatly and helps us improve continuously. We look forward to hearing your story.
                </p>
                <div style="font-size: 3rem; color: rgba(212, 175, 55, 0.2);">
                    <i class="fas fa-quote-right"></i>
                </div>
            </div>

            <div class="review-form-card">
                <div id="successMessage" style="display: none; text-align: center; padding: 40px 0;">
                    <i class="fas fa-check-circle" style="font-size: 4rem; color: #4ade80; margin-bottom: 20px;"></i>
                    <h3 data-lang="success_thank_you" style="color: #fff; font-family: 'Cormorant Garamond', serif; font-size: 2rem; margin-bottom: 10px;">Thank You!</h3>
                    <p data-lang="success_review_msg" style="color: #aaa;">Your review has been submitted successfully and will be published after review.</p>
                    <button onclick="resetFormView()" data-lang="success_add_another" style="margin-top: 20px; background: transparent; border: 1px solid #333; color: #fff; padding: 10px 20px; cursor: pointer; border-radius: 4px;">Add Another Review</button>
                </div>

                <form id="reviewForm" action="{{ route('testimonials.store') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="name" id="inputName" class="review-input"
                            data-placeholder-en="Full Name" data-placeholder-ar="الاسم الكامل"
                            placeholder="Full Name" required value="{{ old('name') }}">
                        <span class="error-msg" id="error-name"></span>
                    </div>

                    <div class="input-group">
                        <input type="text" name="role" class="review-input"
                            data-placeholder-en="Role (Optional)" data-placeholder-ar="المنصب (اختياري)"
                            placeholder="Role (Optional)" value="{{ old('role') }}">
                    </div>

                    <div class="input-group">
                        <label data-lang="rate_experience" style="display:block; margin-bottom:10px; color:#888; font-size:0.9rem;">Rate your experience:</label>
                        <div class="star-rating">
                            <input type="radio" id="star5" name="rating" value="5" required /><label for="star5" class="fas fa-star"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4" class="fas fa-star"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3" class="fas fa-star"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2" class="fas fa-star"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" class="fas fa-star"></label>
                        </div>
                        <span class="error-msg" id="error-rating"></span>
                    </div>

                    <div class="input-group">
                        <textarea name="message" id="inputMessage" class="review-input" rows="4"
                            data-placeholder-en="Write your experience here..." data-placeholder-ar="اكتب تجربتك هنا..."
                            placeholder="Write your experience here..." required>{{ old('message') }}</textarea>
                        <span class="error-msg" id="error-message"></span>
                    </div>

                    <button type="submit" id="submitBtn" class="btn-submit-review">
                        <span data-lang="submit_review">Submit Review</span> <i class="fas fa-paper-plane" style="margin-right: 10px;"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Reservation Section -->
<section id="reservation" class="section-padding reservation-section">
    <div class="container">
        <div class="section-header">
            <h2 data-lang="book_title">Reserve Your Table</h2>
            <p class="text-gold" data-lang="book_subtitle">Secure your evening of indulgence</p>
        </div>

        <form action="{{ route('reservations.store') }}" method="POST" class="reservation-form" id="bookingForm">
            @if(session('status'))
            <div style=" margin-bottom: 20px; background: #D4AF37; color: #000; padding: 15px 25px; border-radius: 4px; box-shadow: 0 5px 15px rgba(0,0,0,0.3);">
                {{ session('status') }}
            </div>
            @endif
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <input name="name" type="text" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <input name="phone" type="tel" class="form-control" placeholder="Phone Number" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <input name="reservation_date" type="date" class="form-control" required>
                </div>
                <div class="form-group">
                    <select name="reservation_time" class="form-control">
                        <option value="" disabled selected>Time</option>
                        <option value="18:00">6:00 PM</option>
                        <option value="19:00">7:00 PM</option>
                        <option value="20:00">8:00 PM</option>
                        <option value="21:00">9:00 PM</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <select name="guests" class="form-control">
                        <option value="" disabled selected>Guests</option>
                        <option value="1">1 Person</option>
                        <option value="2">2 People</option>
                        <option value="3">3 People</option>
                        <option value="4">4 People</option>
                        <option value="5">5+ People</option>
                    </select>
                </div>
                <div class="form-group" style="display: flex; align-items: flex-end;">
                    <button type="submit" class="btn btn-fill" style="width: 100%;" data-lang="btn_confirm">Confirm Booking</button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="section-padding contact-section">
    <div class="contact-container">
        <div class="contact-info">
            <h2 style="margin-bottom: 30px; color: var(--gold-primary);" data-lang="contact_title">Contact Us</h2>

            <div class="contact-item">
                <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="contact-details">
                    <h5 data-lang="contact_addr_title">Address</h5>
                    <p data-content-en="{{ $setting->address_en }}" data-content-ar="{{ $setting->address_ar }}">
                        {{ $setting->address_en }}
                    </p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon"><i class="fas fa-phone"></i></div>
                <div class="contact-details">
                    <h5 data-lang="contact_phone_title">Phone</h5>
                    <p dir="ltr">{{ $setting->mobile }}</p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                <div class="contact-details">
                    <h5 data-lang="contact_email_title">Email</h5>
                    <a href="mailto:{{ $setting->email }}" class="hover:text-[#E60914] transition">
                        <p>{{ $setting->email }}</p>
                    </a>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon"><i class="fas fa-clock"></i></div>
                <div class="contact-details">
                    <h5 data-lang="contact_hours_title">Opening Hours</h5>
                    <p data-content-en="{{ $setting->hours_en }}" data-content-ar="{{ $setting->hours_ar }}">
                        {{ $setting->hours_en }}
                    </p>
                </div>
            </div>

            <div class="social-links">
                @if($setting->facebook)
                <a href="{{ $setting->facebook }}" target="_blank" class="social-link"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if($setting->instagram)
                <a href="{{ $setting->instagram }}" target="_blank" class="social-link"><i class="fab fa-instagram"></i></a>
                @endif
                @if($setting->twitter)
                <a href="{{ $setting->twitter }}" target="_blank" class="social-link"><i class="fab fa-twitter"></i></a>
                @endif
                @if($setting->snapchat)
                <a href="{{ $setting->snapchat }}" target="_blank" class="social-link"><i class="fab fa-snapchat-ghost"></i></a>
                @endif
                @if($setting->tiktok)
                <a href="{{ $setting->tiktok }}" target="_blank" class="social-link"><i class="fab fa-tiktok"></i></a>
                @endif
            </div>
        </div>
        <div class="map-wrapper">
            {!! $setting->map_link !!}
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="section-padding faq-section-wrapper">
    <div class="container">
        <div class="text-center mb-16 faq-header">
            <p class="mb-2">Have Questions?</p>
            <h2 data-lang="faq_title">الأسئلة الشائعة</h2>
            <div style="width: 60px; height: 2px; background: var(--gold-primary); margin: 20px auto;"></div>
        </div>

        <div class="max-w-4xl mx-auto">
            @forelse($faqs as $faq)
            <div class="faq-card" onclick="toggleFaq(this)">
                <button class="faq-btn">
                    <span class="faq-question data-content-wrapper"
                        data-content-en="{{ $faq->question_en }}"
                        data-content-ar="{{ $faq->question_ar }}">
                        {{ $faq->question_en }}
                    </span>
                    <div class="faq-icon">
                        <i class="fas fa-plus"></i>
                    </div>
                </button>

                <div class="faq-body">
                    <div class="faq-content data-content-wrapper"
                        data-content-en="{{ $faq->answer_en }}"
                        data-content-ar="{{ $faq->answer_ar }}">
                        {{ $faq->answer_en }}
                    </div>
                </div>
            </div>
            @empty
            <div class="text-center py-10 border border-dashed border-gray-800 rounded-lg">
                <p class="text-gray-500">لا توجد أسئلة شائعة حالياً.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

@endsection
