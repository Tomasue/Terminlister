let form = document.getElementById('loginform');

 function loginForm() {
     if(form.classList.contains('hidden')) {
         form.classList.replace('hidden', 'show');
     } else {
         form.classList.replace('show', 'hidden');
     }
 }