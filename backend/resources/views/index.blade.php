<x-guest-layout>
    @push("styles")
        <style>

/* Leaving Transition */
.fade-leave-active {
    transition: opacity 0.5s ease;
}
.fade-leave-from {
    opacity: 1;
}
.fade-leave-to {
    opacity: 0;
}


/* Entering Transition */
.fadeLoading-enter-active {
    transition: opacity 0.5s ease;
}
.fadeLoading-enter-from {
    opacity: 0;
}
.fadeLoading-enter-to {
    opacity: 1;
}

/* Leaving Transition */
.fadeLoading-leave-active {
    transition: opacity 0.5s ease;
}
.fadeLoading-leave-from {
    opacity: 1;
}
.fadeLoading-leave-to {
    opacity: 0;
}


        </style>
    @endpush
    <div id="app">
    
        <transition name="fade">
            <div class="loading-screen" v-if="is_loading" style="background: #1D1400; width: 100%; height: 100vh; position: fixed; z-index: 10; display: flex; align-items: center; justify-content: center;">
                <img src="./assets/images/new_logo.png" style="width: 100px;" />
            </div>
        </transition>
        <transition name="fadeLoading">
            <div class="loading-screen" v-if="is_filtering" style="background: #1D1400; width: 100%; height: 100vh; position: fixed; z-index: 10; display: flex; align-items: center; justify-content: center;">
                <img src="./assets/images/new_logo.png" style="width: 100px;" />
            </div>
        </transition>
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
                    <input v-model="search" type="text" class="search-field bg-white rounded-full pl-10 pr-4 ml-4" v-model="search" placeholder="Search..."/>
                    <i style="padding-left: 20px;" class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>
                <div class="mobile-filter bg-white" style="margin-top: 30px;" @click="is_filter_open = !is_filter_open">
                    <i class="fa-solid fa-filter" style="font-size: 5vw"></i>
                </div>
                <div class="mobile-filter-list bg-white absolute" v-show="is_filter_open" style="display: block !important;">
                    <div class="filter-header">
                        <p>Filters</p>
                    </div>
                    <div class="price-filter">
                        <p class="font-medium">Price</p>
                        <div class="price-range flex justify-between">
                            <input type="number" placeholder="min" v-model="from">
                            <span class="separator">-</span>
                            <input type="number" placeholder="max" v-model="to">
                        </div>  
                    </div>
                    <div class="filter-items" style="margin-top: 15px !important;">
                        <div class="breed-filter filter-item flex justify-between relative" id="breed-container" data-list="breed">
                            <p style="padding-left: 10px;" @click="show_breed = !show_breed" v-text="breed ? breed : 'Breed'"></p>
                            <p>&gt;</p>
                            <div class="breed-list absolute bg-white list z-1" id="breed" v-show="show_breed">
                                <ul>
                                    <li v-for="breed in breeds" @click="changeValue('breed', breed.breed)" style="padding-left: 10px;" class="item" style="text-transform: capitalize;" :data-id="breed.id" data-list="breed" v-text="breed.breed"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="age-filter filter-item flex justify-between relative" id="age-container" data-list="age">
                            <p style="padding-left: 10px;" @click="show_age = !show_age" v-text="age ? age : 'Age'"></p>
                            <p>&gt;</p>
                            <div class="age-list bg-white list absolute z-1" id="age" v-show="show_age">
                                <ul>
                                    <li v-for="age in ages" style="padding-left: 10px;" @click="changeValue('age', age.age)" class="item" data-list="age" :data-id="age.id" v-text="age.age"></li>
                                </ul>
                            </div>
                        </div>
                        <div class="gender-filter filter-item flex justify-between relative" id="gender-container" data-list="gender">
                            <p style="padding-left: 10px;" @click="show_gender = !show_gender" v-text="gender ? gender : 'Gender'">Gender</p>
                            <p>&gt;</p>
                            <div class="age-list absolute bg-white list absolute z-1" v-show="show_gender" id="gender">
                                <ul>
                                    <li style="padding-left: 10px;" class="item" @click="changeValue('gender', 'Male')" data-list="gender">Male</li>
                                    <li style="padding-left: 10px;" class="item" @click="changeValue('gender', 'Female')" data-list="gender">Female</li>
                                </ul>
                            </div>
                        </div>
                        <button class="bg-green" style="color: white;" @click="submit">Submit</button>
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
                            <input type="number" placeholder="mins">
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
    <main id="app">
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
                        <input type="number" placeholder="min" v-model="selected_min">
                        <span class="separator">-</span>
                        <input type="number" placeholder="max" v-model="selected_max">
                    </div>
                </div>
                <div class="filter breed bg-grey">
                    <p class="font-medium">Breed</p>
                    <div class="breeds flex gap-3 flex-wrap justify-between">
                        <label v-for="breed in breeds" :for="`breed-${breed.breed}`" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" v-model="selected_breeds" :value="breed.id" :id="`breed-${breed.breed}`" :class="`breed-checkbox`" />
                            <p class="ml-1" v-text="breed.breed"></p>
                        </label>
                    </div>
                </div>
                <div class="filter age bg-grey">
                    <p class="font-medium">Age</p>
                    <div class="breeds flex gap-3 flex-wrap justify-between">
                        <label :for="`age-${age.age}`" v-for="age in ages" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" v-model="selected_ages" :value="age.id" :id="`age-${age.age}`" class="breed-checkbox" />
                            <p class="ml-1" v-text="age.age"></p>
                        </label>
                    </div>
                </div>
                <div class="filter gender bg-grey">
                    <p class="font-medium">Gender</p>
                    <div class="breeds flex gap-3 flex-wrap justify-between">
                        <label for="male" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" v-model="selected_gender" value="0" id="male" class="breed-checkbox" />
                            <p class="ml-1">Male</p>
                        </label>
                        <label for="brahmand" class="flex items-center" style="width: 45.33%;">
                            <input type="checkbox" v-model="selected_gender" value="1" id="brahmand" class="breed-checkbox" />
                            <p class="ml-1">Female</p>
                        </label>
                    </div>
                </div>
            </div>
            <div class="animals mt-6">
                <p class="mb-3">{{ number_format($animals->count()) }} Animals available</p>
                <div class="" id="animals">
                    <div @click="goToAnimal(`/animal/${animal.slug}`)" v-for="animal in animals.data" class="animal flex" style="background-color: #ebe7e1; border-radius: 10px; margin-bottom: 10px;">
                        <div class="animal-image justify-end relative" :class="{ 'sold': !animal.availability }" style="z-index: 1; width: 40%;">
                            <swiper-container class="test" pagination="true" navigation="true" class="text-red-400" style="background-blend-mode: darken; border-top-left-radius: 10px; --swiper-navigation-size: 20px">
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
                            <div class="cow-id bg-green text-center z-100 bottom-0 w-full absolute" :style="{ 'background-color': !animal.availability ? '#6D2828' : '' }" style="border-bottom-left-radius: 10px;">
                                <p style="color: white;" class="font-medium" v-text="!animal.availability ? 'SOLD' : 'ID: 000-000-000'">ID: 000-000-000</p>
                            </div>
                        </div>
                        <div class="animal-info" style="width: 60%; line-height: 27px;">
                            <h1 class="mt-3 px-3" v-text="animal.name"></h1>
                            <p class="font-medium px-3">PKR <span v-text="animal.price"></span>/-</p>
                            <p class="px-3"><span v-text="animal.live_weight"></span> KG (Live Weight)</p>
                            <div class="categories flex gap-3 mt-8 items-center">
                                <div class="breed category pl-3">
                                    <p style="font-size: 20px;" v-text="animal.breed.breed"></p>
                                </div>
                                <div class="divider" style="width: 1px; background-color: #aaa7a2; height: 16px;">&nbsp;</div>
                                <div class="gender category">
                                    <p style="font-size: 20px;" v-text="animal.gender === 0 ? 'Male' : 'Female'"></p>
                                </div>
                                <div class="divider" style="width: 1px; background-color: #aaa7a2; height: 16px;">&nbsp;</div>
                                <div class="age category">
                                    <p style="font-size: 20px;" v-text="animal.age.age"></p>
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
                </div>
            </div>
            <div class="mobile-animals" style="padding-left: 20px; width: 100%; padding-right: 20px;">
                <a v-for="animal in animals.data" :href="`/animal/${animal.slug}`" class="animal-link">
                    <div class="mobile-animal flex mt-4" style="border-radius: 5px; width: 100%;">
                        <div class="mobile-animal-image relative" style="padding-right: 0px; width: 40%px; border-top-left-radius: 50px;">
                            <div class="sold absolute" v-if="!animal.availability" style="z-index: 1; width: 100%; height: 100%;">&nbsp;</div>
                            <img src="./assets/images/cow4.jpg" style="border-radius: 0px !important; height: 106px; border-top-left-radius: 5px !important;" alt="">
                            <div class="mobile-cow-id bg-green" style="border-bottom-left-radius: 5px; width: 136px;">
                                <p style="color: white;text-align: center;font-size: 10px !important;" :style="{ 'background': !animal.availability ? '#6D2828' : '' }" v-text="!animal.availability ? 'SOLD' : 'ID: 000-000-000'">ID: 000-000-00</p>
                            </div>
                        </div>
                        <div class="animal-info" style="width: 109.5%;">
                            <div class="flex flex-col justify-between" style="width: 100%; height: 100%;">
                                <div class="card-header" style="line-height: 19px;">
                                    <h1 style="padding-left: 10px; font-size: 4.1vw !important; font-weight: 580;" v-text="animal.name"></h1>
                                    <p style="font-weight: 500; padding-left: 10px; font-size: 4.1vw !important; font-weight: 580;">PKR <span v-text="animal.price <= 100000 ? (animal.price * 2).toLocaleString('en-US') : animal.price"></span>/-</p>
                                    <p style="padding-left: 10px; font-size: 4.1vw !important;"><span v-text="animal.live_weight"></span> KG (live weight)</p>
                                </div>
                                <div>
                                    <div class="mobile-categories" style="padding-bottom: 2px; margin-top: 4px;">
                                        <div class="flex items-around" style="width: 100%; padding-bottom: 0px;">
                                            <p class="mr-2" style="padding-left: 10px; font-size: 3.2vw !important;" v-text="animal.breed.breed"></p>
                                            <div class="category-separator mr-2" style="height: 14.5px !important; width: 0.5px; background: #cccac5;"></div>
                                            <p class="mr-2" style="font-size: 3.2vw !important;" v-text="animal.gender === 0 ? 'Male' : 'Female' "></p>
                                            <div class="category-separator mr-2" style="height: 14.5px !important; width: 0.5px; background: #cccac5;"></div>
                                            <p class="mr-2" style="font-size: 3.2vw !important;" v-text="animal.age.age"></p>
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
            </div>
        </section>
        <section id="desktop-pagination" v-if="!is_filtering">
            <div style="padding-left: 10px; text-align: center;" class="desktop-pagination mt-4 mb-3">
                <a v-for="link in animals.links" @click="changePage(link.url)" class="pagination inline-block" :class="{ 'active': link.active }" v-text="link.label"></a>
            </div>
        </section>
        <section id="pagination" v-if="!is_filtering">
            <div style="padding-left: 10px; text-align: center;" class="mobile-pagination mt-4 mb-3">
                <a v-for="link in animals.links" @click="changePage(link.url)" class="pagination inline-block" :class="{ 'active': link.active }" v-text="link.label"></a>
            </div>
        </section>
        
    </div>
    </main>
    
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
        <script src="./assets/js/index.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            const { createApp } = Vue
          
            createApp({
              data() {
                return {
                    selected_breeds: [],
                    selected_ages: [],
                    selected_gender: [],
                    selected_min: 0,
                    selected_max: 0,
                    is_loading: false,
                    is_filtering: false,
                    search: "",
                    animals: [],
                    is_filter_open: false,
                    show_breed: false,
                    show_age: false,
                    show_gender: false,
                    breed: "",
                    age: "",
                    gender: "",
                    breeds: [],
                    ages: [],
                    from: null,
                    to: null
                }
              },

              async mounted() {
                this.is_loading = true;
                let response = await axios.get("/"); 
                this.animals = response.data;
                this.animals.links[0].label = "<";
                this.animals.links[this.animals.links.length - 1].label = ">";
                
                response = await axios.get("/breeds");
                this.breeds = response.data;

                response = await axios.get("/ages");
                this.ages = response.data;

                this.is_loading = false;
              },

              watch: {
                async selected_breeds(newValue) {
                    const response = await axios.get("/", {
                        params: {
                            breed: JSON.stringify(this.selected_breeds),
                            age: JSON.stringify(this.selected_ages),
                            gender: JSON.stringify(this.selected_gender)
                        }
                    });
                    this.animals = response.data;
                    this.animals.links[0].label = "<";
                    this.animals.links[this.animals.links.length - 1].label = ">"
                },
                async selected_ages(newValue) {
                    const response = await axios.get("/", {
                        params: {
                            breed: JSON.stringify(this.selected_breeds),
                            age: JSON.stringify(this.selected_ages),
                            gender: JSON.stringify(this.selected_gender)
                        }
                    })
                    console.log(response);
                    this.animals = response.data;
                    this.animals.links[0].label = "<";
                    this.animals.links[this.animals.links.length - 1].label = ">";
                },
                async selected_gender(newValue) {
                    const response = await axios.get("/", {
                        params: {
                            breed: JSON.stringify(this.selected_breeds),
                            age: JSON.stringify(this.selected_ages),
                            gender: JSON.stringify(this.selected_gender)
                        }
                    })
                    this.animals = response.data;
                    this.animals.links[0].label = "<";
                    this.animals.links[this.animals.links.length - 1].label = ">";
                },
                async search() {
                    const response = await axios.get("/", {
                        params: {
                            keyword: this.search,
                            from: this.from,
                            to: this.to,
                            breed: this.breed,
                            age: this.age 
                        }
                    })

                    this.animals = response.data;
                    this.animals.links[0].label = "<";
                    this.animals.links[this.animals.links.length - 1].label = ">";
                }
              },

              methods: {
                goToAnimal(url) {
                    window.location = url;
                },
                async changePage(url) {
                    const response = await axios.get(url);
                    this.animals = response.data; 
                    this.animals.links[0].label = "<";
                    this.animals.links[this.animals.links.length - 1].label = ">";
                },
                changeValue(type, value) {
                    this[type] = value;
                    this[`show_${type}`] = false;
                },
                async submit() {
                    this.is_filter_open = false;
                    this.is_filtering = true;
                    
                    const response = await axios.get("/", {
                        params: {
                            from: this.from,
                            to: this.to,
                            breed: this.breed,
                            age: this.age 
                        }
                    })

                    this.animals = response.data;
                    this.animals.links[0].label = "<";
                    this.animals.links[this.animals.links.length - 1].label = ">";
                    this.is_filtering = false;
                },
              }
            }).mount('#app')
        </script>
    @endpush
</x-guest-layout>