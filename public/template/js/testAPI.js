
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
load_data();
// fetch('http://127.0.0.1:8000/api/products')
//     .then(response => response.json())
//     .then(data => {
//       const sss  = data;

//       let html1 = '<thead> <th style="padding:30px; ">id</th> <th style="padding:30px">ten</th>  <th style="padding:30px">gia</th></thead>';
//       let a = document.getElementById('asdlalkjdlksajk');
//       a.innerHTML = html1;
//       sss.forEach(item => {

     
//         html='<body ><tr ><td style="border: 3px solid #eaa023;">'+ item.id +'</td><td>' +item.name + ' </td><td>' + item.price + '</td></tr></body>'
                    
 
        
// //    document.getElementById('#11122').innerHTML = '<thead> <th style="padding:20px">id</th> <th style="padding:20px">ten</th>  <th style="padding:20px">gia</th></thead>';


//             a.innerHTML += html;
// }
//     )

// })

// fetch('http://127.0.0.1:8000/api/products')
//     .then(response => response.json())
//     .then (data => {
//         console.log(data);
//     })
function load_data(){
    $.get('http://127.0.0.1:8000/api/products',function(res){
        var li='';
        li+='<thead><th>id</th><th>name</th> <th>description</th><th>gia</th><th></th></thead>';
        // console.log(res);
       res.forEach(function(item){
        
        li +='<tr><td>'+item.id+'</td><td>'+item.name+'</td><td>'+item.description+'</td><td>'+item.price_sale+'</td><td><a id="delete_product" onclick="delete_product('+item.id+');" style="color:blue;padding-right:10px; cursor: pointer;">X</a>';
       li+='<a id="edit_product" onclick="edit_product('+item.id+');" style="color:blue; cursor: pointer;">Sua</a></td></tr>';
       });
      
       $('#bodyListProducts').html(li);
    });
}


$('#formInputProduct').on('submit',function(ev){
    ev.preventDefault();
    let formData = $('#formInputProduct').serialize();

    //gui du lieu tu client sang serve bang ajax method post
    $.post('http://127.0.0.1:8000/api/products', formData ,function(res){
    console.log(res);
  
    load_data();
});
});

// $('#delete_product').on('click',function(){
//     $.get('http://127.0.0.1:8000/api/products/')
// })

function delete_product(id){
    // $.get('http://127.0.0.1:8000/api/products/'+id);
    // load_data();
//     $.ajax( 'http://127.0.0.1:8000/api/products/'+id,
//      {  type : 'DELETE'}
// );
// load_data();
// console.log();
        $.ajax({
            type:'DELETE',
            data: { id },
            url: 'http://127.0.0.1:8000/api/products/'+id,
            success:function(result){
                console.log(result.message);
                load_data();
            }
        })
}

function edit_product(id){
    $.ajax({
        type:'get',
        dataType:'json',
        data:{id},
        url:'http://127.0.0.1:8000/api/products/'+id,
        success:function(result){
            // console.log(result.product);
            $('#editname').val(result.product.name);
            $('#editdescription').val(result.product.description);
            $('#editprice').val(result.product.price);
            $('#editprice_sale').val(result.product.price_sale);
            $('#ideditProduct').val(result.product.id);
            $('#idproduct').val(result.product.id);
            $('#imageProduct').attr('src',result.product.image);
        }
    })
   
}

$('#editProduct').on('submit',function(ev){
    ev.preventDefault();
    const idEditProduct =  $('#ideditProduct').val();
    let formData = $('#editProduct').serialize();
    
    $.ajax({
        type:'post',
        dataType:'json',
        data:  formData  ,
        url:'http://127.0.0.1:8000/api/products/'+ idEditProduct,
        success:function(result){
            load_data();
            alert(result.message);
        }
    })    
})

function reload(){
    location.reload();
}