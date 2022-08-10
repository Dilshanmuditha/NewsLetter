<x-links />
<div id="subscribe" class=" bg-green-100">
<div class="mt-20 lg:grid  justify-center ">
    <div class="relative inline-block mt-8  mx-auto lg:bg-gray-200 rounded-full">

        <form method="POST" action="#" class="lg:flex text-sm">
            @csrf
            <div class="lg:py-3 lg:px-5 flex items-center">
                <label for="email" class="hidden lg:inline-block">
                    <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                </label>

                <input id="email" 
                name="email" 
                type="text" 
                placeholder="Your email address" 
                class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                @error('email')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" 
            class="transition-colors duration-300 bg-green-500 hover:bg-green-700 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                Subscribe
            </button>
        </form>
        
    </div>
    <h4 class="text-center mb-5 mt-8 text-gray-400">@All Rights recieved. Developed by DIlsHanX</h4>
</div>
</div>