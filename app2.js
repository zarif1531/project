/* This code is selecting elements from the HTML document using the `querySelector` method and
assigning them to variables. Then, it is adding event listeners to the `registerlink` and
`loginlink` elements. When the `registerlink` is clicked, it adds the `active` class to the
`registersec` element, and when the `loginlink` is clicked, it removes the `active` class from the
`registersec` element. This code is likely used to toggle between a login and registration form on a
webpage. */
const registersec=document.querySelector('.register-section')
const loginlink=document.querySelector('.login-link')
const registerlink=document.querySelector('.register-link')
registerlink.addEventListener('click',()=>{
    registersec.classList.add('active')
})
loginlink.addEventListener('click',()=>{
    registersec.classList.remove('active')
})