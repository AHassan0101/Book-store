<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function removeToCart(id) {
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: "Are you Sure",
            text: "You want to remove book from cart?",
            icon: "warning",
            buttons: {
                cancel: {
                    text: "No, cancel please.",
                    value: null,
                    visible: true,
                    className: "",
                    closeModal: false,
                },
                confirm: {
                    text: "Yes",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: false
                }
            }
        }).then(isConfirm => {
            if (isConfirm) {
                $.ajax({
                    url: "{{ route('remove.to.cart') }}",
                    type: 'post',
                    data: {
                        id: id,
                        _token: CSRF_TOKEN,
                    },
                    dataType: 'JSON',
                    success: function (data) {
                        if (data.status === 200) {
                            swal("Cart has been updated", {
                                icon: "success",
                            });
                            location.reload();
                        }
                        else if (data.status === 400) {
                            swal("Cancelled", "Book not found.", "error");
                        }
                    },
                });
            } else {
                swal("Cancelled", "It's safe.", "error");
            }
        });
    }
</script>
