

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function aaaa(id,url){

    if (confirm('xoa ma khong the khoi phuc?')){
        $.ajax(
            {
                type:'DELETE',
                datatype: 'JSON',
                data: { id },
                url: url,
                success: function (result){
                    if(result.error === false){
                         alert(result.message);
                        location.reload();
                    }
                    else{
                    alert('xoa that bai roi nha 31');
                }
            }
            }
        )

    }
}


//dang dung
function removeRow(id,url){

    if (confirm('Xóa danh mục, không thể khôi phục?')){
        $.ajax(
            {
                type:'DELETE',
                datatype: 'JSON',
                data: { id },
                url: url,
                success: function (result){
                    if(result.error === false){
                         alert(result.message);
                        location.reload();
                    }
                    else{
                    alert('xoa that bai roi nha');
                }
            }
            }
        )

    }
}
function remove(id,url){

    if (confirm('xoa ma khong the khoi phuc?')){
        $.ajax(
            {
                type:'DELETE',
                datatype: 'JSON',
                data: { id },
                url: url,
                success: function (result){
                    if(result.error === false){
                         alert(result.message);
                        location.reload();
                    }
                    else{
                    alert('xoa that bai roi nha 31');
                }
            }
            }
        )

    }
}

function removeHS1(id,url){
    if (confirm('baaan dong y xoa hs nay?111')){
        $.ajax(
            {
                type:'get',
                datetype:'JSON',
                data: {id},
                url: url,
                success: function(result){
                  if(result){
                      alert(result.message);
                      location.reload();
                  } else {
                  alert('123');
                    // location.reload();
                // alert(sresult.message1);
                // location.reload();
                }
            }
    
            }
        
         )
        }
    }

function removeproduct(id,url){
    if(confirm('xoa hay khong')){
        $.ajax(
            {
                type:'get',
                datetype:'JSON',
                data:{id},
                url:url,
                success:function(){
                    if(result){
                        alert(result.message);
                        location.reload();
                    } else {
               
                      location.reload();
                  alert(sresult.message1);
                  location.reload();
                  
                  }
                }
            }
        )

    }
}

function removeHS(id,url){
if (confirm('ban dong y xoa hs nay?')){
    $.ajax(
        {
            type:'get',
            datetype:'JSON',
            data: {id},
            url: url,
            success: function(result){
              if(result.error === false){
                  alert(result.message);
                  location.reload();
              } else {
              alert(result.message1);
                // location.reload();
            // alert(sresult.message1);
            // location.reload();
            }
        }

        }
    
     )
    }
}

//upload file

$('#uploadImageProduct').change(function(){
    const form = new FormData();
   var a = form.append('file',$(this)[0].files[0]);

    $.ajax({

        processData: false,
        contentType: false,
        type:'post',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (result){
            if(result.error == false){
                $('#image_show').html('<a href="' + result.url.fullUrl + '  " target="_blank" ><img src="' + result.url.fullUrl + '" width="100px"></a>');
                $('#file').val(result.url.fullUrl);

                $('#image_change_name').html('<p style="float: left;"> Tên của hình ảnh sẽ được lưu thành:'+ '&ensp;' + ' <p  style="color:green; "> ' + result.url.name+ ' </p> </p>');


           
                // alert(result.url.name);
                
                // $('#uploadImageProduct').val(result.url.name);
      
         
            }
            else{
                alert('Upload file lỗi!');
            }
        }

    });
   
});



