<?php print '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>{{ route('surah.index') }}</loc>
        <lastmod>{{ \Carbon\Carbon::now()->format('Y-m-d') }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>1</priority>

    </url>
    @foreach($surah as $item)
        <url>
            <loc>{{ route('surah.show', $item->slug) }}</loc>
            <lastmod>{{ \Carbon\Carbon::now()->format('Y-m-d') }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.8</priority>
        </url>
        @foreach($item->ayah as $ayah)
            <url>
                <loc>{{ route('ayah.show', [$item->slug, $ayah->number]) }}</loc>
                <lastmod>{{ \Carbon\Carbon::now()->format('Y-m-d') }}</lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.7</priority>
            </url>
        @endforeach
    @endforeach
</urlset>
