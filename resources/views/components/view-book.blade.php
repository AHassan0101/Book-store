<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function viewBook(id) {
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "{{ route('view.book') }}",
            type: 'post',
            data: {
                id: id,
                _token: CSRF_TOKEN,
            },
            dataType: 'JSON',
            success: function (data) {
                if (data.status === 200) {
                    $('.product-title').html(data.book.name);
                    $('.author-name').html(data.book.author);
                    $('.book-price').html('£' + data.book.price);
                    if (data.book.stock > 0) {
                        $('.book-availability').html('In Stock');
                        $('.addToCartBtn').prop("disabled", false);
                    } else {
                        $('.book-availability').html('Out of Stock');
                        $('.addToCartBtn').prop("disabled", true);
                    }
                    var html = ``;
                    html = `Categories: `;
                    $.each(data.book.categories, function (index, value) {
                        html += `<a href="#">${value.name}</a>,`;
                    });
                    $('.book-categories').html(html);
                    $("#quickModal").modal();
                }
            },
        });
    }
</script>
