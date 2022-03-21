
let str ='' ;
document.execCommand("defaultParagraphSeparator", false, "p");
let general_selected = Array;
document.onclick = function(e){
    //console.log('yes');
    let elem = document.querySelector('.box_options');
    if (document.querySelector('.box_options').contains(e.target)){
        // Clicked in box
        // console.log(e.target.parentElement.attributes.class.nodeValue);
        // if( e.target.parentElement.attributes.class.nodeValue == 'add-link'){
            
        // }
      } else{
        document.querySelector('.icon-box').style.display ='flex';
      document.querySelector('.link_input').style.display ='none';
      document.querySelector('.box_options').style.display= 'none';
      }
      //-----------------------------------------------------------------------------------
      // the part of get image from user 
      // check in the click in box <p> or not 
     let p_elements = document.querySelectorAll('.body_art p');
    p_elements.forEach(function(elemone){
        
        if(elemone.contains(e.target)){
            let element_have_plus = document.querySelector('.iconplusactive span');
            if(element_have_plus){
                element_have_plus.remove();
            }
            let texto = elemone.innerHTML.replace('<br>' , '').replace(' ' , '') ;
            if(texto == ''){
                elemone.style.position = 'relative';
                elemone.classList.add('iconplusactive');
                let clone = document.querySelector('.icon-span').cloneNode(true);
                elemone.appendChild(clone);
                //console.log(elemone);
            }
        }
    });
      //--------------------------------------------------------------------
    //general_selected = saveSelection();

    
     str=window.getSelection().anchorNode.data;
     if(str){
     str=str.substring(window.getSelection().anchorOffset,window.getSelection().focusOffset);
let master = document.querySelector('.body_art').innerHTML
    if(str && master.includes(str)){
        s = window.getSelection();
        let oRange = s.getRangeAt(0); //get the text range
        let oRect = oRange.getBoundingClientRect();
        let x = oRect.x ;
        let y = oRect.y; 
        let width = oRect.width; 
        let height = oRect.height; 
        let x_av = x +(width/2);
        let y_av = y + (height/2);
        //let elem = document.querySelector('.test');
        elem.style.display= 'none';
        elem.style.display= 'block';
        elem.style.top = `${y_av-55+window.scrollY}px`;
        elem.style.left = `${x_av}px`;
       
        
    }
}
    
}

let icons = document.querySelectorAll('.iconi');
if(icons){
    icons.forEach(function(elem){
        elem.onclick = function(){
            str_all=window.getSelection().anchorNode.data;
            if(str_all){
            str_part=str_all.substring(window.getSelection().anchorOffset,window.getSelection().focusOffset);
            // the list of actions 
            //1-upper_case
            let id_name = this.id;
            switch (id_name){
                case 'upper':
                            if (window.getSelection().focusNode.parentElement.classList.contains('do')){
                                window.getSelection().focusNode.parentElement.outerHTML = window.getSelection().focusNode.parentElement.innerHTML ;
                            }else{
                                
                                    let selected_h2 = window.getSelection();
                                document.execCommand("insertHTML",false,`<h2 class='do with' style='margin-left:30px;color: #403e3ed6;'>${selected_h2}</h2>`);
                            }
                            document.querySelector('.box_options').style.display= 'none';
                            break;
                case 'lower':
                            if (window.getSelection().focusNode.parentElement.classList.contains('do')){
                                window.getSelection().focusNode.parentElement.outerHTML = window.getSelection().focusNode.parentElement.innerHTML ;
                            }else{    
                                    let selected_h4 = window.getSelection();
                                document.execCommand("insertHTML",false,`<h4 class='do'>${selected_h4}</h4>`);
                            }
                            document.querySelector('.box_options').style.display= 'none';
                            break;
                case 'bold':
                            if (window.getSelection().focusNode.parentElement.classList.contains('do')){
                                window.getSelection().focusNode.parentElement.outerHTML = window.getSelection().focusNode.parentElement.innerHTML ;
                            }else{
                                let selected_str = window.getSelection();
                                document.execCommand("insertHTML",false,`<strong class='do' >${selected_str}</strong>`);
                            
                            }
                            document.querySelector('.box_options').style.display= 'none';
                            break;
                case 'Italic':
                            if (window.getSelection().focusNode.parentElement.classList.contains('do')){
                                window.getSelection().focusNode.parentElement.outerHTML = window.getSelection().focusNode.parentElement.innerHTML ;
                            }else{
                                let selected_i = window.getSelection();
                                document.execCommand("insertHTML",false,`<i class='do' >${selected_i}</i>`);
                            
                            }
                            document.querySelector('.box_options').style.display= 'none';
                            break;    
                 case 'comma':
                            if (window.getSelection().focusNode.parentElement.classList.contains('do')){
                                window.getSelection().focusNode.parentElement.outerHTML = window.getSelection().focusNode.parentElement.innerHTML ;
                            }else{
                                let selected_span = window.getSelection();
                                document.execCommand("insertHTML",false,`<span class='do comma' >${selected_span}</span>`);
                            
                            }
                            document.querySelector('.box_options').style.display= 'none';
                            break;  
                 
                
                    
            }
    
            
            }
        };
    });
}


// for link editor 
let icon_link = document.getElementById('link');
if(icon_link){
    icon_link.onclick = function(){
        general_selected = saveSelection();
        console.log(general_selected);
        document.querySelector('.icon-box').style.display ='none';
      document.querySelector('.link_input').style.display ='flex';

    }
}

let add_link = document.querySelector('.add-link');
if(add_link){
    add_link.onclick = function(){
        console.log('ys');
        restoreSelection(general_selected)
         let selected = window.getSelection();
         
       document.execCommand("insertHTML",false,"<a class='links' href='"+ document.querySelector('[name=link]').value +" 'style=\"text-decoration: none; color: #4a4af4e0; font-weight: 400;\" >"+selected+"</a>");
         document.querySelector('.icon-box').style.display ='flex';
         document.querySelector('.link_input').style.display ='none';
         document.querySelector('.box_options').style.display= 'none';

    }
}

function saveSelection() {
    if (window.getSelection) {
        sel = window.getSelection();
        if (sel.getRangeAt && sel.rangeCount) {
            var ranges = [];
            for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                ranges.push(sel.getRangeAt(i));
            }
            return ranges;
        }
    } else if (document.selection && document.selection.createRange) {
        return document.selection.createRange();
    }
    return null;
}

function restoreSelection(savedSel) {
    if (savedSel) {
        if (window.getSelection) {
            sel = window.getSelection();
            sel.removeAllRanges();
            for (var i = 0, len = savedSel.length; i < len; ++i) {
                sel.addRange(savedSel[i]);
            }
        } else if (document.selection && savedSel.select) {
            savedSel.select();
        }
    }
}



let icon_span_clicked = document.querySelectorAll('.icon-span');
if(icon_span_clicked){
    
    icon_span_clicked.forEach(function(elemtwo){
        elemtwo.onclick = function(){
            console.log('yes');
            document.querySelectorAll('.icon-span-bar').forEach(function(elethree){
                elethree.style.display = 'block';
            });
        }  
    })
    
}

