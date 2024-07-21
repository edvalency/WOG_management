@if (session()->has('success'))
    <div class="alert alert-success border-0 alert-dismissible mt-2 mb-3">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="fw-bold"><i class="fa fa-thumbs-up"></i> Great! {{ session()->get('success') }}</span>
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger border-0 alert-dismissible mt-2 mb-3">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <span class="fw-bold">Opps! {{ session()->get('error') }}</span>
    </div>
@endif


<script>
    setTimeout(function() {
        $('.alert').fadeOut('slow');
    }, 1500);
</script>
