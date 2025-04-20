<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BMP Car Rental - Admin</title>
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
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flowbite@1.4.4/dist/flowbite.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="./assets/js/charts-lines.js" defer></script>
    <script src="./assets/js/charts-pie.js" defer></script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      <!-- Desktop sidebar -->
      <aside
        class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="flex flex-col items-center text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            <img src="{{ asset('assets/bmp_logo.png') }}" alt="BMP Logo" class="w-50 h-12 mb-2">
          BMP Car Rental Admin
        </a>
          <ul class="mt-6">
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{ url('/dashboard') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                          </path>
                      </svg>
                      <span class="ml-4">Dashboard</span>
                  </a>
              </li>
          </ul>
          <ul>
          <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ url('/bookings') }}">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                      <span class="ml-4">Booking</span>
                  </a>
              </li>
              <li class="relative px-6 py-3">
                  <button
                      class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      @click="togglePagesMenuVehicle" aria-haspopup="true">
                      <span class="inline-flex items-center">
                          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                              <path
                                  d="M3 13l1.5-4.5A2 2 0 016.4 7h11.2a2 2 0 011.9 1.5L21 13M5 16h14M6 16a1.5 1.5 0 11-3 0M20 16a1.5 1.5 0 11-3 0">
                              </path>
                          </svg>

                          <span class="ml-4">Vehicle Management</span>
                      </span>
                      <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                      </svg>
                  </button>
                  <template x-if="isPagesMenuOpenVehicle">
                      <ul x-transition:enter="transition-all ease-in-out duration-300"
                          x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                          x-transition:leave="transition-all ease-in-out duration-300"
                          x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                          class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                          aria-label="submenu">
                          <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                              <a class="w-full" href="{{ url('/admin-car_modification') }}">Car Modification</a>
                          </li>
                          <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                              <a class="w-full" href="{{ url('/admin-track_vehicle') }}">
                                  Track Vehicle Status
                              </a>
                          </li>
                          <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                              <a class="w-full" href="{{ url('/admin-maintenance_schedule') }}">
                                  Maintenance Schedule
                              </a>
                          </li>
                      </ul>
                  </template>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ url('/admin-payment_history') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M9 14l2-2-2-2m4 4l2-2-2-2M3 3h18M9 3v18m6-18v18M5 21h14" />
                      </svg>
                      <span class="ml-4">Payment History</span>
                  </a>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ url('/admin-rental_agreement') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M8 2h8a2 2 0 012 2v16a2 2 0 01-2 2H8a2 2 0 01-2-2V4a2 2 0 012-2z"></path>
                          <path d="M9 8h6"></path>
                          <path d="M9 12h4"></path>
                          <path d="M9 16h6"></path>
                          <path d="M16 20l2 2 4-4"></path>
                      </svg>

                      <span class="ml-4">Rental Agreement Policy</span>
                  </a>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{ url('/customers') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M12 11c2.21 0 4-1.79 4-4S14.21 3 12 3 8 4.79 8 7s1.79 4 4 4z"></path>
                          <path d="M16 14H8a4 4 0 00-4 4v2h16v-2a4 4 0 00-4-4z"></path>
                          <path d="M17 8h4M17 12h3"></path>
                      </svg>
                      <span class="ml-4">Customer Records</span>
                  </a>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  href="{{ url('/admin-report_analytics') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M3 3v18h18"></path>
                          <path d="M7 14v4M11 10v8M15 6v12M19 8v10"></path>
                      </svg>

                      <span class="ml-4">Report Analytics</span>
                  </a>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  href="{{ url('/employees') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M5.121 17.804A6.5 6.5 0 0112 15.5a6.5 6.5 0 016.879 2.304"></path>
                          <circle cx="12" cy="9" r="3"></circle>
                          <path d="M15.5 14.5a4 4 0 015 0M2.5 14.5a4 4 0 015 0"></path>
                          <circle cx="5" cy="9" r="2"></circle>
                          <circle cx="19" cy="9" r="2"></circle>
                      </svg>

                      <span class="ml-4">Employee</span>
                  </a>
              </li>
          </ul>
        </div>
      </aside>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            BMP Car Rental Admin
          </a>
          <ul class="mt-6">
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{ url('/dashboard') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                          </path>
                      </svg>
                      <span class="ml-4">Dashboard</span>
                  </a>
              </li>
          </ul>
          <ul>
              <li class="relative px-6 py-3">
                  <button
                      class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      @click="togglePagesMenuBookings" aria-haspopup="true">
                      <span class="inline-flex items-center">
                          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                              <path
                                  d="M8 2v2M16 2v2M3 8h18M4 6h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2zM8 12h4M8 16h8">
                              </path>
                          </svg>
                          <span class="ml-4">Bookings</span>
                      </span>
                      <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                      </svg>
                  </button>
                  <template x-if="isPagesMenuOpenBookings">
                      <ul x-transition:enter="transition-all ease-in-out duration-300"
                          x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                          x-transition:leave="transition-all ease-in-out duration-300"
                          x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                          class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                          aria-label="submenu">
                          <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                              <a class="w-full" href="{{ url('/admin-upcoming_bookings') }}">Upcoming Bookings</a>
                          </li>
                          <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                              <a class="w-full" href="{{ url('/admin-active_bookings') }}">
                                  Active Bookings
                              </a>
                          </li>
                      </ul>
                  </template>
              </li>
              <li class="relative px-6 py-3">
                  <button
                      class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      @click="togglePagesMenuVehicle" aria-haspopup="true">
                      <span class="inline-flex items-center">
                          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                              <path
                                  d="M3 13l1.5-4.5A2 2 0 016.4 7h11.2a2 2 0 011.9 1.5L21 13M5 16h14M6 16a1.5 1.5 0 11-3 0M20 16a1.5 1.5 0 11-3 0">
                              </path>
                          </svg>

                          <span class="ml-4">Vehicle Management</span>
                      </span>
                      <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                      </svg>
                  </button>
                  <template x-if="isPagesMenuOpenVehicle">
                      <ul x-transition:enter="transition-all ease-in-out duration-300"
                          x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                          x-transition:leave="transition-all ease-in-out duration-300"
                          x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                          class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                          aria-label="submenu">
                          <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                              <a class="w-full" href="{{ url('/admin-car_modification') }}">Car Modification</a>
                          </li>
                          <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                              <a class="w-full" href="{{ url('/admin-track_vehicle') }}">
                                  Track Vehicle Status
                              </a>
                          </li>
                          <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                              <a class="w-full" href="{{ url('/admin-maintenance_schedule') }}">
                                  Maintenance Schedule
                              </a>
                          </li>
                      </ul>
                  </template>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ url('/admin-payment_history') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M9 14l2-2-2-2m4 4l2-2-2-2M3 3h18M9 3v18m6-18v18M5 21h14" />
                      </svg>
                      <span class="ml-4">Payment History</span>
                  </a>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                    href="{{ url('/admin-rental_agreement') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M8 2h8a2 2 0 012 2v16a2 2 0 01-2 2H8a2 2 0 01-2-2V4a2 2 0 012-2z"></path>
                          <path d="M9 8h6"></path>
                          <path d="M9 12h4"></path>
                          <path d="M9 16h6"></path>
                          <path d="M16 20l2 2 4-4"></path>
                      </svg>

                      <span class="ml-4">Rental Agreement Policy</span>
                  </a>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                      href="{{ url('/customers') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M12 11c2.21 0 4-1.79 4-4S14.21 3 12 3 8 4.79 8 7s1.79 4 4 4z"></path>
                          <path d="M16 14H8a4 4 0 00-4 4v2h16v-2a4 4 0 00-4-4z"></path>
                          <path d="M17 8h4M17 12h3"></path>
                      </svg>
                      <span class="ml-4">Customer Records</span>
                  </a>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  href="{{ url('/admin-report_analytics') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M3 3v18h18"></path>
                          <path d="M7 14v4M11 10v8M15 6v12M19 8v10"></path>
                      </svg>

                      <span class="ml-4">Report Analytics</span>
                  </a>
              </li>
              <li class="relative px-6 py-3">
                  <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                  href="{{ url('/employees') }}">
                      <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                          <path d="M5.121 17.804A6.5 6.5 0 0112 15.5a6.5 6.5 0 016.879 2.304"></path>
                          <circle cx="12" cy="9" r="3"></circle>
                          <path d="M15.5 14.5a4 4 0 015 0M2.5 14.5a4 4 0 015 0"></path>
                          <circle cx="5" cy="9" r="2"></circle>
                          <circle cx="19" cy="9" r="2"></circle>
                      </svg>

                      <span class="ml-4">Employee</span>
                  </a>
              </li>
          </ul>
        </div>
      </aside>
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white h-30 shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >
            <!-- Mobile hamburger -->
            <button
              class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <div class="flex justify-center flex-1 lg:mr-32">
              <div
                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
              >
                <div class="absolute inset-y-0 flex items-center pl-2">
                </div>
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-3 ">
              <!-- Theme toggler -->
              <li class="flex" hidden>
                <button
                  class="rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleTheme"
                  aria-label="Toggle color mode"
                >
                  <template x-if="!dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                      ></path>
                    </svg>
                  </template>
                  <template x-if="dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </template>
                </button>
              </li>
              <li>
                <p class="text-sm font-medium text-gray-900 dark:text-white">
                  {{ Auth::user()->employee->first_name ?? '' }}
                  {{ Auth::user()->employee->last_name ?? '' }}
                </p>
              </li>
              <!-- Profile menu -->
              <li class="relative">
                <button
                  class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                    alt=""
                    aria-hidden="true"
                  />
                </button>
                <template x-if="isProfileMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeProfileMenu"
                    @keydown.escape="closeProfileMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                    aria-label="submenu"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                          ></path>
                        </svg>
                        <span>Profile</span>
                      </a>
                    </li>
                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                          ></path>
                          <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li class="flex">
                      <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="#">
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                          ></path>
                        </svg>
                        <span>Log out</span>
                        </button>
                      </form>
                    </li>
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
              @yield('content') 
          </div>
        </main>
      </div>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuItems = document.querySelectorAll(".relative.px-6.py-3 a, .relative.px-6.py-3 button");
        const dropdownMenus = document.querySelectorAll(".dropdown"); // Adjust selector for dropdown menus

        function setActiveMenuItem() {
            // Get the current URL path
            const currentPath = window.location.pathname;

            let activeItem = null;

            menuItems.forEach(item => {
                // Remove active class from all menu items
                item.classList.remove("font-bold", "text-gray-800");

                // Check if the item's href matches the current path
                if (item.href && item.href.includes(currentPath)) {
                    activeItem = item;
                }
            });

            // If no matching URL is found, default to the Dashboard
            if (!activeItem) {
                activeItem = document.querySelector('.relative.px-6.py-3 a[href="/dashboard"]'); // Adjust the href based on your route
            }

            // Apply active class to the determined active item
            if (activeItem) {
                activeItem.classList.add("font-bold", "text-gray-800");

                // Open the parent dropdown menu if the active item is inside one
                const parentDropdown = activeItem.closest(".dropdown");
                if (parentDropdown) {
                    parentDropdown.classList.add("open"); // Add a class to keep the dropdown open
                }

                // Save the active item's href to localStorage
                localStorage.setItem("activeMenuItem", activeItem.getAttribute("href"));
            }
        }

        function restoreActiveMenuItem() {
            const savedHref = localStorage.getItem("activeMenuItem");

            if (savedHref) {
                menuItems.forEach(item => {
                    // Remove active class from all menu items
                    item.classList.remove("font-bold", "text-gray-800");

                    // Check if the item's href matches the saved href
                    if (item.href && item.href === savedHref) {
                        item.classList.add("font-bold", "text-gray-800");

                        // Open the parent dropdown menu if the saved item is inside one
                        const parentDropdown = item.closest(".dropdown");
                        if (parentDropdown) {
                            parentDropdown.classList.add("open");
                        }
                    }
                });
            } else {
                // If no saved href, set the active menu item based on the current path
                setActiveMenuItem();
            }
        }

        // Restore active menu item on page load
        restoreActiveMenuItem();

        // Add click event listeners
        menuItems.forEach(item => {
            item.addEventListener("click", function () {
                // Remove active class from all menu items
                menuItems.forEach(el => el.classList.remove("font-bold", "text-gray-800"));

                // Add active class to the clicked item
                this.classList.add("font-bold", "text-gray-800");

                // Save the clicked item's href to localStorage
                localStorage.setItem("activeMenuItem", this.getAttribute("href"));

                // Open the parent dropdown menu if the clicked item is inside one
                const parentDropdown = this.closest(".dropdown");
                if (parentDropdown) {
                    parentDropdown.classList.add("open");
                }
            });
        });
    });
</script>
  </body>
</html>