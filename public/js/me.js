
let edit_elements = document.querySelectorAll('.edit');
let cancel_elements = document.querySelectorAll('.cancel');
let save_elements = document.querySelectorAll('.save');
edit_elements.forEach(function(element){
    element.onclick =function(){
        this.parentElement.previousElementSibling.removeAttribute('disabled');
        this.nextElementSibling.style.display = 'inline';
        this.previousElementSibling.style.display = 'inline';
        this.style.display = 'none';

    }
});

cancel_elements.forEach(function(element){
    element.onclick = function(){
        this.parentElement.previousElementSibling.setAttribute('disabled' , '');
        this.previousElementSibling.style.display = 'inline';
        this.previousElementSibling.previousElementSibling.style.display ='none';
        this.style.display = 'none';


    }
})

save_elements.forEach(function(element){
    element.onclick = function(){
        var selected = this ;
        //console.log(selected);
        var name = selected.parentElement.previousElementSibling.getAttribute('name');
        let csrf_token = document.querySelector('[name="_token"]').value ;
        let value = this.parentElement.previousElementSibling.value ;
        let obj = Object.create({});
        obj['_token'] = csrf_token;
        obj[name]=value;
       // console.log(obj);
        $.post('http://blog.com/ajax/account' , obj , function(one , two , there){
            //console.log(one);
            if(one == true){
                selected.parentElement.previousElementSibling.setAttribute('disabled' , '');
                selected.nextElementSibling.style.display = 'inline';
                selected.nextElementSibling.nextElementSibling.style.display = 'none';
                selected.style.display = 'none';


                            }

        });

    }
})

// make the action to image
let edit_iamge = document.querySelector('.edit-image');
let cancel_image = document.querySelector('.cancel-image');
edit_iamge.onclick = function(element){
    this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.removeAttribute('disabled');
    this.nextElementSibling.style.display = 'inline';
        this.previousElementSibling.style.display = 'inline';
        this.style.display = 'none';
        this.parentElement.previousElementSibling.previousElementSibling.style.background = 'green';
        this.parentElement.previousElementSibling.previousElementSibling.style.cursor = 'pointer';


}

    cancel_image.onclick = function(){
        this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.setAttribute('disabled' , '');
        this.previousElementSibling.style.display = 'inline';
        this.previousElementSibling.previousElementSibling.style.display ='none';
        this.style.display = 'none';
        this.parentElement.previousElementSibling.previousElementSibling.style.background = '#00800078';
        this.parentElement.previousElementSibling.previousElementSibling.style.cursor = 'context-menu';
    }

// the function run if you choose image

document.querySelector('[name="avatar"]').onchange = function(element){
    let image = []
    image.push({
         'name' : this.files[0].name,
         'url' : URL.createObjectURL(this.files[0]),
         'file' : this.files[0] ,
    })
    document.querySelector('.image-profile img').setAttribute('src' , image[0]['url']);
//console.log(document.querySelector('[name="avatar"]').files[0] );
};

document.querySelector('.save-image').onclick = function(element){
    let csrf_token = document.querySelector('[name="_token"]').value ;
    var selected = this ;
    var formData = new FormData();
    formData.append('image', document.querySelector('[name="avatar"]').files[0]);
    formData.append('_token' ,csrf_token);
   // console.log(formData);
             $.ajax({
                 url : 'http://blog.com/ajax/account',
                 type : 'POST',
                 data : formData,
                 processData: false,
                   // tell jQuery not to process the data
                contentType: false,
                // tell jQuery not to set content-Type
                success : function(data) {
                    //console.log("this is test");
                    console.log(data);
                   selected.parentElement.previousElementSibling.setAttribute('disabled' , '');
                selected.nextElementSibling.style.display = 'inline';
                selected.nextElementSibling.nextElementSibling.style.display = 'none';
                selected.style.display = 'none';

                }
            });
}

