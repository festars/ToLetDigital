<div class="w-full p-2 bg-tolet-blue shandow-lg">
    <div class="flex space-between items-center">
        <div>

        </div>
    <!-- end of left -->
        <div class="flex justify-end items-center">
            <div class="inline-flex items-center">
                <div class="">
                    <user-notifications></user-notifications>
                </div>
                @auth
                <top-right-drop entity="{{Request::route()->getPrefix().'/profile'}}"></top-right-drop>

                @endauth
            </div>
        </div>
    </div>
</div>
