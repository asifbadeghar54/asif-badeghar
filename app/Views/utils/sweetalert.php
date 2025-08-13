<style>
    #toast-container>.toast {
        margin-bottom: 12px;
        /* spacing between toasts */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-left: 4px solid #0d6efd;
    }

    #toast-container>.toast-success {
        border-left-color: #28a745;
        margin-right: 400px;
    }

    #toast-container>.toast-info {
        border-left-color: #17a2b8;
    }
</style>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    <?php if (session()->has('success')) { ?>
        Swal.fire({
            title: 'Welcome Back <?= session()->get('username') ?? '' ?>',
            text: '<?= session()->getFlashdata('success') ?>',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        });
    <?php } ?>

    <?php if (session()->has('successData')) { ?>
        console.log('Success Data: has data');
        Swal.fire({
            title: 'Well Done',
            text: '<?= session()->getFlashdata('successData') ?>',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        });
    <?php } else { ?>
        console.log('Success Data: no data');
    <?php    } ?>

    // Check if the error flash message div exists
    <?php if (session()->has('error')) { ?>
        Swal.fire({
            title: 'Error!',
            text: '<?= session()->getFlashdata('error') ?>',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    <?php } ?>
    // });
</script>