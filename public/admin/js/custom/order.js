$(document).ready(function () {
//add product btn
$('.add-product-btn').on('click',function(e){
    e.preventDefault();
    var name=$(this).data('name');
    var id=$(this).data('id');
    var price=$.number($(this).data('price'),2);
    $(this).removeClass('btn-success').addClass('btn-info disabled');
       // <input type="hidden" name="product_ids[]" value="${id}">
    var html=`
    <tr>
    <td>${name}</td>
    <td><input type="number" class="form-control input-sm product-quantity"  data-price=${price} name="product[${id}][quantity]" min="1" value="1"></td>
    <td class="product-price">${price}</td>
    <td><button class="btn btn-danger btn-sm remove-btn" data-id=${id}><span class="fa fa-trash"></span></td>
    </tr>`;
    $('.order-list').append(html);
    //to calculate total price
    caculateTotal();
});
//remove product btn
$('body').on('click','.remove-btn',function(e){
    e.preventDefault();
    var id=$(this).data('id');
    $(this).closest('tr').remove();
    $('#product-'+id).removeClass('btn-info disabled').addClass('btn-success');
     //to calculate total price
    caculateTotal();
});//end of remove product
//disabled btn
$('body').on('click','.disabled',function(e){
    e.preventDefault();
});
//chenge product quantity
$('body').on('keyup change','.product-quantity',function(){
    var price=parseFloat($(this).data('price').replace(/,/g,''));
    var quantity=parseInt($(this).val());
   $(this).closest('tr').find('.product-price').html($.number(quantity * price,2));
    //to calculate total price
    caculateTotal();
});//end of quantity


//calulate the total
function caculateTotal(){
    var price=0;
$('.order-list .product-price').each(function($index){
     price+=parseFloat($(this).html().replace(/,/g,''));
});//end of product price
//check if price >0
if(price >0){
  $('#add-order-form-btn').removeClass('disabled');
}else{
  $('#add-order-form-btn').addClass('disabled');
  
}
$('.total-price').html($.number(price,2));
}//end of caculate total
//list all order products
$('.order-products').on('click',function(e){
    e.preventDefault();
    $('#loading').css('dispaly','flex');
    
    var url=$(this).data('url');
    var method=$(this).data('method');
    $.ajax({
        url:url,
        method:method,
        success:function($data){
    $('#loading').css('dispaly','none');

 $('#order-product-list').empty();

    
 $('#order-product-list').append($data);

        }
    });

});//end of list
//
$(document).on('click','.print-btn', function(){
$('#print-area').printThis();
});//end of click function
});//end of document  ready 