<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('vendor-assets') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('vendor-assets') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('vendor-assets') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('vendor-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="{{ asset('vendor-assets') }}/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('vendor-assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{ asset('vendor-assets') }}/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('vendor-assets') }}/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>



{{-- livewire scripts --}}
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('createProduct', (event) => {
            $('#createModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('updateProductModal', (event) => {
            $('#updateModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('createDiscountModal', (event) => {
            $('#discountModal').modal('toggle');
        });
    });
</script>