<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let menuBar = document.querySelector('#menuBar')
    let mobileMenu = document.querySelector('#mobileMenu')
    let closeMenu = document.querySelector('#closeMenu')

    menuBar.addEventListener('click', function() {
        mobileMenu.classList.remove('hidden')
    })

    closeMenu.addEventListener('click', function() {
        mobileMenu.classList.add('hidden')
    })


    $(document).ready(function() {
        $('.addToCart').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.quantity-p').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/public/addToCart",
                data: {
                    "product_id": product_id,
                    "quantity": quantity
                },

                success: function(response) {


                    Swal.fire(response.status)



                }
            });
        });
        $('.increment-btn').click(function(e) {
            e.preventDefault();
            var increment = $(this).closest('.product_data').find('.quantity-p').val();

            //$('.quantity-p').val();


            var value = parseInt(increment, 10)
            value = isNaN(value) ? 0 : value;
            if (value < 10) {
                value++;
                // $('.quantity-p').val(value);
                $(this).closest('.product_data').find('.quantity-p').val(value);

            }
        });
        $('.decrement-btn').click(function(e) {
            e.preventDefault();
            var decrement = $(this).closest('.product_data').find('.quantity-p').val();
            //$('.quantity-p').val();
            var value = parseInt(decrement, 10)
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                //$('.quantity-p').val(value);
                $(this).closest('.product_data').find('.quantity-p').val(value);
            }
        });
        $('.remove-btn').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/public/deleteToCart",
                data: {
                    "product_id": product_id
                },
                success: function(response) {
                    Swal.fire(response.status)
                    window.location.reload();
                }

            });

        });
        $('.changeQuantity').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.quantity-p').val();
            data = {
                "product_id": product_id,
                "quantity": quantity

            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/public/updateCart",
                data: data,
                success: function(response) {
                    //  Swal.fire(response.status)
                    window.location.reload();

                }

            });

        });
        $('.wishlist-btn').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/public/destroy",
                data: {
                    "product_id": product_id
                },
                success: function(response) {
                    //Swal.fire(response.status)
                    Swal.fire(response.status)

                    window.location.reload();
                }

            });

        });
        $('.addTowishlist').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/public/addWishlist",
                data: {
                    "product_id": product_id
                },

                success: function(response) {

                    Swal.fire(response.status)


                }
            });
        });


    });
</script>
