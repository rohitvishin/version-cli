
function showTextbox(e){
    var name = $(e).val();
    if($(e).val() == 'discount'){
        $(e).parent().next().removeClass('d-none');
    }else{
        $(e).parent().next().addClass('d-none');
    }

    calculator(e);
}

function calculator(e){
        var f_price= 0;
        var price=document.querySelectorAll(".price");
        for (const ele of price) {
            var quantity=$(ele).parent().next().find('input').val();
            var selected =$(ele).parent().next().next().find('select').val();
            var discount = selected == 'discount' ? $(ele).parent().next().next().next().find('input').val() : 0;
            if($(ele).val() !== '' || quantity!='')
                f_price+=parseInt(($(ele).val()*quantity)-discount);
        }
        $('#f_total').val(f_price);
}

$("#rowAdder").click(function () {
    var element= '<div class="row"><div class="col-md-3"><label>Product Name</label><input type="text" class="form-control" name="p_name[]" placeholder="Product name"></div><div class="col-md-2"><label>Price</label><input type="text" class="form-control price" onChange="calculator(this)" name="price[]" placeholder="Enter price"></div><div class="col-md-2"><label>Quantity</label><input type="text" class="form-control qty" onChange="calculator(this)" name="qty[]" placeholder="Enter quantity"></div><div class="col-md-3"><label>Product Type</label><select class="form-control type" onChange="showTextbox(this)" name="type[]"><option>Choose</option><option value="flat">flat</option><option value="discount">discount</option></select></div><div class="col-md-2 discount d-none"><label>Discount</label><input type="text" name="discount[]" onChange="calculator(this)" class="form-control disc" placeholder="Enter Amount"></div></div><br/>';
    $('#product_box').append(element);
});