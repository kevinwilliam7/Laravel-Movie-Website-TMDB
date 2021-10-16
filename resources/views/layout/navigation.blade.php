<!-- TODO: Navigation Bar Responsive -->
<style>
    /* CHECKBOX TOGGLE SWITCH */
    /* @apply rules for documentation, these do not work as inline style */
    .toggle-checkbox:checked {
        @apply: right-0 border-green-400;
        right: 0;
        border-color: #68d391;
    }
    .toggle-checkbox:checked + .toggle-label {
        @apply: bg-green-400;
        background-color: #68d391;
    }
</style>
<div class="w-full border-b-2 shadow-lg text-black bg-white border-gray-200 dark:text-white dark:bg-gray-800 dark:border-gray-800">
    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
        <div class="p-4 flex flex-row items-center justify-between">
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <a href="/" class="text-lg font-semibold tracking-widest text-black uppercase rounded-lg focus:outline-none focus:shadow-outline dark:text-white">Movie Site</a>
            <button href="#" id="flip" class="text-lg font-semibold tracking-widest text-black dark:text-white uppercase rounded-lg focus:outline-none focus:shadow-outline"><a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-white dark:hover:text-gray-900 focus:text-white dark:focus:text-gray-900 hover:bg-purple-600 dark:hover:bg-gray-200 focus:bg-purple-600 dark:focus:bg-gray-200 focus:outline-none focus:shadow-outline sm:hidden" href="#"><i class="fas fa-search text-xl"></i></a></button>
        </div>
        <form action="/search" method="GET">
            @csrf
            <input type="text" id="panel" name="search" placeholder="Search Something" class="mb-2 mt-4 focus:ring-2 focus:ring-blue-600 w-full bg-white-200 border border-purple-600 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white hidden sm:block md:block md:w-40 lg:block lg:w-72 dark:border-transparent">
        </form>
        <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
            <a href="/" class="{{ (request()->is('/')) ? 'text-white bg-purple-600 dark:text-gray-900 dark:bg-gray-200' : '' }} px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-white hover:bg-purple-600 dark:hover:text-gray-900 dark:hover:bg-gray-200 focus:outline-none focus:shadow-outline">Home</a>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:w-auto md:inline md:mt-0 md:ml-4 hover:text-white hover:bg-purple-600 dark:hover:text-gray-900 dark:hover:bg-gray-200 dark:focus:text-gray-900 dark:focus:bg-gray-200 focus:bg-purple-600 focus:text-white focus:outline-none focus:shadow-outline">
                    <span>Countries</span>
                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-white dark:bg-gray-800 rounded-md shadow">
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 dark:hover:text-gray-900 dark:hover:bg-gray-200 hover:text-white hover:bg-purple-600 focus:outline-none focus:shadow-outline" href="/country/hi">India</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 dark:hover:text-gray-900 dark:hover:bg-gray-200 hover:text-white hover:bg-purple-600 focus:outline-none focus:shadow-outline" href="/country/ta">United States</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 dark:hover:text-gray-900 dark:hover:bg-gray-200 hover:text-white hover:bg-purple-600 focus:outline-none focus:shadow-outline" href="/country/jp">Japan</a>
                    </div>
                </div>
            </div>
            <div class="flex items-center px-4 py-2">
                <span class=""><i class="far fa-sun text-yellow-600"></i></span>
                <div class="relative inline-block w-14 mr-2 align-middle select-none transition duration-200 ease-in mx-3 px-1">
                    <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <span class=""><i class="far fa-moon text-gray-400"></i></span>
            </div>
        </nav>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#flip").click(function(){
            $("#panel").toggle();
        });
    });
    $(document).ready(function(){
        const checkbox = document.getElementById("toggle");
        let theme = localStorage.getItem('data-theme');
        window.localStorage.setItem('data-theme',theme);
        const changeThemeToDark = () => {
            document.documentElement.setAttribute("class", "dark")
            localStorage.setItem("data-theme", "dark")
        }
        const changeThemeToLight = () => {
            document.documentElement.setAttribute("class", "light")
            localStorage.setItem("data-theme", 'light')
        }
        checkbox.addEventListener('change', () => {
            let theme = localStorage.getItem('data-theme');
            if (theme ==='dark'){
                changeThemeToLight();
            }else if(theme === 'light' || theme === 'null'){
                changeThemeToDark();
            }   
        });
        if (theme ==='dark'){
            changeThemeToDark();
            document.getElementById("toggle").checked=true;
        }else if(theme === 'light'){
            changeThemeToLight();
            document.getElementById("toggle").checked=false;
        }  
    });
</script>