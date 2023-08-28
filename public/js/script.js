// navbar menu dropdown animation
const dropdowns = document.querySelectorAll('[data-dropdown]');

dropdowns.forEach(dropdown => {
    let timeout;
    const button = dropdown.firstElementChild;

       button.addEventListener('click', () =>{
        dropdown.classList.toggle('active');

    const dropdownWrapper = button.nextElementSibling;
    const menu = document.querySelector('.dropdown-menu-area');
        dropdownWrapper.addEventListener('click', (e) => {
    if (!menu.contains(e.target)) {
        dropdown.classList.remove('active');
        }
        })
    })
    })

    // HOVER INSTEAD OF CLICKING
    // button.addEventListener('mouseenter', () =>{
    //     dropdown.classList.add('active');
    // })
    // button.addEventListener('mouseleave',() => {
    //     timeout = setTimeout(() => {
    //         dropdown.classList.remove('active');
    //     }, 0);
    // })

    // button.addEventListener('mouseenter', () => {
    //     clearTimeout(timeout);
    // });

    // const dropdownMenu = button.nextElementSibling.firstElementChild.firstElementChild;
    // dropdownMenu.addEventListener('mouseenter', ()=>{
    //     clearTimeout(timeout);
    // });

    // dropdownMenu.addEventListener('mouseleave', () => {
    //     timeout = setTimeout(() => {
    //         dropdown.classList.remove('active');
    //     })
    // })


// mobile navbar (dropdown & menu button) animation
const menubtn = document.querySelector('.menu-btn');
const navbarHeader = document.querySelector('.navbar-header');

menubtn.addEventListener('click', () => {
    const isOpened = menubtn.getAttribute('aria-expanded');
    if (isOpened === 'false') {
        menubtn.setAttribute('aria-expanded', 'true');
        navbarHeader.classList.add('expanded');
    } else {
        menubtn.setAttribute('aria-expanded', 'false');
        navbarHeader.classList.remove('expanded');
    }    
})

    document.addEventListener('click', (e) => {
        if (!navbarHeader.contains(e.target)) {
            navbarHeader.classList.remove('expanded');
            menubtn.setAttribute('aria-expanded', 'false');
        }
        })


        // CLOSE EVERYTHING BUTTON
const closebtns = document.querySelectorAll('.close-btn');
closebtns.forEach(closebtn => {
    closebtn.addEventListener('click', () => {
        closebtn.parentElement.remove(); });
});
