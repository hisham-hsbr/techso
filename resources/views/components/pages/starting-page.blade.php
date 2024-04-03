@props(['pageHead'])

<div class="mt-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="mb-9">
                <!-- --- -->
                <div class="card shadow-none border border-300 my-4" data-component-card="data-component-card">
                    <div class="card-header p-4 border-bottom border-300 bg-soft">
                        <div class="row g-3 justify-content-between align-items-center">
                            <div class="col-12 col-md">
                                <h4 class="text-900 mb-0" data-anchor="data-anchor">{{ $pageHead }}</h4>
                            </div>

                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="p-4">
                            <div class="col-12">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
