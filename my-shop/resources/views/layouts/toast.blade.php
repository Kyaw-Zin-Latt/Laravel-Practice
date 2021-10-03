

@if(session("toast"))


    <script>
        let toastInfo = @json(session("toast"));
        const Toast = Swal.mixin({
            toast: true,
            position: 'bottom-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: toastInfo.icon,
            title: toastInfo.title,
        })
    </script>


@endif
