<x-app-layout title="Home Page">
    <div class="overflow-hidden">
        <div class="py-6 lg:mb-12 rounded-xl ">
            <livewire:search-box />
            <div class="flex items-center justify-center">
                <div class="flex gap-6 px-6 py-6 bg-white border rounded-lg shadow">
                    <livewire:filter />
                    <div class="xl:min-w-[900px]">
                        <livewire:sort />
                        <livewire:vacancy-list lazy />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
