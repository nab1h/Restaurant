<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            direction: rtl;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            border-top: 4px solid #D4AF37;
        }

        .header {
            color: #D4AF37;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .label {
            font-weight: bold;
            color: #333;
        }

        .value {
            color: #555;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">📩 تقييم جديد بالموقع</div>
        <p>قام أحد العملاء بإرسال تقييم جديد ويحتاج إلى مراجعتك.</p>

        <p><span class="label">الاسم:</span> {{ $testimonial->name }}</p>
        @if($testimonial->role)
        <p><span class="label">المنصب:</span> {{ $testimonial->role }}</p>
        @endif
        <p><span class="label">التقييم:</span>
            @for($i = 1; $i <= 5; $i++)
                {{ $i <= $testimonial->rating ? '★' : '☆' }}
                @endfor
                </p>
                <p><span class="label">الرسالة:</span> {{ $testimonial->message }}</p>
    </div>
</body>

</html>
