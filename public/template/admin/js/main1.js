$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function a(id,url){
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
    