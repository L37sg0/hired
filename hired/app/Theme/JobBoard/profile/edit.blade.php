<x-jobboard::layout.app>
    <main class="px-3">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <x-jobboard::form-card :title="__('Update Information')">
                        <x-jobboard::profile.partials.update-profile-information-form :user="$user"/>
                    </x-jobboard::form-card>
                </div>
                <div class="col">
                    <x-jobboard::form-card :title="__('Update Password')">
                        <x-jobboard::profile.partials.update-password-form/>
                    </x-jobboard::form-card>
                </div>
                <div class="col">
                    <x-jobboard::form-card :title="__('Delete Account')">
                        <x-jobboard::profile.partials.delete-user-form/>
                    </x-jobboard::form-card>
                </div>
            </div>
        </div>
    </main>
</x-jobboard::layout.app>
