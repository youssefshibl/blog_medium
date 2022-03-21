let ele_user_setting = document.querySelector('.user_image');
if(ele_user_setting){
    ele_user_setting.onclick = function(){
document.querySelector('.main_user_bar').classList.toggle('main_user_bar_active');
    };
}

window.addEventListener('click', function(e){   
    if (document.querySelector('.user_image').contains(e.target)){
      // Clicked in box
    } else{
        document.querySelector('.main_user_bar').classList.remove('main_user_bar_active')
    }
    
  });