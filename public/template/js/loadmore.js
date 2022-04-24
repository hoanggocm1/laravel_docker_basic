$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function load()
{
    alert(1);
}

function loadmore(){

    document.getElementById('loading').textContent='Loading...';
    const page = $('#page1').val();
    $.ajax({
        type:'post',
        dataType:'JSON',
        data:{ page },
        url: '/load-product',
        success:function(result){
     
            $('#asssssssssss').append(result.html);
            $('#page1').val(Number(page)+1);
            document.getElementById('loading').textContent='Load More';
            //parseInt
            if(result.dem < 8){
                $('#button-loadmore').css('display','none');
            }
            // console.log(result.dem );
        
        // else{
        //      alert('da load xog san pham');
        //     $('#button-loadmore').css('display','none');
        //  }
     
        }
    })
    // document.getElementById("page1").value = 2 + page;
 
    // console.log((document.getElementById("page1").value));
}

function addGiohang(id){
 
    const num =  $('#numberProductCart').val();

    // const get = document.getElementById('demminiCart').getAttribute("data-notify");
   
    // alert(Number(get));
    $.ajax({
        type:'post',
        dataType:'JSON',
        data:{id,num},
        url:'/addProductCart/'+id+'/'+num,
        success: function(result){
          if(result.result){
    // $('#demminiCart').val(Number(demMini)+1);
            // document.getElementById('demminiCart').setAttribute("data-notify",Number(demMini)+1);
        alert(
            "Đã thêm sản phẩm vào giỏ hàng. \nBạn cần tải lại trang để cập nhật chính xác!",
            );  
          }
        //     alert(result.success);
            // location.reload();

        // console.log(result.check);
        }
    })
}