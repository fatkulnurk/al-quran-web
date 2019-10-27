const CACHE_NAME = 'al-quran';
const urlsToCache = [
    '/',
@foreach($surah as $item)
    '{{ route('surah.show', $item->slug) }}',
{{--    @foreach($item->ayah as $ayah)--}}
{{--        '{{ route('ayah.show', [$item->slug, $ayah->number]) }}',--}}
{{--    @endforeach--}}
@endforeach
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];


self.addEventListener('install', function(event) {
    // Perform install steps
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(function(cache) {
                console.log('in install service worker... cache opened');
                return cache.addAll(urlsToCache);
            })
    );
});


self.addEventListener('fetch', function(event) {
    let request = event.request;
    let url = new URL(request.url);

    // memisahkan request api dan internal
    if(url.origin === location.origin){
        event.respondWith(
            caches.match(request).then(function(response){
                return response || fetch(request)
            })
        );
    }else{
        event.respondWith(
            caches.open('products-cache').then(function(cache){
                return fetch(request).then(function(liveResponse){
                    cache.put(request,liveResponse.clone());
                    return liveResponse
                }).catch(function(){
                    return caches.match(request).then(function(response){
                        if(response) return response;
                        return caches.match('/fallback.json')
                    })
                })
            })
        )
    }
});

self.addEventListener('activate', function(event) {
    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.filter(function(cacheName){
                    return cacheName !== CACHE_NAME
                }).map(function(cacheName){
                    return caches.delete(cacheName)
                })
            );
        })
    );
});

