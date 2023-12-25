var deleteEditIcons = document.querySelectorAll('.delete-edit-icon')
var deleteEditComment = document.querySelectorAll('.delete-edit-comment-1')
var commentInput = document.querySelector('.comment-input input')
var commentSubmit = document.querySelector('.comment-submit button')
var closeIcon = document.querySelector('.close-icon')
var modalComment = document.querySelector('.modal-comment')
var commentIcon = document.querySelector('.comment-icon i')
var modalInner = document.querySelector('.modal_inner')

// user - post
var formPost = document.querySelector('.user-post-form')
var formPostShow = document.querySelector('.modal-user-post-1')
var closeFormPost = document.querySelector('.close-icon div')
var modelFormPost = document.querySelector('.modal_inner-post')

//form-post-user
var editPost = document.querySelectorAll('.edit_post')
var editPostForm = document.querySelectorAll('.edit-post-user')
var profileForm = document.querySelector('.profile-form')
//user-post(page)
var editPostUser = document.querySelectorAll('.edit__post-user')
var editPostFormUser = document.querySelectorAll('#edit-post-user')

//popup alert remove
var exitAlertBtn = document.querySelector('.exit-user-post-alert-btn');
var addPostSuccess = document.querySelector(".container-user-post-notification");
if(exitAlertBtn) {
    exitAlertBtn.addEventListener('click', function () {
        addPostSuccess.classList.remove("showAlert");
    });
}

if(addPostSuccess){
    addPostSuccess.addEventListener('click', function () {
        addPostSuccess.classList.remove("showAlert");
    });
}



editPost.forEach((item, key) => {
    item.addEventListener('click', (e)=>{ 
        e.stopPropagation();
        editPostForm[key].classList.toggle('show-edit-form')        
    })
});
window.addEventListener('click', ()=>{
    editPostForm.forEach((form) => {
        form.classList.remove('show-edit-form');
    });
})

//user-post(page)
editPostUser.forEach((item, key) => {
    item.addEventListener('click', (e)=>{ 
        e.stopPropagation();
        editPostFormUser[key].classList.toggle('show-edit-form')        
    })
});
window.addEventListener('click', ()=>{
    editPostFormUser.forEach((form) => {
        form.classList.remove('show-edit-form');
    });
})




if(formPost) {
    formPost.addEventListener('click', (e)=>{
        e.stopPropagation();
        formPostShow.classList.add('show-post-form');
    })
}

if(closeFormPost){
    closeFormPost.addEventListener('click', ()=>{
        formPostShow.classList.remove('show-post-form')
    })
}

if(formPostShow) {
    formPostShow.addEventListener('click', ()=>{
        formPostShow.classList.remove('show-post-form')
    })
}

if(modelFormPost) {
    modelFormPost.addEventListener('click', (e)=>{
        e.stopPropagation();
    })
}


var inputNewPost = document.querySelector('.input_new-post div')
if(inputNewPost){
    inputNewPost.addEventListener('click', ()=> {
        formPostShow.classList.add('show-post-form');
    })
}


// an model
if(modalInner) {
    modalInner.addEventListener('click', (e)=>{
        e.stopPropagation()
    })
}

if(commentIcon){
    commentIcon.addEventListener('click', ()=>{
        modalComment.classList.add('show')
    })
}

if(modalComment) {
    modalComment.addEventListener('click', ()=>{
        modalComment.classList.remove('show')
    })
}

if(closeIcon){
    closeIcon.addEventListener('click', ()=>{
        modalComment.classList.remove('show')
    })
}

if(commentInput){
    commentInput.addEventListener('input', function(){
        var inputValue = commentInput.value.trim();
        commentSubmit.style.opacity = inputValue.length > 0 ? '1' : '0.5';    
    })

}



// an delete-edit

deleteEditIcons.forEach((item, index) => {
    item.addEventListener('click', (event) => {
        event.stopPropagation();

        deleteEditComment[index].classList.toggle('show')
    });
});

window.addEventListener('click', ()=> {
    deleteEditComment.forEach(comment =>{
        comment.classList.remove('show')
    })
})

if(modalInner){
    modalInner.addEventListener('click', ()=> {
        deleteEditComment.forEach(comment =>{
            comment.classList.remove('show')
        })
    })
}





