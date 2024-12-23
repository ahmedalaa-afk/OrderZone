<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('admin-assets') }}/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('admin-assets') }}/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('admin-assets') }}/vendor/js/bootstrap.js"></script>
<script src="{{ asset('admin-assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="{{ asset('admin-assets') }}/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('admin-assets') }}/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{ asset('admin-assets') }}/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('admin-assets') }}/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('createUserModal', (event) => {
            $('#createModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('deleteUserModal', (event) => {
            $('#deleteModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('blockUserModal', (event) => {
            $('#blockModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('showNotificationModal', (event) => {
            $('#showModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('vendorOperationsModal', (event) => {
            $('#vendorOperations').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('vendorOperationsModal', (event) => {
            $('#statusModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('createCategory', (event) => {
            $('#createCategoryModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('createDepartment', (event) => {
            $('#createDepartmentModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('createBrand', (event) => {
            $('#createBrandModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('createColor', (event) => {
            $('#createColorModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('createSize', (event) => {
            $('#createSizeModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('createTag', (event) => {
            $('#createTagModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('deleteCategoryModal', (event) => {
            $('#deleteModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('showProductModal', (event) => {
            $('#showModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('showMeetingModal', (event) => {
            $('#showModal').modal('toggle');
        });
    });
    document.addEventListener('livewire:init', () => {
        Livewire.on('createAnnouncementModal', (event) => {
            $('#createModal').modal('toggle');
        });
    });
</script>

@livewireScripts