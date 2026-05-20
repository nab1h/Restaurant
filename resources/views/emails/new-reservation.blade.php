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
            display: inline-block;
            width: 100px;
        }

        .value {
            color: #555;
            margin-bottom: 15px;
        }

        .badge {
            background-color: #f59e0b;
            color: #fff;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">🍽️ حجز جديد بالموقع</div>
        <p>قام أحد العملاء بحجز طاولة ويحتاج إلى تأكيدك من لوحة التحكم.</p>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 20px 0;">

        <p><span class="label">الاسم:</span> <span class="value">{{ $reservation->name }}</span></p>
        <p><span class="label">الهاتف:</span> <span class="value" dir="ltr">{{ $reservation->phone }}</span></p>
        <p><span class="label">عدد الأشخاص:</span> <span class="value">{{ $reservation->guests }}</span></p>
        <p><span class="label">التاريخ:</span> <span class="value">{{ $reservation->reservation_date }}</span></p>
        <p><span class="label">الوقت:</span> <span class="value" dir="ltr">{{ $reservation->reservation_time }}</span></p>

        @if($reservation->notes)
        <p><span class="label">ملاحظات:</span> <span class="value">{{ $reservation->notes }}</span></p>
        @endif

        <p><span class="label">الحالة:</span> <span class="badge">قيد الانتظار</span></p>
    </div>
</body>

</html>
