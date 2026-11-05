<?php
$title = "TelefonUz";
require 'includes/header.php';

// ---- Sozlamalar: o'zingizning ma'lumotlaringizga almashtiring ----
$shopName = 'TelefonUz';
$phone    = '+998 90 123 45 67';
$telegram = 'https://t.me/telefonuz';
$address  = "Toshkent sh., Chilonzor tumani";
$hours    = 'Har kuni 09:00 – 21:00';
// -------------------------------------------------------------------

// $products header.php da olinadi (qidiruv ham shu yerdan ishlaydi)
$latest   = array_reverse($products ?: []);
if ($search === '') {
    $latest = array_slice($latest, 0, 8);
}
$heroPics = array_slice(array_values(array_filter(array_reverse($products ?: []), fn($p) => !empty($p->image))), 0, 3);
$telDigits = preg_replace('/[^\d+]/', '', $phone);

function money($v): string
{
    return number_format((float)$v, 0, '', ' ') . " so'm";
}
?>

<!-- Hero -->
<section class="max-w-6xl mx-auto px-4 py-12 grid md:grid-cols-2 gap-10 items-center">
    <div>
        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-gray-900 leading-tight">
            Yangi smartfon, ishonchli do'kondan
        </h1>
        <p class="mt-5 text-lg text-gray-600 max-w-md">
            Original iPhone va Samsung modellari. Narxi aniq, kafolati rasmiy, yetkazib berish — o'sha kuniyoq.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="#katalog" class="px-6 py-3 bg-indigo-600 text-white font-semibold rounded-full hover:bg-indigo-700 transition">Katalogni ko'rish</a>
            <a href="#aloqa" class="px-6 py-3 border border-gray-300 font-semibold rounded-full hover:border-gray-900 transition">Savol berish</a>
        </div>
        <div class="mt-10 flex flex-wrap gap-x-10 gap-y-4 text-sm text-gray-600">
            <div><strong class="block text-2xl text-gray-900">12 oy</strong>kafolat</div>
            <div><strong class="block text-2xl text-gray-900">24 soat</strong>ichida yetkazish</div>
            <div><strong class="block text-2xl text-gray-900">0%</strong>bo'lib to'lash</div>
        </div>
    </div>

    <?php if ($heroPics): ?>
        <div class="relative h-[420px] sm:h-[500px] w-full max-w-md mx-auto" aria-hidden="true">
            <div class="absolute inset-x-[8%] inset-y-[4%] bg-orange-400 rounded-[44%_56%_48%_52%/52%_44%_56%_48%]"></div>
            <?php
            $pos = [
                'left-[24%] top-[8%] w-[52%] h-[84%] -rotate-2 z-10',
                'left-0 bottom-0 w-[38%] h-[52%] -rotate-6 z-20',
                'right-0 top-0 w-[38%] h-[52%] rotate-6 z-20',
            ];
            foreach ($heroPics as $i => $p): ?>
                <div class="absolute <?= $pos[$i] ?> bg-white rounded-3xl p-3 shadow-2xl">
                    <img class="w-full h-full object-contain rounded-xl" src="uploads/<?= htmlspecialchars($p->image) ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>

<!-- Afzalliklar -->
<section class="bg-gray-50 border-y border-gray-200">
    <div class="max-w-6xl mx-auto px-4 py-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div>
            <svg class="w-9 h-9 text-indigo-600" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M12 3l8 3v6c0 4.5-3.2 8-8 9-4.8-1-8-4.5-8-9V6z" /><path d="M9 12l2 2 4-4" /></svg>
            <h3 class="mt-3 mb-1 text-lg font-bold">Faqat original</h3>
            <p class="text-gray-600 text-sm">Har bir telefon qutisi muhrlangan holda, IMEI bo'yicha tekshirib beriladi.</p>
        </div>
        <div>
            <svg class="w-9 h-9 text-indigo-600" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="2" y="7" width="13" height="10" rx="1" /><path d="M15 10h4l3 3v4h-7" /><circle cx="7" cy="18" r="2" /><circle cx="18" cy="18" r="2" /></svg>
            <h3 class="mt-3 mb-1 text-lg font-bold">Tez yetkazish</h3>
            <p class="text-gray-600 text-sm">Toshkent bo'ylab 24 soat ichida, viloyatlarga pochta orqali.</p>
        </div>
        <div>
            <svg class="w-9 h-9 text-indigo-600" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="2" /><path d="M3 10h18M7 15h3" /></svg>
            <h3 class="mt-3 mb-1 text-lg font-bold">Bo'lib to'lash</h3>
            <p class="text-gray-600 text-sm">3, 6 yoki 12 oyga. Ariza bir necha daqiqada ko'rib chiqiladi.</p>
        </div>
        <div>
            <svg class="w-9 h-9 text-indigo-600" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="M4 13a8 8 0 0116 0" /><rect x="2" y="13" width="4" height="6" rx="1.5" /><rect x="18" y="13" width="4" height="6" rx="1.5" /></svg>
            <h3 class="mt-3 mb-1 text-lg font-bold">Kafolat va yordam</h3>
            <p class="text-gray-600 text-sm">Muammo chiqsa, telefon yoki Telegram orqali yordam beramiz.</p>
        </div>
    </div>
</section>

