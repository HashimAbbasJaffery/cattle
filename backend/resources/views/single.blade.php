<x-guest-layout>
    @push('styles')
    <style>
        .more-like-mobile {
            display: none;
        }
        .facilitations-and-description {
            display: none;
        }
            @media only screen and (max-width: 600px) {
                .facilitations-and-description {
                    display: flex;
                }
                #buttons {
                    padding: 0px 20px 0px 20px;
                }
                .more-like-desktop {
                    display: none;
                }
                .more-like-mobile {
                    display: block;
                }
                .search-bar {
                    display: none;
                }
                .logo-container {
                    padding-top: 0px;
                    padding-bottom: 0px;
                }
                .single-cow {
                    margin-top: 0px !important;
                }
                .cow-id {
                    border-bottom-right-radius: 40px !important;
                    border-bottom-left-radius: 40px !important;
                }
                .cow-images {
                    display: none;
                }
                header, .website-header {
                    border-radius: 0px;
                }
                .invoice {
                    background: white;
                    position: fixed;
                    bottom: 0;
                    width: 100%;
                    height: 80%;
                    border-top-left-radius: 10px;
                    border-top-right-radius: 10px;
                    border: 1px solid grey;
                    z-index: 1;    
                    transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
                }
                .popup {
                    animation: slideUp 0.5s ease-in-out;
                }

                @keyframes slideUp {
                    from {
                        transform: translateY(100%);
                        opacity: 0;
                    }
                    to {
                        transform: translateY(0);
                        opacity: 1;
                    }
                }
            }
        </style>
    @endpush
    <header class="bg-primary website-header rounded-b-xl">
        <div class="container flex items-center">
            <div class="logo-container flex items-center" style="padding-bottom: 5px;">
                <img src="{{ asset('assets/images/new_logo.png') }}" style="width: 30px;" class="logo mr-2"> 
                <h1 style="color: white; font-weight: 500;">VG MILLS AND FARM</h1>
            </div>
            <div class="search-bar mt-4 relative">
                <input type="text" class="search-field bg-white rounded-full pl-10 pr-4 ml-4" placeholder="Search..."/>
                <i style="padding-left: 20px;" class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </div>
        </div>
    </header>
    <header class="bg-primary rounded-b-xl">
        <div class="container flex items-center">
            <div class="logo-container flex items-center" style="padding-bottom: 5px;">
                <img src="{{ asset('assets/images/new_logo.png') }}" style="width: 30px;" class="logo mr-2"> 
                <h1 style="color: white; font-weight: 500;">VG MILLS AND FARM</h1>
            </div>
            <div class="search-bar mt-4 relative">
                <input type="text" class="search-field bg-white rounded-full pl-10 pr-4 ml-4" placeholder="Search..."/>
                <i style="padding-left: 20px;" class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
            </div>
        </div>
    </header>
    <main id="app">
        <section class="container bg-cream flex single-cow " style="margin-top: 20px;">
            <div class="left-container w-1/2" style="background-color: #eae5df;  border-bottom-right-radius: 15px;">
                <div class="cow-image">
                    <swiper-container navigation="true" pagination="true" loop="true" style=" --swiper-navigation-size: 20px">
                        <swiper-slide>
                            <img src="{{ asset('assets/images/cow.jpg') }}">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="{{ asset('assets/images/cow2.jpg') }}">
                        </swiper-slide>
                        <swiper-slide>
                            <img src="{{ asset('assets/images/cow3.jpg') }}">
                        </swiper-slide>
                    </swiper-container>
                    <div class="cow-id bg-green" style="border-bottom-right-radius: 25px !important; border-bottom-left-radius: 25px !important;">
                        <p style="color: white; font-size: 20px; font-weight: 500;" class="text-center">ID: 000-000-000</p>
                    </div>
                    <div class="mobile-containers relative" style="padding-left: 20px;">
                        <div class="mobile-left-container">
                            <h1 style="margin-top: 15px; font-weight: 600; font-size: 5.7vw;">{{ $animal->name }}</h1>
                            <p class="mobile-price" style="font-weight: 600;">PKR {{ number_format($animal->price) }}/-</p>
                            <div class="live-weight flex items-center">
                                <p class="mr-5" style="font-size: 13px;">{{ $animal->live_weight }}kg live weight</p>
                                <div class="flex items-center">
                                    <i class="pr-1 fa fa-circle text-danger-glow blink mr-4" style="font-size: 10px;margin-right: 0px;"></i>
                                    <img src="{{ asset('assets/images/weight.png') }}" class="ml-1" style="width: 15px;" />
                                </div>
                            </div>
                        </div>
                        <div class="mobile-right-container absolute right-0 bg-green bottom-0 p-2" style="padding-top: 5.5px !important; padding-left: 10px; padding-bottom: 5.5px !important; padding-right: 0px !important; width: 109px !important; line-height: 9.5px; border-bottom-left-radius: 6px; border-top-left-radius: 6px;">
                            <h1 style="color: white; letter-spacing: 0.3px; font-weight: 450; font-size: 2.6vw !important;">Easy installment</h1>
                            <p style="color: white; font-size: 7px; font-weight: 450; font-size: 2vw !important;">plans are also available.</p>
                        </div>
                    </div>
                </div>
                <div style="height: 15px;">&nbsp;</div>
                <div class="cow-images flex gap-2 px-3 mt-3">
                    <div class="cow-image rounded-md" style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/cow.jpg') }}'); background-size: cover; background-position: -15px 0px;"></div>
                    <div class="cow-image rounded-md" style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/cow.jpg') }}'); background-size: cover; background-position: -15px 0px;"></div>
                    <div class="cow-image rounded-md" style="width: 50px; height: 50px; background-image: url('{{ asset('assets/images/cow.jpg') }}'); background-size: cover; background-position: -15px 0px;"></div>
                 </div>
                <div class="facilitations px-3 pt-2 mt-4" style="background-color: #f0ebe6; padding-bottom: 20px; border-bottom-right-radius: 15px;">
                    <h1 style="margin-top: 20px;">VG Cattle Farm Premium Facilitation</h1>
                    <div class="facility-list flex" style="width: 80%;">
                        <div class="facilities space-y-3 mr-4">
                            <div class="flex justify-between items-center gap-3">
                                <p>Premium VG Feed</p>
                                <img class="ml-3" src="{{ asset('assets/images/food.png') }}" width="25">
                            </div>
                            <div class="flex justify-between items-center">
                                <p>Professional staff</p>
                                <img class="ml-3" src="{{ asset('assets/images/buesinessman.png') }}" width="25">
                            </div>
                            <div class="flex justify-between items-center">
                                <p>Clean environment</p>
                                <img class="ml-3" src="{{ asset('assets/images/clean.png') }}" width="23">
                            </div>
                        </div>
                        <div class="separator bg-black" style="width: 1px;">&nbsp;</div>
                        <div class="facilities space-y-3 ml-4">
                            <div class="flex justify-between items-center">
                                <p class="order-1">24/7 Veterinary Doctor</p>
                                <img src="{{ asset('assets/images/ambulance.png') }}" class="mr-3" width="25">
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="order-1">Complete Vaccination</p>
                                <img src="{{ asset('assets/images/vaccination.png') }}" class="mr-3" width="25">
                            </div>
                            <div class="flex justify-between items-center">
                                <p class="order-1">Clean water</p>
                                <img src="{{ asset('assets/images/droplet.png') }}" class="mr-3" width="25">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="facilitations-and-description bg-cream flex items-start" style="padding-left: 20px;">
                    <div class="descriptions" style="width: 50%;">
                        <div class="description-header" style="padding-bottom: 0px;">
                            <div class="flex justify-between">
                                <p style="font-size: 2.5vw !important;">Breed</p>
                                <p style="font-size: 2.5vw !important;">{{ $animal->breed->breed }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p style="font-size: 2.5vw !important;">Gender</p>
                                <p style="font-size: 2.5vw !important;">{{ $animal->gender === 0 ? 'Male' : 'Female' }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p style="font-size: 2.5vw !important;">Age</p>
                                <p style="font-size: 2.5vw !important;">{{ $animal->age->age }}</p>
                            </div>
                        </div>
                        <div id="description" style="margin-top: 2vw">
                            <h1 style="font-weight: 500; text-transform: uppercase; margin-bottom: 3px; font-size: 2.5vw;">Description:</h1>
                            <p style="font-size: 2vw;">
                                VG Farm animals are raised in optimal conditions, receiving premium 
                                VG feed for their nutritional needs. Vaccinated against FMD, HS, LSD,
                                and BQ, they thrive under expert care.An on-site veterinarian ensures 
                                health and well-being. At VG Mills and Farm, we deliver top quality 
                                livestock to our valued customers.
                            </p>
                        </div>
                        <div id="desclaimer" style="margin-top: 10px;">
                            <h1 style="font-weight: 500; text-transform: uppercase; margin-bottom: 3px; font-size: 2.5vw; ">Desclaimer:</h1>
                            <p style="font-size: 2vw;">
                                Running a cattle operation comes with various challenges that may 
                                impact the...<span style="color: #5380cf;">read more</span>
                            </p>
                        </div>
                    </div>
                    <div class="mobile-facilitations" style="width: 50%; border-bottom-left-radius: 5px;">
                        <h1>
                            VG Cattle Farm
                            <br>
                            Premium Facilitations
                        </h1>
                        <div class="facility-list" style="padding-right: 15px;">
                            <div class="flex justify-between items-center">
                                <p>Premium VG feed</p> 
                                <img style="width: 15px;" src="{{ asset('assets/images/food.png') }}">
                            </div>
                            <div class="flex justify-between items-center">
                                <p>24/7 Veterinary Doctor</p> 
                                <img style="width: 15px;" src="{{ asset('assets/images/ambulance.png') }}">
                            </div>
                            <div class="flex justify-between items-center">
                                <p>Professional Staff</p> 
                                <img style="width: 15px;" src="{{ asset('assets/images/buesinessman.png') }}">
                            </div>
                            <div class="flex justify-between items-center">
                                <p>Complete Vaccination</p> 
                                <img style="width: 15px;" src="{{ asset('assets/images/vaccination.png') }}">
                            </div>
                            <div class="flex justify-between items-center">
                                <p>Clean Environment</p> 
                                <img style="width: 15px;" src="{{ asset('assets/images/clean.png') }}">
                            </div>
                            <div class="flex justify-between items-center">
                                <p>Clean Water</p> 
                                <img style="width: 15px;" src="{{ asset('assets/images/droplet.png') }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right-container w-1/2">
                <h1 class="pl-4">Moti</h1>
                <p class="cow-price pl-4">PKR 460,000/-</p>
                <p class="weight flex items-center pl-4">
                    <span class="mr-9">135kg live weight</span>
                    <span class="icons flex items-center">
                        <i class="fa fa-circle text-danger-glow blink mr-4" style="font-size: 20px;"></i>
                        <img src="{{ asset('assets/images/weight.png') }}" style="width: 35px; height: 35px;" />
                    </span>
                </p>
                <div class="single-cow-info flex justify-between items-end" style="border-bottom: 1px solid #c5c0b8; padding-bottom: 30px;">
                    <div class="categories w-1/3 single-cow-category space-y-3 pl-4">
                        <div class="breed flex justify-between">
                            <p>Breed</p>
                            <p>Cholistani</p>
                        </div>
                        <div class="gender flex justify-between">
                            <p>Gender</p>
                            <p>Male</p>
                        </div>
                        <div class="age flex justify-between">
                            <p>Age</p>
                            <p>3 Teeth</p>
                        </div>
                    </div>
                    <div class="installment-badge bg-green">
                        <p style="color: white">Easy Installment</p>
                        <p style="color: white;">plans are also available</p>
                    </div>
                </div>
                <div class="description pl-4">
                    <h1>Description</h1>
                    <p>
                        VG Farm animals are raised in optimal conditions, receiving 
                        premium VG feed for their nutritional needs. Vaccinated 
                        against FMD, HS, LSD, and BQ, they thrive under expert care.
                        An on-site veterinarian ensures health and well-being. At VG 
                        Mills and Farm, we deliver top quality livestock to our valued 
                        customers.
                    </p>
                </div>
                <div class="disclaimer pl-4">
                    <h1>Disclaimer</h1>
                    <p>
                        Running a cattle operation comes with various challenges 
                        that may impact the...<a href="#">Read more</a>
                    </p>
                </div>
            </div>
        </section>
        <section id="more" class="container w-full" style="margin-bottom: 1%;">
            <h1 style="padding-left: 20px;" class="more-like-desktop">More Like this</h1>
            <h1 style="padding-left: 20px; font-size: 3.5vw;" class="more-like-mobile">More Like this</h1>
            <swiper-container class="animals flex justify-between desktop" loop="true"  slides-per-view="4" space-between="10" style="width: 100%;">
                @foreach($more_animals as $more_animal)
                    <swiper-slide style="width: 100%; margin-top: 10px !important;">
                        <div class="animal flex grid mr-3" style="background-color: #ebe7e1; border-radius: 10px; margin-bottom: 10px; width: 95%;">
                            <div class="animal-image justify-end relative" >
                                <swiper-container class="test" pagination="true" navigation="true" class="text-red-400 bg-sold/40" style="background-blend-mode: darken; border-top-left-radius: 10px; --swiper-navigation-size: 20px">
                                    <swiper-slide>
                                        <div class="image" loading="lazy" style="border-top-left-radius: 10px; border-bottom-left-radius: 0px; background-image: url('assets/images/cow4.jpg'); height: 200px; width: 100%; background-size: cover;"></div>
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
                                <h1 class="" style="margin-bottom: 0px; margin-top: 3px; text-transform: uppercase; font-size: 18px !important;">{{ $more_animal->name }}</h1>
                                <p class="font-medium px-3">PKR {{ number_format($more_animal->price) }}/-</p>
                                <p class="px-3" style="font-size: 14px !important">{{ $more_animal->live_weight }} KG (Live Weight)</p>
                                <div class="categories flex gap-3 mt-8 items-center" style="padding-top: 0px;">
                                    <div class="breed category pl-3">
                                        <p style="font-size: 20px;">{{ $more_animal->breed->breed }}</p>
                                    </div>
                                    <div class="divider" style="width: 1px; background-color: #aaa7a2; height: 16px;">&nbsp;</div>
                                    <div class="gender category">
                                        <p style="font-size: 20px;">{{ $more_animal->gender === 0 ? 'Male' : 'Female' }}</p>
                                    </div>
                                    <div class="divider" style="width: 1px; background-color: #aaa7a2; height: 16px;">&nbsp;</div>
                                    <div class="age category">
                                        <p style="font-size: 20px;">{{ $more_animal->age->age }}</p>
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
                    </swiper-slide>
                @endforeach
            </swiper-container>
             <swiper-container class="animals flex justify-between mobile" style="padding-left: 20px; padding-right: 20px;" loop="true"  slides-per-view="2" space-between="10" style="width: 100%;">
                @foreach($more_animals as $more_animal)
                    <swiper-slide style="width: 100%; margin-top: 10px !important;">
                        <div class="animal flex grid mr-3" style="background-color: #ebe7e1; border-radius: 10px; margin-bottom: 10px; width: 95%;">
                            <div class="animal-image justify-end relative" >
                                <swiper-container class="test" class="text-red-400 bg-sold/40" style="background-blend-mode: darken; border-top-left-radius: 10px; --swiper-navigation-size: 20px">
                                    <swiper-slide>
                                        <img src="{{ asset('assets/images/cow4.jpg') }}" />
                                    </swiper-slide>
                                    <swiper-slide>
                                        <img src="{{ asset('assets/images/cow4.jpg') }}" />
                                </swiper-slide>
                                    <swiper-slide>
                                        <img src="{{ asset('assets/images/cow4.jpg') }}" />
                                </swiper-slide>
                                </swiper-container>
                                <div class="cow-id bg-green text-center z-100 bottom-0 w-full absolute" style="border-bottom-left-radius: 10px;">
                                    <p style="color: white;" class="font-medium">ID: 000-000-000</p>
                                </div>
                            </div>
                            <div class="animal-info" style="width: 60%; line-height: 27px;">
                                <h1 class="" style="height: 3.5vw !important; margin-bottom: 0px; margin-top: 0px; text-transform: uppercase; font-size: 3vw !important; font-weight: 600; margin-bottom: 0px !important; padding-bottom: 0px !important; height: 16px;">{{ $more_animal->name }}</h1>
                                <p class="font-medium px-3;" style="height: 3.5vw !important; font-size: 3vw;">PKR {{ number_format($more_animal->price) }}/-</p>
                                <p class="px-3" style="font-size: 2.7vw !important; height: 3.5vw !important;">{{ $more_animal->live_weight }} KG (Live Weight)</p>
                                <div class="categories flex justify-center gap-3 mt-8 items-center" style="padding-top: 0px;">
                                    <div class="breed category">
                                        <p class="mobile-slide-category" style="font-size: 2vw !important;">{{ $more_animal->breed->breed }}</p>
                                    </div>
                                    <div class="divider" style="width: 0.5px; background-color: #aaa7a2; height: 16px;">&nbsp;</div>
                                    <div class="gender category">
                                        <p class="mobile-slide-category" style="font-size: 2vw !important;">{{ $more_animal->gender === 0 ? 'Male' : 'Female' }}</p>
                                    </div>
                                    <div class="divider" style="width: 0.5px; background-color: #aaa7a2; height: 16px;">&nbsp;</div>
                                    <div class="age category pr-3">
                                        <p class="mobile-slide-category" style="font-size: 2vw !important;">{{ $more_animal->age->age }}</p>
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
                    </swiper-slide>
                @endforeach
            </swiper-container>
            <div class="invoice" v-if="show" :class="{ 'popup': show }" style="padding: 30px;">
                <h1>Requirement for Eid-ul-Azha</h1>
                <p>
                    Eid-ul-Azha: 
                    <select v-model="months">
                        @foreach($events as $event)
                            <option value="{{ $event->months }}">Eid in {{ $event->event_year }}</option>
                        @endforeach
                    </select>
                </p>
                <h1>Animal Details</h1>
                <p class="flex justify-between"><span>Status:</span> Available</p>
                <p class="flex justify-between"><span>Name:</span> {{ $animal->name }}</p>
                <p class="flex justify-between"><span>Live Weight:</span> {{ $animal->live_weight }} KG</p>
                <p class="flex justify-between"><span>Gender:</span> {{ $animal->gender === 0 ? 'Male' : 'Female' }}</p>
                <p class="flex justify-between"><span>Breed:</span> {{ $animal->breed->breed }}</p>
                <p class="flex justify-between"><span>Age:</span> {{ $animal->age->age }}</p>
                <h1>Pricing</h1>
                <p class="flex justify-between" v-if="is_cash"><span>Cash:</span> PKR {{ number_format($animal->price <= 100_000 ? $animal->price * $setting->add_if_less_than_criteria : $animal->price + ($setting->add_if_above_criteria * $animal->price) / 100) }}/-</p>
                <p class="flex justify-between" v-else><span>Installment:</span> <span v-text="'PKR ' + installment + '/-'"></span></p>
                <p class="flex justify-between"><span>Monthly Fee:</span> PKR {{ number_format($animal->maintenance_fee) }}/-</p>
                <p class="flex justify-between" style="border-bottom: 1px solid grey; padding-bottom: 10px; margin-bottom: 10px;"><span>Duration:</span> <span v-text="months + ' Months'"></span></p>
                <p class="flex justify-between" style="font-weight: bold;"><span class="mt-3">Total:</span><span class="total-price mt-3" v-text="'PKR ' + ((maintenance * months) + parseInt(price)).toLocaleString('en-US', { minimumFractionDigits: 2 }) + '/-'"></span></p>
            </div>
        </section>
        <section id="buttons" class="container mx-auto z-1" style="background: white; padding-top: 10px; padding-bottom: 10px;">
            <div class="purchase flex mb-3 gap-2">
                <button class="bg-green w-1/2 p-2 rounded-full" style="color: white;" @click="selectCash">Cash</button>
                <button class="bg-green w-1/2 rounded-full" style="color: white;" @click="selectInstallment">Installment</button>
            </div>
            <div class="contact">
                <button class="bg-green w-full p-2 rounded-full" style="color: white;">Whatsapp</button>
            </div>
        </section>
    </main>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        <script src="{{ asset('assets/js/index.js') }}"></script>
        <script>
            const { createApp } = Vue
          
            createApp({
              data() {
                return {
                    is_cash: true,
                    show: false,
                    months: 12,
                    originalPrice: '{{ $animal->price }}',
                    price: '{{ $animal->price <= 100_000 ? $animal->price * $setting->add_if_less_than_criteria : $animal->price + ($setting->add_if_above_criteria * $animal->price) / 100 }}',
                    maintenance: '{{ $animal->maintenance_fee }}',
                    installment: null,
                    percentage: '{{ $setting->add_if_above_criteria }}'
                }
              },
              created() {
                this.installment = (this.originalPrice / this.months) * this.getPercentageOf(this.originalPrice, this.percentage);
              },
              methods: {
                selectCash() {
                    this.show = !this.show;
                    this.is_cash = true;
                },
                selectInstallment() {
                    this.show = !this.show;
                    this.is_cash = false;
                },
                getPercentageOf(price, percentage) {
                    return (price * percentage) / 100;
                }
              }
            }).mount('#app')
          </script>
    @endpush
</x-guest-layout>