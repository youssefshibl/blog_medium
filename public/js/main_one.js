

let ele_user_setting = document.querySelector('.user_image');
if(ele_user_setting){
    ele_user_setting.onclick = function(){
document.querySelector('.main_user_bar').classList.toggle('main_user_bar_active');
    };
}

window.addEventListener('click', function(e){
    if(document.querySelector('.user_image')){
    if (document.querySelector('.user_image').contains(e.target)){
      // Clicked in box
    } else{
        document.querySelector('.main_user_bar').classList.remove('main_user_bar_active')
    }}

  });


//-------------------------------------------------------------------------------------------------------

// add new list to me
let make_new_list = document.querySelector('.make-new-list');
 if(make_new_list){

     make_new_list.onclick = function(element){

        bootbox.prompt("The Name of New List ", function(result){
            if(result != null){
                let obj = Object.create({});
                let csrf_token = document.querySelector('[name="_token"]').value ;
                obj['_token'] = csrf_token;
                obj['list_name']=result;
                $.post('http://blog.com/writeup/store_list' , obj , function(one , two , there){
            if(one == true){
                location.reload();
            }

        });
            }
        });
     }
 }

//-------------------------------------------------------------------------------------------------------
 // sure massage that you want delet list
let delet_list_all= document.querySelectorAll('.delet-list')  ;
delet_list_all.forEach(function(delet_list){

        delet_list.onclick = function(){
            let name_list = delet_list.getAttribute('data-title');
            bootbox.confirm({
                message: 'do you want to delet <span style="color: red;font-size: 17px;font-weight: 400;">' + name_list + '</span> list ',
                buttons: {
                    confirm: {
                        label: 'Delet',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cancel',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result == true){
                       delet_list_fun(name_list);
                    }

                }
            });
        }

})

function delet_list_fun(list)
{
    let obj = Object.create({});
                let csrf_token = document.querySelector('[name="_token"]').value ;
                obj['_token'] = csrf_token;
                obj['deleted_list']=list;
                console.log(obj);
    $.post('http://blog.com/writeup/delet_list' , obj , function(one , two , there){
        if(one == true){
            location.reload();
        }


    });
}

//-------------------------------------------------------------------------------------------------------
// go to writeup page but before check that user choose list to this write-up
let form_list = document.querySelector('.list-form');
if(form_list)
{
    form_list.onsubmit = function(e){
       
        let list_value = document.querySelector('[name="list"]').value;

        console.log(_.isEmpty(list_value));
        if(_.isEmpty(list_value)){
            e.preventDefault();
            bootbox.alert({
                message: "you should choose list !!",
                size: 'small'
            });
        }

    }

}