<!-- Katalog -->
<section id="katalog" class="max-w-6xl mx-auto px-4 py-16 scroll-mt-4">
    <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
        <?= $search !== '' ? "Qidiruv natijalari" : "Yangi kelgan telefonlar" ?>
    </h2>
    <p class="mt-2 mb-10 text-gray-600">Narxlar so'mda, soliqlar bilan.</p>

    <?php if ($latest): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <?php foreach ($latest as $product): ?>
                <article class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 flex flex-col bg-white">
                    <div class="aspect-square p-4 bg-white">
                        <?php if ($product->image): ?>
                            <img class="w-full h-full object-contain" loading="lazy"
                                src="uploads/<?= htmlspecialchars($product->image) ?>" alt="<?= htmlspecialchars($product->name) ?>">
                        <?php else: ?>
                            <div class="w-full h-full grid place-items-center text-gray-400 text-sm">Rasm yo'q</div>
                        <?php endif; ?>
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <h3 class="font-bold text-lg leading-snug"><?= htmlspecialchars($product->name) ?></h3>
                        <?php if ($product->body): ?>
                            <p class="mt-1 text-sm text-gray-600 line-clamp-2"><?= htmlspecialchars($product->body) ?></p>
                        <?php endif; ?>
                        <div class="mt-auto pt-4 flex items-center justify-between gap-2">
                            <span class="font-extrabold whitespace-nowrap"><?= htmlspecialchars(money($product->price)) ?></span>
                            <a href="#aloqa" class="px-4 py-2 text-sm bg-indigo-600 text-white font-semibold rounded-full hover:bg-indigo-700 transition">Buyurtma</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        <div class="mt-10 text-center">
            <a href="products.php" class="inline-block px-6 py-3 border border-gray-300 font-semibold rounded-full hover:border-gray-900 transition">Barcha mahsulotlar</a>
        </div>
    <?php else: ?>
        <div class="p-12 text-center text-gray-500 border border-dashed border-gray-300 rounded-2xl">
            Hozircha mahsulot yo'q. <a href="addProduct.php" class="underline">Mahsulot qo'shing</a>.
        </div>
    <?php endif; ?>
</section>

<!-- Buyurtma qadamlari -->
<section class="max-w-6xl mx-auto px-4 pb-16">
    <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight mb-10">Buyurtma uch qadamda</h2>
    <ol class="grid sm:grid-cols-3 gap-6">
        <li class="border-t-4 border-gray-900 pt-4">
            <span class="block text-4xl font-extrabold text-orange-500">1</span>
            <h3 class="mt-2 mb-1 text-xl font-bold">Modelni tanlang</h3>
            <p class="text-gray-600">Katalogdan kerakli telefonni toping va “Buyurtma” tugmasini bosing.</p>
        </li>
        <li class="border-t-4 border-gray-900 pt-4">
            <span class="block text-4xl font-extrabold text-orange-500">2</span>
            <h3 class="mt-2 mb-1 text-xl font-bold">Biz bilan bog'laning</h3>
            <p class="text-gray-600">Qo'ng'iroq qiling yoki Telegramga yozing. Rang, xotira va to'lov usulini kelishamiz.</p>
        </li>
        <li class="border-t-4 border-gray-900 pt-4">
            <span class="block text-4xl font-extrabold text-orange-500">3</span>
            <h3 class="mt-2 mb-1 text-xl font-bold">Telefoningizni oling</h3>
            <p class="text-gray-600">Kuryer manzilingizga olib boradi yoki do'konimizdan o'zingiz olib ketasiz.</p>
        </li>
    </ol>
</section>

<!-- Aloqa -->
<section id="aloqa" class="max-w-6xl mx-auto px-4 pb-16 scroll-mt-4">
    <div class="bg-gray-900 text-white rounded-3xl p-8 sm:p-14 grid md:grid-cols-2 gap-10 items-center">
        <div>
            <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Savolingiz bormi?</h2>
            <p class="mt-3 text-gray-300 max-w-md">Qaysi telefon sizga mosligini birga tanlaymiz. Yozing yoki qo'ng'iroq qiling.</p>
            <div class="mt-7 flex flex-wrap gap-3">
                <a href="tel:<?= htmlspecialchars($telDigits) ?>" class="px-6 py-3 bg-orange-500 text-gray-900 font-bold rounded-full hover:bg-orange-400 transition"><?= htmlspecialchars($phone) ?></a>
                <a href="<?= htmlspecialchars($telegram) ?>" target="_blank" rel="noopener" class="px-6 py-3 border border-white/70 font-semibold rounded-full hover:bg-white/10 transition">Telegramda yozish</a>
            </div>
        </div>
        <ul class="grid gap-5">
            <li><span class="block text-sm text-gray-400">Manzil</span><span class="text-lg font-bold"><?= htmlspecialchars($address) ?></span></li>
            <li><span class="block text-sm text-gray-400">Ish vaqti</span><span class="text-lg font-bold"><?= htmlspecialchars($hours) ?></span></li>
        </ul>
    </div>
</section>

<footer class="max-w-6xl mx-auto px-4 py-8 flex flex-wrap justify-between gap-3 text-sm text-gray-500">
    <span>© <?= date('Y') ?> <?= htmlspecialchars($shopName) ?></span>
    <a href="products.php" class="hover:text-gray-900">Boshqaruv paneli</a>
</footer>

</body>

</html>
