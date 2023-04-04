<div style="width: 100%;">
    <div style="float: left;">
        <x-app-layout>
        </x-app-layout>
    </div>
</div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- request for reseller -->
            @if( Auth::guard('web')->user()->usertype == 'customer' )
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 style="font-size:20px;font-weight:bold">Apply for reseller</h3>
                    <p style="margin-bottom: 10px;">You can apply to be a reseller. after being a reseller you get more discount offer.</p>
                    <a style="background: #1f2937;color:#fff;padding: 8px 16px;border-radius: 9px;" href="/request_for_reseller">apply for reseller</a>
                </div>
            </div>
            @endif
            @if( Auth::guard('web')->user()->usertype == 'request_for_reseller' )
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 style="font-size:20px;font-weight:bold">You have applied for reseller</h3>
                    <p style="margin-bottom: 10px;">You will be reseller when an admin approve you</p>
                </div>
            </div>
            @endif
            @if( Auth::guard('web')->user()->usertype == 'reseller' )
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 style="font-size:20px;font-weight:bold">Welcome , You are a reseller</h3>
                    <p style="margin-bottom: 10px;">Enjoy our best discounts offer</p>
                </div>
            </div>
            @endif

            <!-- request for reseller end -->
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div> 


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <a style="background: #1f2937;color:#fff;padding: 8px 16px;border-radius: 9px;" href="/billing_address">My Billing Address</a>
                </div>
            </div>


            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

           
        </div>
    </div>

