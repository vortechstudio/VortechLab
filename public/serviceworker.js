const VERSION = 'v2';
const staticCacheName = location.protocol + "//" + location.host;
const PREFIX = "V1"
const filesToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
    self.skipWaiting();
    event.waitUntil(
        (async () => {
            const cache = await caches.open(PREFIX);
        })()
    )
    console.log(`${PREFIX} Install`);
});

// Clear cache on activate
self.addEventListener('activate', event => {
    clients.claim();
    event.waitUntil(
        (async () => {
            const keys = await caches.keys();
            await Promise.all(
                keys.map((key) => {
                    if (!key.includes(PREFIX)) {
                        return caches.delete(key);
                    }
                })
            );
        })()
    );
    console.log(`${PREFIX} Active`);
});

// Serve from Cache
self.addEventListener("fetch", event => {
    console.log(
        `${PREFIX} Fetching : ${event.request.url}, Mode : ${event.request.mode}`
    );
    if (event.request.mode === "navigate") {
        event.respondWith(
            (async () => {
                try {
                    const preloadResponse = await event.preloadResponse;
                    if (preloadResponse) {
                        return preloadResponse;
                    }

                    return await fetch(event.request);
                } catch (e) {
                    const cache = await caches.open(PREFIX);
                    return await cache.match("/offline");
                }
            })()
        );
    } else if (filesToCache.includes(event.request.url)) {
        event.respondWith(caches.match(event.request));
    }
});
