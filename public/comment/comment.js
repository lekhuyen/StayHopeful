var deleteEditIcons = document.querySelectorAll('.delete-edit-icon')
var deleteEditComment = document.querySelectorAll('.delete-edit-comment-1')
var commentInput = document.querySelector('.comment-input input')
var commentSubmit = document.querySelector('.comment-submit button')
var closeIcon = document.querySelector('.close-icon')
var modalComment = document.querySelector('.modal-comment')
var commentIcon = document.querySelector('.comment-icon i')
var modalInner = document.querySelector('.modal_inner')


// an model
modalInner.addEventListener('click', (e)=>{
    e.stopPropagation()
})
commentIcon.addEventListener('click', ()=>{
    modalComment.classList.add('show')
})
modalComment.addEventListener('click', ()=>{
    modalComment.classList.remove('show')
})

closeIcon.addEventListener('click', ()=>{
    modalComment.classList.remove('show')
})




commentInput.addEventListener('input', function(){
    var inputValue = commentInput.value.trim();
    commentSubmit.style.opacity = inputValue.length > 0 ? '1' : '0.5';    
})



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
modalInner.addEventListener('click', ()=> {
    deleteEditComment.forEach(comment =>{
        comment.classList.remove('show')
    })
})


// manu bar 
$('.item').click(function(){
    $('.item .sub-menu').not($(this).find('.sub-menu')).slideUp();
    $(this).find('.sub-menu').slideToggle();
    $(this).find('.dropdown').toggleClass('rotate');
})