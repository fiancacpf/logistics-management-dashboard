@if (session('success'))

<script>
    swal('Sucesso!', '{{session('success')}}', 'success');
</script>

@endif


