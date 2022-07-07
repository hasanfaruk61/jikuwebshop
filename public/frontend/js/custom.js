$(document).ready(function (){
    loadcart();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function loadcart()
    {
        $.ajax({
            method: "GET",
            url: "/load-cart-data",
            success: function(response) {
                $('.cart-count').html('');
                $('.cart-count').html(response.count);

            }
        });
    }

    $('.addToCartBtn').click(function (e){
        e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var product_qty = $(this).closest('.product_data').find('.qty-input').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data:{
                'product_id': product_id,
                'product_qty': product_qty
            },
            success: function (response){
                alert(response.status);
                loadcart();

            }
        });
    });


    $(document).on('click','.increment-btn', function (e){
        e.preventDefault();

        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;

        if(value < 10) {
            value++;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });


    $(document).on('click','.decrement-btn', function (e){
        e.preventDefault();

        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;

        if(value > 1) {

            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //$('.delete-cart-item').click(function (e){
        $(document).on('click','.delete-cart-item', function (e){

        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        $.ajax({
            method: 'POST',
            url: "delete-cart-item",
            data: {
                'product_id':product_id,
            },
            success: function (response) {
                //window.location.reload();
                loadcart();
                $('.cartitems').load(location.href + " .cartitems");
                swal("", response.status, "success");
            }
        });
    });


    $(document).on('click','.changeQuantity', function (e){
       e.preventDefault();

        var product_id = $(this).closest('.product_data').find('.product_id').val();
        var qty = $(this).closest('.product_data').find('.qty-input').val();

        data = {
            'product_id' : product_id,
            'product_qty': qty
        }
        $.ajax({
            method: 'POST',
            url: "update-cart",
            data: data,

            success: function (response) {
                $(' .cartitems').load(location.href + " .cartitems");
                //window.location.reload();

            }
        });
    });
});
