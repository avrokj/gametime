<head>
    <script src="//unpkg.com/alpinejs" defer></script>

</head>

<body>
    <section class="px-4 py-24 mx-auto max-w-7xl">
        <div class="w-full mx-auto text-left md:w-11/12 xl:w-9/12 md:text-center">
            <h1 class="mb-6 text-4xl font-extrabold leading-none tracking-normal text-gray-900 md:text-6xl md:tracking-tight">
                <span class="block w-full text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-purple-500 lg:inline">Here's to the crazy ones</span>
            </h1>
        </div>

    </section>

    <section>

        <div x-data="{
        imageGalleryOpened: false,
        imageGalleryActiveUrl: null,
        imageGalleryImageIndex: null,
        imageGalleryOpen(event) {
            this.imageGalleryImageIndex = event.target.dataset.index;
            this.imageGalleryActiveUrl = event.target.src;
            this.imageGalleryOpened = true;
        },
        imageGalleryClose() {
            this.imageGalleryOpened = false;
            setTimeout(() => this.imageGalleryActiveUrl = null, 300);
        },
        imageGalleryNext(){
            if(this.imageGalleryImageIndex == this.$refs.gallery.childElementCount){
                this.imageGalleryImageIndex = 1;
            } else {
                this.imageGalleryImageIndex = parseInt(this.imageGalleryImageIndex) + 1;
            }
            this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
        },
        imageGalleryPrev() {
            if(this.imageGalleryImageIndex == 1){
                this.imageGalleryImageIndex = this.$refs.gallery.childElementCount;
            } else {
                this.imageGalleryImageIndex = parseInt(this.imageGalleryImageIndex) - 1;
            }

            this.imageGalleryActiveUrl = this.$refs.gallery.querySelector('[data-index=\'' + this.imageGalleryImageIndex + '\']').src;
            
        }
    }" @image-gallery-next.window="imageGalleryNext()" @image-gallery-prev.window="imageGalleryPrev()" @keyup.right.window="imageGalleryNext();" @keyup.left.window="imageGalleryPrev();" x-init="
        imageGalleryPhotos = $refs.gallery.querySelectorAll('img');
        for(let i=0; i<imageGalleryPhotos.length; i++){
            imageGalleryPhotos[i].setAttribute('data-index', i+1);
        }
    " class="w-full h-full select-none">
            <div class="max-w-6xl mx-auto duration-1000 delay-300 opacity-0 select-none ease animate-fade-in-view" style="translate: none; rotate: none; scale: none; opacity: 1; transform: translate(0px, 0px);">
                <ul x-ref="gallery" id="gallery" class="grid grid-cols-2 gap-5 lg:grid-cols-5">
                    <li><img x-on:click="imageGalleryOpen" src="https://images.pexels.com/photos/2356059/pexels-photo-2356059.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 01"></li>

                    <li><img x-on:click="imageGalleryOpen" src="https://images.pexels.com/photos/3618162/pexels-photo-3618162.jpeg" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 07"></li>
                    <li><img x-on:click="imageGalleryOpen" src="https://images.unsplash.com/photo-1689217634234-38efb49cb664?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 08"></li>
                    <li><img x-on:click="imageGalleryOpen" src="https://images.unsplash.com/photo-1520350094754-f0fdcac35c1c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 09"></li>
                    <li><img x-on:click="imageGalleryOpen" src="https://cdn.devdojo.com/images/june2023/mountains-10.jpeg" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 10"></li>
                    <li><img x-on:click="imageGalleryOpen" src="https://cdn.devdojo.com/images/june2023/mountains-06.jpeg" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 06"></li>
                    <li><img x-on:click="imageGalleryOpen" src="https://images.pexels.com/photos/1891234/pexels-photo-1891234.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 07"></li>

                    <li><img x-on:click="imageGalleryOpen" src="https://images.unsplash.com/photo-1529655683826-aba9b3e77383?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1965&q=80" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 08"></li>
                    <li><img x-on:click="imageGalleryOpen" src="https://images.pexels.com/photos/4256852/pexels-photo-4256852.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 09"></li>
                    <li><img x-on:click="imageGalleryOpen" src="https://images.unsplash.com/photo-1541795083-1b160cf4f3d7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1887&q=80" class="object-cover select-none w-full h-auto bg-gray-200 rounded cursor-zoom-in aspect-[5/6] lg:aspect-[2/3] xl:aspect-[3/4]" alt="photo gallery image 10"></li>
                </ul>
            </div>
            <template x-teleport="body">
                <div x-show="imageGalleryOpened" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:leave="transition ease-in-in duration-300" x-transition:leave-end="opacity-0" @click="imageGalleryClose" @keydown.window.escape="imageGalleryClose" x-trap.inert.noscroll="imageGalleryOpened" class="fixed inset-0 z-[99] flex items-center justify-center bg-black bg-opacity-50 select-none cursor-zoom-out" x-cloak>
                    <div class="relative flex items-center justify-center w-11/12 xl:w-4/5 h-11/12">
                        <div @click="$event.stopPropagation(); $dispatch('image-gallery-prev')" class="absolute left-0 flex items-center justify-center text-white translate-x-10 rounded-full cursor-pointer xl:-translate-x-24 2xl:-translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </div>
                        <img x-show="imageGalleryOpened" x-transition:enter="transition ease-in-out duration-300" x-transition:enter-start="opacity-0 transform scale-50" x-transition:leave="transition ease-in-in duration-300" x-transition:leave-end="opacity-0 transform scale-50" class="object-contain object-center w-full h-full select-none cursor-zoom-out" :src="imageGalleryActiveUrl" alt="" style="display: none;">
                        <div @click="$event.stopPropagation(); $dispatch('image-gallery-next');" class="absolute right-0 flex items-center justify-center text-white -translate-x-10 rounded-full cursor-pointer xl:translate-x-24 2xl:translate-x-32 bg-white/10 w-14 h-14 hover:bg-white/20">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </div>
                    </div>
                </div>
            </template>
        </div>

    </section>

    </main>
</body>