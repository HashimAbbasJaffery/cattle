<x-guest-layout>

    <div class="none modal fixed z-9 w-full bg-green-400 bg-opacity-30 backdrop-blur-md flex flex-col items-center justify-center" style="height: 100vh;">
        <div class="image-text mb-3" style="text-align: center; font-weight: 400;">
            <p>Munni</p>
            <p>110kg (Live Weight)</p>
        </div>
        <div class="animal-gallery bg-white" style="width: 80%; border-radius: 10px;">
            <swiper-container pagination="true" loop="true">
                <swiper-slide>
                    <img src="./assets/images/cow4.jpg"  style="border-radius: 10px 10px 0px 0px;"/>
                </swiper-slide>
                <swiper-slide>
                    <img src="./assets/images/cow4.jpg"  style="border-radius: 10px 10px 0px 0px;"/>
                </swiper-slide>
            </swiper-container>
            <div class="modal-cow-id bg-green" style="border-radius: 0px 0px 10px 10px; width: 136px !important;">
                <p style="color: white; text-align: center;">ID: 000-000-000</p>
            </div>
        </div>
    </div>
    <header class="bg-primary website-header rounded-b-xl">
        <div class="container flex items-center">
            <div class="logo-container flex items-center" style="padding-bottom: 5px;">
                <img src="./assets/images/new_logo.png" style="width: 70px;" class="logo"> 
                <h1 style="color: white; font-weight: 500;">VG MILLS AND FARM</h1>
            </div>
            <div class="search-group flex relative">
                <div class="search-bar mt-4 relative">
                    <input type="text" class="search-field bg-white rounded-full pl-10 pr-4 ml-4" placeholder="Search..."/>
                    <i style="padding-left: 20px;" class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>
                <div class="mobile-filter bg-white" style="margin-top: 30px;">
                    <img src="./assets/images/filter.png" />
                </div>
                <div class="mobile-filter-list bg-white absolute">
                    <div class="filter-header">
                        <p>Filters</p>
                    </div>
                    <div class="price-filter">
                        <p class="font-medium">Price</p>
                        <div class="price-range flex justify-between">
                            <input type="number" placeholder="min">
                            <span class="separator">-</span>
                            <input type="number" placeholder="max">
                        </div>  
                    </div>
                    <div class="filter-items" style="margin-top: 15px !important;">
                        <div class="breed-filter filter-item flex justify-between relative" id="breed-container" data-list="breed">
                            <p style="padding-left: 10px;">Breed</p>
                            <p>&gt;</p>
                            <div class="none breed-list absolute bg-white list z-1" id="breed">
                                <ul>
                                    <li style="padding-left: 10px;" class="item" data-list="breed">Sahiwal</li>
                                    <li style="padding-left: 10px;" class="item" data-list="breed">Cholistani</li>
                                    <li style="padding-left: 10px;" class="item" data-list="breed">Red Sindhi</li>
                                     <li style="padding-left: 10px;" class="item" data-list="breed">Sibi Bhagnari</li>
                                    <li style="padding-left: 10px;" class="item" data-list="breed">Mix breed</li>
                                    <li style="padding-left: 10px;" class="item" data-list="breed">Australian</li>
                                </ul>
                            </div>
                        </div>
                        <div class="age-filter filter-item flex justify-between relative" id="age-container" data-list="age">
                            <p style="padding-left: 10px;">Age</p>
                            <p>&gt;</p>
                            <div class="none age-list bg-white list absolute z-1" id="age">
                                <ul>
                                    <li style="padding-left: 10px;" class="item" data-list="age">Below 1 year</li>
                                    <li style="padding-left: 10px;" class="item" data-list="age">1 Teeth</li>
                                    <li style="padding-left: 10px;" class="item" data-list="age">2 Teeth</li>
                                    <li style="padding-left: 10px;" class="item" data-list="age">4 Teeth</li>
                                    <li style="padding-left: 10px;" class="item" data-list="age">6 Teeth</li>
                                    <li style="padding-left: 10px;" class="item" data-list="age">6 Teeth+</li>
                                </ul>
                            </div>
                        </div>
                        <div class="gender-filter filter-item flex justify-between relative" id="gender-container" data-list="gender">
                            <p style="padding-left: 10px;">Gender</p>
                            <p>&gt;</p>
                            <div class="none age-list absolute bg-white list absolute z-1" id="gender">
                                <ul>
                                    <li style="padding-left: 10px;" class="item" data-list="gender">Male</li>
                                    <li style="padding-left: 10px;" class="item" data-list="gender">Female</li>
                                </ul>
                            </div>
                        </div>
                        <button class="bg-green" style="color: white;">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="bg-primary rounded-b-xl">
        <div class="container flex items-center justify-between">
            <div class="logo-container flex" style="padding-bottom: 5px;">
                <img src="./assets/images/new_logo.png" style="width: 70px;" class="logo"> 
                <h1 style="color: white; font-weight: 500;">VG MILLS AND FARM</h1>
            </div>
            <div class="search-group flex relative">
                <div class="search-bar mt-4 relative">
                    <input type="text" class="search-field bg-white rounded-full pl-10 pr-4 ml-4" placeholder="Search"/>
                    <i style="padding-left: 20px;" class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>
                <div class="mobile-filter bg-white" style="margin-top: 30px;">
                    <img src="./assets/images/filter.png" />
                </div>
                <div class="mobile-filter-list bg-white absolute">
                    <div class="filter-header">
                        <p>Filters</p>
                    </div>
                    <div class="price-filter">
                        <p class="font-medium">Price</p>
                        <div class="price-range flex justify-between">
                            <input type="number" placeholder="min">
                            <span class="separator">-</span>
                            <input type="number" placeholder="max">
                        </div>  
                    </div>
                    <div class="breed-filter">
                        <p>Breed</p>
                        <p>&gt;</p>
                    </div>
                    <div class="age-filter">
                        <p>Age</p>
                        <p>&gt;</p>
                    </div>
                    <div class="gender-filter">
                        <p>Gender</p>
                        <p>&gt;</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section id="top">
            <div class="bg-cream breadcrumbs container flex justify-between items-end">
                <p>Home</p>
                <div class="view flex gap-2 mb-3 items-start">
                    <span>View: </span>
                    <div class="flex gap-2">
                        <img id="grid" class="opacity-25" src="./assets/images/grid.png">
                        <img id="list" class="active opacity-25" src="./assets/images/list.png">
                    </div>
                </div>
            </div>
        </section>
        <section class="container bg-cream flex justify-between">
            <div class="filters bg-grey pr-9">
                <div class="filter">
                    <p>Filters</p>
                </div>
                <div class="filter price bg-grey">
                    <p class="font-medium">Price</p>
                    <div class="price-range flex justify-between">
                        <input type="number" placeholder="min">
                        <span class="separator">-</span>
                        <input type="number" placeholder="max">
                    </div>
                </div>
                <div class="filter breed bg-grey">
                    <p class="font-medium">Breed</p>
                    <div class="breeds flex gap-3 flex-wrap justify-between">
                        @foreach ($breeds as $breed)
                            <label for="{{ $breed->breed }}" class="flex items-center" style="width: 45.33%;">
                                <input type="checkbox" id="{{ $breed->breed }}" class="{{ $breed->breed }}-checkbox" />
                                <p class="ml-1">{{ $breed->breed }}</p>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="filter age bg-grey">
                    <p class="font-medium">Age</p>
                    <div class="breeds flex gap-3 flex-wrap justify-between">
                        <label for="cholistani" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" id="cholistani" class="breed-checkbox" />
                            <p class="ml-1">Below 1 year</p>
                        </label>
                        <label for="brahmand" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" id="brahmand" class="breed-checkbox" />
                            <p class="ml-1">2 Teeth</p>
                        </label>
                        <label for="sahiwal" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" id="sahiwal" class="breed-checkbox" />
                            <p class="ml-1">4 Teeth</p>
                        </label>
                        <label for="bhagnari" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" id="bhagnari" class="breed-checkbox" />
                            <p class="ml-1">6 Teeth</p>
                        </label>
                        <label for="bhagnari" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" id="bhagnari" class="breed-checkbox" />
                            <p class="ml-1">6 Teeth+</p>
                        </label>
                    </div>
                </div>
                <div class="filter gender bg-grey">
                    <p class="font-medium">Gender</p>
                    <div class="breeds flex gap-3 flex-wrap justify-between">
                        <label for="male" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" id="male" class="breed-checkbox" />
                            <p class="ml-1">Male</p>
                        </label>
                        <label for="brahmand" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" id="brahmand" class="breed-checkbox" />
                            <p class="ml-1">Female</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="animals mt-6">
                <p class="mb-3">1,440 Animals available</p>
                <div class="" id="animals">
                    @foreach($animals as $animal)
                        <div class="animal flex" style="background-color: #ebe7e1; border-radius: 10px; margin-bottom: 10px;">
                            <div class="animal-image justify-end relative" style="width: 40%;">
                                <swiper-container class="test" pagination="true" navigation="true" class="text-red-400 bg-sold/40" style="background-blend-mode: darken; border-top-left-radius: 10px; --swiper-navigation-size: 20px">
                                    <swiper-slide>
                                        <div class="image" loading="lazy" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px; background-image: url('assets/images/cow.jpg'); height: 177px; width: 100%; background-size: cover;"></div>
                                    </swiper-slide>
                                    <swiper-slide>
                                        <div class="image" loading="lazy" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px; background-image: url('assets/images/cow.jpg'); height: 177px; width: 100%; background-size: cover;"></div>
                                    </swiper-slide>
                                    <swiper-slide>
                                        <div class="image" loading="lazy" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px; background-image: url('assets/images/cow.jpg'); height: 177px; width: 100%; background-size: cover;"></div>
                                    </swiper-slide>
                                </swiper-container>
                                <div class="cow-id bg-green text-center z-100 bottom-0 w-full absolute" style="border-bottom-left-radius: 10px;">
                                    <p style="color: white;" class="font-medium">ID: 000-000-000</p>
                                </div>
                            </div>
                            <div class="animal-info" style="width: 60%; line-height: 27px;">
                                <h1 class="mt-3 px-3">{{ $animal->name }}</h1>
                                <p class="font-medium px-3">PKR {{ number_format($animal->price) }}/-</p>
                                <p class="px-3">{{ $animal->live_weight }} KG (Live Weight)</p>
                                <div class="categories flex gap-3 mt-8 items-center">
                                    <div class="breed category pl-3">
                                        <p style="font-size: 20px;">{{ $animal->breed->breed }}</p>
                                    </div>
                                    <div class="divider" style="width: 1px; background-color: #aaa7a2; height: 16px;">&nbsp;</div>
                                    <div class="gender category">
                                        <p style="font-size: 20px;">{{ $animal->gender === 0 ? 'Male' : 'Female' }}</p>
                                    </div>
                                    <div class="divider" style="width: 1px; background-color: #aaa7a2; height: 16px;">&nbsp;</div>
                                    <div class="age category">
                                        <p style="font-size: 20px;">{{ $animal->age->age }}</p>
                                    </div>
                                </div>
                                <div class="animal-footer pl-3 installment flex gap-3 items-start mt-2">
                                    <i class="fa-solid fa-calendar-days" style="font-size: 19px;"></i>
                                    <p style="font-size: 16px;">Installment plans also available</p>
                                </div>
                                <div class="grid-cow-id">
                                    <p style="color: white;" class="font-medium">ID: 000-000-000</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mobile-animals" style="padding-left: 20px; width: 100%; padding-right: 20px;">
                @foreach($animals as $animal)
                    <a href="{{ route('animal.single', [ 'animal' => $animal->slug ]) }}" class="animal-link" href="single.html">
                        <div class="mobile-animal flex mt-4" style="border-radius: 5px; width: 100%;">
                            <div class="mobile-animal-image" style="padding-right: 0px; width: 40%px; border-top-left-radius: 50px; ">
                                <img src="./assets/images/cow4.jpg" style="border-radius: 0px !important; height: 106px; border-top-left-radius: 5px !important;" alt="">
                                <div class="mobile-cow-id bg-green" style="border-bottom-left-radius: 5px; width: 136px;">
                                    <p style="color: white;text-align: center;font-size: 10px !important;">ID: 000-000-000</p>
                                </div>
                            </div>
                            <div class="animal-info" style="width: 109.5%;">
                                <div class="flex flex-col justify-between" style="width: 100%; height: 100%;">
                                    <div class="card-header" style="line-height: 19px;">
                                        <h1 style="padding-left: 10px; font-size: 4.1vw !important; font-weight: 580;">{{ $animal->name }}</h1>
                                        <p style="font-weight: 500; padding-left: 10px; font-size: 4.1vw !important; font-weight: 580;">PKR {{ number_format($animal->price) }}/-</p>
                                        <p style="padding-left: 10px; font-size: 4.1vw !important;">{{ $animal->live_weight }} KG (live weight)</p>
                                    </div>
                                    <div>
                                        <div class="mobile-categories" style="padding-bottom: 2px; margin-top: 4px;">
                                            <div class="flex items-around" style="width: 100%; padding-bottom: 0px;">
                                                <p class="mr-2" style="padding-left: 10px; font-size: 3.2vw !important;">{{ $animal->breed->breed }}</p>
                                                <div class="category-separator mr-2" style="height: 14.5px !important; width: 0.5px; background: #cccac5;"></div>
                                                <p class="mr-2" style="font-size: 3.2vw !important;">{{ $animal->gender === 0 ? 'Male' : 'Female' }}</p>
                                                <div class="category-separator mr-2" style="height: 14.5px !important; width: 0.5px; background: #cccac5;"></div>
                                                <p class="mr-2" style="font-size: 3.2vw !important;">{{ $animal->age->age }}</p>
                                            </div>
                                        </div>
                                        <div style="background: #cccac5; height: 0.5px; width: 100%"></div>
                                        <div class="flex items-start mobile-installment mb-3" style="padding-top: 1%; margin-bottom: 2px;">
                                            <i style="padding-left: 10px; font-size: 12px;" class="fa-solid fa-calendar-days mr-2" aria-hidden="true"></i>
                                            <p style="font-size: 9px !important; height: 15px !important;">Installment plans also available</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        {{ $animals->links('vendor.pagination.cattle') }}
    </main>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        <script src="./assets/js/index.js"></script>
    @endpush
</x-guest-layout>