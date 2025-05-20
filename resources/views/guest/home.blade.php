<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>BMP Car Rental System</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/bmp_icon.ico') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class', // or 'media'
            theme: {
                extend: {
                    colors: {
                        primary: '#1D4ED8',
                    },
                },
            },
        }
    </script>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>


<body class="font-sans h-screen w-full overflow-x-hidden">
    <!-- MAIN BODY -->
    <div class="bg-white-100 text-black/100 h-screen w-full flex flex-col overflow-x-hidden">

        <!-- HEADER LOCATE: resources/views/profile/partials/header.blade.php-->
        @section('content')
        @include('profile.partials.guestheader')

        <!-- Main Content -->
        <main class="flex-1 mt-16">
            <!-- FIRST CONTAINER -->
            <!-- In the Hero Section -->
            <section
                class="relative bg-[#0f1021] text-white py-24 md:py-50 text-center flex flex-col justify-center w-full overflow-hidden">
                <div class="absolute inset-0 flex justify-between">
                    <!-- Car images - hidden on mobile, shown on md screens and up -->
                    <img src="{{ asset('assets/carleft.svg') }}" class="hidden md:block w-[35%]" alt="Car Left">
                    <img src="{{ asset('assets/carright.svg') }}" class="hidden md:block w-[35%]" alt="Car Right">
                </div>
                <div class="relative z-10 container mx-auto px-4 md:px-6">
                    <!-- Smaller logo on mobile -->
                    <img src="{{ asset('assets/bmp_logo.png') }}" alt="BMP Logo"
                        class="h-8 md:h-15 mx-auto mb-4 md:mb-5 brightness-0 invert">
                    <h1 class="text-2xl md:text-5xl font-bold uppercase">RENT A CAR TODAY</h1>
                    <p class="mt-2 text-sm md:text-lg uppercase font-semibold tracking-wide">EXCLUSIVE & LOW COST CAR
                        RENTAL</p>
                    <p class="mt-2 text-xs md:text-sm max-w-2xl mx-auto">
                        Find the perfect rental car for your family and enjoy a smooth, stress-free journey wherever you
                        go.
                        <br class="hidden md:block">
                        With a wide range of comfortable and reliable vehicles, you get the freedom to travel on your
                        terms!
                    </p>
                    <a href="/cars"
                        class="mt-6 md:mt-8 inline-block bg-primary text-white px-5 py-2 rounded-md text-base md:text-lg font-medium tracking-wide hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                        Book Now →
                    </a>
                </div>
            </section>

            <!-- In the Second Container -->
            <section class="py-6 md:py-6 bg-white text-black">
                <div class="container mx-auto px-4">
                    <!-- Three Column Grid Section -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12 items-stretch max-w-7xl mx-auto">

                        <!-- Locations Card -->
                        <div class="md:px-6 rounded-xl">
                            <h2 class="text-lg md:text-xl font-bold mb-5 text-center">OUR BRANCH</h2>
                            <div class="flex flex-col space-y-4 text-[#0f294c]">
                                <div class="flex items-center gap-3">
                                    <i class="fa-solid fa-map-marker-alt text-[#0F3460] text-xl"></i>
                                    <span class="font-medium text-lg">Davao, Ecoland</span>
                                </div>
                                <p class="text-gray-600 text-base mt-2">
                                    Our main branch located in Davao's business district with convenient access and
                                    premium services.
                                </p>
                            </div>
                        </div>

                        <!-- Services Card -->
                        <div class="md:px-6 rounded-xl">
                            <h2 class="text-lg md:text-xl font-bold mb-5 text-center">OUR SERVICES</h2>
                            <ul class="space-y-4 text-[#0f294c]">
                                <li class="flex items-start gap-3">
                                    <i class="fa-solid fa-check-circle text-[#0F3460] text-lg mt-1"></i>
                                    <div>
                                        <h3 class="font-semibold text-base md:text-lg">Daily and Long-Term Rentals</h3>
                                        <p class="text-gray-600 text-sm md:text-base mt-1">
                                            Flexible rental periods from hourly to monthly with special rates.
                                        </p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <i class="fa-solid fa-check-circle text-[#0F3460] text-lg mt-1"></i>
                                    <div>
                                        <h3 class="font-semibold text-base md:text-lg">Wide Vehicle Selection</h3>
                                        <p class="text-gray-600 text-sm md:text-base mt-1">
                                            50+ vehicles including sedans, SUVs, vans, and premium cars.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Car Brands Card -->
                        <div class="md:px-6 rounded-xl">
                            <h2 class="text-lg md:text-xl font-bold mb-5 text-center">OUR CAR BRANDS</h2>
                            <div class="grid grid-cols-3 gap-4 md:gap-6">
                                <div class="flex justify-center items-center h-16 md:h-20">
                                    <img src="{{ asset('assets/body2/brands/icon_toyota.png') }}" alt="Toyota"
                                        class="h-full w-auto object-contain">
                                </div>
                                <div class="flex justify-center items-center h-16 md:h-20">
                                    <img src="{{ asset('assets/body2/brands/icon_honda.png') }}" alt="Honda"
                                        class="h-full w-auto object-contain">
                                </div>
                                <div class="flex justify-center items-center h-16 md:h-20">
                                    <img src="{{ asset('assets/body2/brands/icon_ford.png') }}" alt="Ford"
                                        class="h-full w-auto object-contain">
                                </div>
                                <div class="flex justify-center items-center h-16 md:h-20">
                                    <img src="{{ asset('assets/body2/brands/icon_mitshubishi.png') }}" alt="Mitsubishi"
                                        class="h-12 w-auto object-contain">
                                </div>
                                <div class="flex justify-center items-center h-16 md:h-20">
                                    <img src="{{ asset('assets/body2/brands/icon_suzuki.png') }}" alt="Suzuki"
                                        class="h-12 w-auto object-contain">
                                </div>
                                <div class="flex justify-center items-center h-16 md:h-20">
                                    <img src="{{ asset('assets/body2/brands/icon_nissan.png') }}" alt="Nissan"
                                        class="h-full w-auto object-contain">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="bg-white py-12 md:py-16">
                <div class="container mx-auto px-5 sm:px-8 max-w-7xl">
                    <!-- Mobile: Heading above image -->
                    <div class="pb-10">
                        <h3 class="lg:hidden text-3xl font-bold uppercase italic text-[#0F3460]">FEEL THE BEST
                            EXPERIENCE WITH OUR RENTAL DEALS</h3>
                    </div>

                    <div class="flex flex-col lg:flex-row gap-10 md:gap-12 items-center">

                        <!-- Mercedes Image -->
                        <div class="lg:w-1/2 w-full order-1 lg:order-none">
                            <img src="{{ asset('assets/body2/car/mercedes.png') }}"
                                alt="Premium Mercedes rental vehicle"
                                class="w-full max-w-xl mx-auto h-auto object-contain">
                        </div>

                        <!-- Deals Content -->
                        <div class="lg:w-1/2 w-full order-2 lg:order-none space-y-8">
                            <!-- FEEL THE BEST EXPERIENCE text block -->
                            <div class="space-y-8">
                                <div>
                                    <h3 class="hidden lg:block text-3xl font-bold uppercase italic text-[#0F3460]">FEEL
                                        THE BEST EXPERIENCE WITH OUR RENTAL DEALS</h3>
                                </div>

                                <!-- Deal Cards - positioned exactly like reference -->
                                <div class="space-y-6 pl-8 border-l-4 border-[#0F3460]">
                                    <article>
                                        <h3 class="text-xl font-bold uppercase  mb-2">DEALS FOR EVERY BUDGET</h3>
                                        <p class="text-gray-600">
                                            Looking for a car rental for your next trip? Here are some tips to help you
                                            find.
                                        </p>
                                    </article>

                                    <article>
                                        <h3 class="text-xl font-bold uppercase mb-2">BEST PRICE GUARANTEED</h3>
                                        <p class="text-gray-600">
                                            Looking for a car rental for your next trip? Here are some tips to help you
                                            find.
                                        </p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- In the Third Container -->
            <!-- FEATURED CARS SECTION -->
            <section class="py-12 md:py-16 bg-[#0B1320] text-white">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16 max-w-3xl mx-auto">
                        <span class="text-sm md:text-base font-medium text-gray-400 tracking-widest">PREMIUM
                            SELECTION</span>
                        <h2 class="text-3xl md:text-5xl font-bold mt-4">Our Featured Vehicles</h2>
                        <div class="w-24 h-1 bg-primary mx-auto mt-6"></div>
                    </div>

                    <!-- Cars Container -->
                    <div class="flex flex-col gap-20 md:gap-28 max-w-7xl mx-auto">

                        <!-- VIOS -->
                        <div class="flex flex-col xl:flex-row items-center justify-between gap-12">
                            <div class="xl:w-1/2 w-full flex justify-center px-4">
                                <img src="{{ asset('assets/body3/car/vios.svg') }}" alt="Toyota Vios"
                                    class="h-auto max-h-72 md:max-h-96 w-full object-contain transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="xl:w-1/2 w-full xl:pl-12">
                                <div class="flex items-center gap-4 mb-6">
                                    <img src="{{ asset('assets/body3/brands/logo_toyota.svg') }}" alt="Toyota"
                                        class="h-14 md:h-16">
                                    <h3 class="text-2xl md:text-4xl font-medium">Toyota Vios</h3>
                                </div>
                                <span
                                    class="inline-block text-sm md:text-base text-gray-400 font-medium mb-6 border-b border-gray-700 pb-2">
                                    1.3 XLE CVT (Silver Metallic)
                                </span>
                                <p class="text-base md:text-lg text-gray-300 leading-relaxed mb-8">
                                    The reliable and fuel-efficient subcompact sedan delivers exceptional practicality
                                    with premium
                                    features rarely found in its class, making it perfect for both city driving and long
                                    journeys.
                                </p>
                                <button
                                    class="px-8 py-3.5 bg-primary text-white rounded-md text-base md:text-lg font-medium tracking-wide 
                                hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                                    Reserve Now →
                                </button>
                            </div>
                        </div>

                        <!-- MONTERO -->
                        <div class="flex flex-col xl:flex-row-reverse items-center justify-between gap-12">
                            <div class="xl:w-1/2 w-full flex justify-center px-4">
                                <img src="{{ asset('assets/body3/car/montero.svg') }}" alt="Mitsubishi Montero"
                                    class="h-auto max-h-72 md:max-h-96 w-full object-contain transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="xl:w-1/2 w-full xl:pr-12 text-left xl:text-right">
                                <div class="flex items-center gap-4 mb-6 xl:justify-end">
                                    <img src="{{ asset('assets/body3/brands/logo_mitshubishi.svg') }}" alt="Mitsubishi"
                                        class="h-12 md:h-14">
                                    <h3 class="text-2xl md:text-4xl font-medium">Mitsubishi Montero</h3>
                                </div>
                                <span
                                    class="inline-block text-sm md:text-base text-gray-400 font-medium mb-6 border-b border-gray-700 pb-2 xl:ml-auto">
                                    2.4L Black Series 2WD 8AT
                                </span>
                                <p class="text-base md:text-lg text-gray-300 leading-relaxed mb-8">
                                    This mid-size luxury SUV combines rugged off-road capability with refined on-road
                                    manners,
                                    offering premium comfort and advanced safety features for discerning drivers.
                                </p>
                                <div class="xl:text-right">
                                    <button
                                        class="px-8 py-3.5 bg-primary text-white rounded-md text-base md:text-lg font-medium tracking-wide 
                                    hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                                        Reserve Now →
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- RAPTOR -->
                        <div class="flex flex-col xl:flex-row items-center justify-between gap-12">
                            <div class="xl:w-1/2 w-full flex justify-center px-4">
                                <img src="{{ asset('assets/body3/car/raptor.svg') }}" alt="Ford Raptor"
                                    class="h-auto max-h-72 md:max-h-96 w-full object-contain transition-transform duration-500 hover:scale-105">
                            </div>
                            <div class="xl:w-1/2 w-full xl:pl-12">
                                <div class="flex items-center gap-4 mb-6">
                                    <img src="{{ asset('assets/body3/brands/logo_ford.svg') }}" alt="Ford"
                                        class="h-16 md:h-20">
                                    <h3 class="text-2xl md:text-4xl font-medium">Ford Raptor</h3>
                                </div>
                                <span
                                    class="inline-block text-sm md:text-base text-gray-400 font-medium mb-6 border-b border-gray-700 pb-2">
                                    3.5L EcoBoost V6 4WD
                                </span>
                                <p class="text-base md:text-lg text-gray-300 leading-relaxed mb-8">
                                    The ultimate high-performance off-road truck with race-proven technology, delivering
                                    exceptional power and desert-running capability without compromising daily
                                    drivability.
                                </p>
                                <button
                                    class="px-8 py-3.5 bg-primary text-white rounded-md text-base md:text-lg font-medium tracking-wide 
                                hover:bg-blue-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                                    Reserve Now →
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="bg-gray-100 py-12 md:py-16">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16">
                        <h2 class="text-2xl md:text-3xl font-bold text-[#0F3460] mb-3">How Our Rental Process Works</h2>
                        <div class="w-20 h-1 bg-[#0F3460] mx-auto"></div>
                    </div>

                    <div class="max-w-5xl mx-auto space-y-8 md:space-y-10">
                        <!-- Step 1 -->
                        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-10">
                            <div class="md:w-2/5 flex justify-center">
                                <img src="{{ asset('assets/body4/booking/booking_1.svg') }}" alt="Registration process"
                                    class="w-full max-w-xs md:max-w-none h-auto">
                            </div>
                            <div class="md:w-3/5 bg-[#0F3460] text-white p-8 md:p-10 rounded-xl shadow-md">
                                <div class="flex items-center gap-3 mb-3">
                                    <span
                                        class="text-2xl font-bold text-white bg-blue-700 rounded-full w-10 h-10 flex items-center justify-center">1</span>
                                    <h3 class="text-xl md:text-2xl font-bold">Create Your Account</h3>
                                </div>
                                <p class="text-gray-200 leading-relaxed">
                                    Register or log in to access our premium car rental services. A quick verification
                                    process ensures your security.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex flex-col md:flex-row-reverse items-center gap-6 md:gap-10">
                            <div class="md:w-2/5 flex justify-center">
                                <img src="{{ asset('assets/body4/booking/booking_2.svg') }}" alt="Car selection"
                                    class="w-full max-w-xs md:max-w-none h-auto">
                            </div>
                            <div class="md:w-3/5 bg-white text-gray-800 p-8 md:p-10 rounded-xl shadow-md">
                                <div class="flex items-center gap-3 mb-3">
                                    <span
                                        class="text-2xl font-bold text-[#0F3460] bg-gray-100 rounded-full w-10 h-10 flex items-center justify-center">2</span>
                                    <h3 class="text-xl md:text-2xl font-bold">Select Your Vehicle</h3>
                                </div>
                                <p class="text-gray-600 leading-relaxed">
                                    Browse our extensive fleet and choose the perfect vehicle for your needs, from
                                    economy cars to luxury SUVs.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-10">
                            <div class="md:w-2/5 flex justify-center">
                                <img src="{{ asset('assets/body4/booking/booking_3.svg') }}" alt="Date selection"
                                    class="w-full max-w-xs md:max-w-none h-auto">
                            </div>
                            <div class="md:w-3/5 bg-[#0F3460] text-white p-8 md:p-10 rounded-xl shadow-md">
                                <div class="flex items-center gap-3 mb-3">
                                    <span
                                        class="text-2xl font-bold text-white bg-blue-700 rounded-full w-10 h-10 flex items-center justify-center">3</span>
                                    <h3 class="text-xl md:text-2xl font-bold">Choose Rental Dates</h3>
                                </div>
                                <p class="text-gray-200 leading-relaxed">
                                    Select your preferred pickup and return dates. We offer flexible rental periods to
                                    suit your schedule.
                                </p>
                            </div>
                        </div>

                        <!-- Step 4 (Updated from Select Branch to Payment) -->
                        <div class="flex flex-col md:flex-row-reverse items-center gap-6 md:gap-10">
                            <div class="md:w-2/5 flex justify-center">
                                <img src="{{ asset('assets/body4/booking/booking_4.svg') }}" alt="Payment process"
                                    class="w-full max-w-xs md:max-w-none h-auto">
                            </div>
                            <div class="md:w-3/5 bg-white text-gray-800 p-8 md:p-10 rounded-xl shadow-md">
                                <div class="flex items-center gap-3 mb-3">
                                    <span
                                        class="text-2xl font-bold text-[#0F3460] bg-gray-100 rounded-full w-10 h-10 flex items-center justify-center">4</span>
                                    <h3 class="text-xl md:text-2xl font-bold">Secure Payment</h3>
                                </div>
                                <p class="text-gray-600 leading-relaxed">
                                    Complete your booking with our secure payment gateway. We accept all major credit
                                    cards and digital wallets.
                                </p>
                            </div>
                        </div>

                        <!-- Step 5 -->
                        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-10">
                            <div class="md:w-2/5 flex justify-center">
                                <img src="{{ asset('assets/body4/booking/booking_5.svg') }}" alt="Happy driver"
                                    class="w-full max-w-xs md:max-w-none h-auto">
                            </div>
                            <div class="md:w-3/5 bg-[#0F3460] text-white p-8 md:p-10 rounded-xl shadow-md">
                                <div class="flex items-center gap-3 mb-3">
                                    <span
                                        class="text-2xl font-bold text-white bg-blue-700 rounded-full w-10 h-10 flex items-center justify-center">5</span>
                                    <h3 class="text-xl md:text-2xl font-bold">Enjoy Your Journey</h3>
                                </div>
                                <p class="text-gray-200 leading-relaxed">
                                    Pick up your vehicle and hit the road! Our team ensures a seamless handover process
                                    for your convenience.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Developers Section -->
            <section class="py-16 md:py-24 bg-gray-50">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-[#0F3460]">Meet Our Development Team</h2>
                        <div class="w-24 h-1 bg-[#0F3460] mx-auto mt-4"></div>
                        <p class="text-gray-600 mt-6 max-w-2xl mx-auto">
                            The persons behind your seamless car rental experience
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 md:gap-8 max-w-6xl mx-auto">
                        <!-- Developer 1 -->
                        <div
                            class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-2">
                            <div class="h-64 bg-[#0F3460] flex items-center justify-center">
                                <div class="h-40 w-40 rounded-full bg-white p-1 flex items-center justify-center">
                                    <img src="{{ asset('assets/devpics/berida.jpg') }}"
                                        alt="Jhianne Jose Berida" class="h-full w-full rounded-full object-cover">
                                </div>
                            </div>
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-800">Jhianne Jose Berida</h3>
                                <p class="text-primary font-medium mt-1">Backend Developer</p>
                                <p class="text-gray-600 mt-4">
                                    Architect of our robust server infrastructure ensuring seamless booking operations
                                    and data security.
                                </p>
                                <a href="#" target="_blank"
                                    class="inline-block mt-6 px-6 py-2.5 bg-[#0F3460] text-white rounded-md font-medium hover:bg-blue-800 transition-colors">
                                    View Portfolio
                                </a>
                            </div>
                        </div>

                        <!-- Developer 2 -->
                        <div
                            class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-2">
                            <div class="h-64 bg-[#0F3460] flex items-center justify-center">
                                <div class="h-40 w-40 rounded-full bg-white p-1 flex items-center justify-center">
                                    <img src="{{ asset('assets/devpics/magcalas.jpg') }}"
                                        alt="Josh Andrei Magcalas" class="h-full w-full rounded-full object-cover">
                                </div>
                            </div>
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-800">John Andrei Magcalas</h3>
                                <p class="text-primary font-medium mt-1">Frontend Developer</p>
                                <p class="text-gray-600 mt-4">
                                    Crafts intuitive user interfaces that make car rental simple and enjoyable for our
                                    customers.
                                </p>
                                <a href="https://jam04241.github.io/" target="_blank"
                                    class="inline-block mt-6 px-6 py-2.5 bg-[#0F3460] text-white rounded-md font-medium hover:bg-blue-800 transition-colors">
                                    View Portfolio
                                </a>
                            </div>
                        </div>

                        <!-- Developer 3 -->
                        <div
                            class="bg-white rounded-xl shadow-md overflow-hidden transition-transform duration-300 hover:shadow-lg hover:-translate-y-2">
                            <div class="h-64 bg-[#0F3460] flex items-center justify-center">
                                <div class="h-40 w-40 rounded-full bg-white p-1 flex items-center justify-center">
                                    <img src="{{ asset('assets/devpics/partoza.jpg') }}" alt="John Rex Partoza"
                                        class="h-full w-full rounded-full object-cover">
                                </div>
                            </div>
                            <div class="p-6 text-center">
                                <h3 class="text-xl font-bold text-gray-800">John Rex Partoza</h3>
                                <p class="text-primary font-medium mt-1">Frontend & QA Specialist</p>
                                <p class="text-gray-600 mt-4">
                                    Ensures flawless user experience through meticulous development and rigorous testing
                                    protocols.
                                </p>
                                <a href="https://partoza.github.io/PartozaPortfolio/home.html#home" target="_blank"
                                    class="inline-block mt-6 px-6 py-2.5 bg-[#0F3460] text-white rounded-md font-medium hover:bg-blue-800 transition-colors">
                                    View Portfolio
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <div class="flex flex-col min-h-auto bg-white">
                @include('profile.partials.footer')
            </div>
        </main>
    </div>
</body>

</html>