/// up load nhieu image
$('#uploadImageProducts').change(function(){
  
   
        const form = new FormData();
    form.append('files[]',$(this)[0].files[0]);
    form.append('files[]',$(this)[0].files[1]);
    form.append('files[]',$(this)[0].files[2]);
    form.append('files[]',$(this)[0].files[3]);
    // form.append('files[]',$(this)[0].files[4]);
    // form.append('files[]',$(this)[0].files[5]);

    $.ajax({

        processData: false,
        contentType: false,
        type:'post',
        dataType: 'JSON',
        data: form,
        url: '/admin/upload/services/images',
        success: function (result){
            if(result.error == false){
                var a = new Array;
                $('#demImages').val(result.url.dem)
             
                for (let i = 0; i < result.url.dem ; i++) {

                    
                $('#block_image').append('<div class="images_show" style="padding-right: 10px;padding-top: 5px;"><a href="' + result.url.fullUrl[i] + '  " target="_blank" ><img src="' + result.url.fullUrl[i] + '" width="100px" height= "150px"; ></a></div>'+
                '<input type="hidden" name="files'+i+'" value="'+result.url.fullUrl[i] +'" id="files'+i+'" >');
               
                a[i] =   result.url.fullUrl[i];
                
           
                // $('#images_change_name').html('<p style="float: left;"> Tên của hình ảnh sẽ được lưu thành:'+ '&ensp;' + ' <p  style="color:green; "> ' + result.url.name[i]+ ' </p> </p>');


                // $('#uploadImageProducts').val(result.url.name[i]);
         
                }
               
                // $('#image_show').html('<a href="' + result.url.fullUrl + '  " target="_blank" ><img src="' + result.url.fullUrl + '" width="100px"></a>');
                // $('#file').val(result.url.fullUrl);

                // $('#image_change_name').html('<p style="float: left;"> Tên của hình ảnh sẽ được lưu thành:'+ '&ensp;' + ' <p  style="color:green; "> ' + result.url.name+ ' </p> </p>');


           
                // alert(result.url.name);
                
                // $('#uploadImageProduct').val(result.url.name);
      
         
            }
            else{
                alert('Upload file lỗi!');
            }
        }

    });
   

  
   
});
//----------------
$('#uploadImageSlider').change(function(){
    const formSlider = new FormData();
   var a = formSlider.append('file',$(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type:'post',
        dataType: 'JSON',
        data: formSlider,
        url: '/admin/upload/slider',
        success: function (result){
            if(result.error == false){
                $('#image_show_slider').html('<a href="' + result.url.fullUrl + '  " target="_blank" ><img src="' + result.url.fullUrl + '" width="100px"></a>');
                $('#file_slider').val(result.url.fullUrl);

                $('#image_change_name_slider').html('<p style="float: left;"> Tên của hình ảnh sẽ được lưu thành:'+ '&ensp;' + ' <p  style="color:green; "> ' + result.url.name+ ' </p> </p>');
               }
            else{
                alert('Upload file lỗi!');
            }
        }
    });
});

$('#uploadAvatarAdmin').change(function(){
    const formAvatarAdmin = new FormData();
     var a = formAvatarAdmin.append('file',$(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type:'post',
        dataType: 'JSON',
        data: formAvatarAdmin,
        url: '/admin/upload/avatarAdmin',
        success: function (result){
            if(result.error == false){
                $('#image_show_avatarAdmin').html('<a href="' + result.url.fullUrl + '  " target="_blank" ><img src="' + result.url.fullUrl + '" width="100px"></a>');
                $('#file_avatarAdmin').val(result.url.fullUrl);

                $('#image_change_name_avataradmin').html('<p style="float: left;"> Tên của hình ảnh sẽ được lưu thành:'+ '&ensp;' + ' <p  style="color:green; "> ' + result.url.name+ ' </p> </p>');
               }
            else{
                alert('Upload file lỗi!');
            }
        }
    });
});

//-----------------------------------------------------------------------------------
function updateActive(id,idActive){
  

    const Active = document.getElementById(id).getAttribute("src");

    $.ajax({
        type:'post',
        dataType:'JSON',
        data:{ id, Active},
        url: '/load-product1111/'+id+'/'+ Active,
        success:function(result){
           
        if(result.giatri == 0){
            document.getElementById(id).textContent = 'On';
            document.getElementById(id).setAttribute("src",1);
            document.getElementById(id).style.color = 'green';
           
        }
        if(result.giatri == 1)
        {
            document.getElementById(id).textContent = 'Off';
            document.getElementById(id).setAttribute("src",0);
            document.getElementById(id).style.color = 'red';
           
            
        }

        // location.reload();

        }
    })
   

}

function deleteProduct(id){
   
    $.ajax({
        type:'post',
        dataType:'JSON',
        data:{id},
        url:'/delete-product/'+id,
        success: function(result){
           if(result){
            location.reload();
           }
        }
    })


}

function deleteImageProduct(id){


       check = confirm('Xóa hình ảnh này?')
        if(check){
            $.ajax({
                type:'post',
                dataType:'JSON',
                data:{id},
                url:'/admin/products/delete-image-product/'+id,
                success: function(result){
                    $('#ImageProduct'+id).css('display','none');
                }

            })
        }

}

function changeImageProduct(id){
    check = confirm('Xác nhận đổi hình ảnh này?')
    const nameImageProduct = $('#file').val();
    const a = $("#show_image_product_img"+id);
  
    if(check){
        $.ajax({
            type:'post',
            dataType:'JSON',
            data:{id,nameImageProduct},
            url:'/admin/products/change-image-product/'+id,
            success: function(result){
                $("#show_image_product_img"+id).attr("src",result.image);
                $("#show_image_product_a"+id).attr("href",result.image);
            }
        })
    }
}

