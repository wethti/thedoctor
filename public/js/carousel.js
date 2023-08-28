// const buttons = document.querySelectorAll("[data-carousel-button]")

// buttons.forEach(button => {
//     button.addEventListener("click", () => {
//         const offset = button.dataset.carouselButton === "next" ? 1 : -1;
//         const slides = button.closest("[data-carousel]").querySelector("[data-slides]");

//         const activeSlide = slides.querySelector("[data-active]")
//         let newIndex = [...slides.children].indexOf(activeSlide) + offset
//         if (newIndex < 0) newIndex = slides.children.length - 1
//         if (newIndex >= slides.children.length) newIndex = 0

//         slides.children[newIndex].dataset.active = true
//         delete activeSlide.dataset.active
//     })

function switchToTab(tab) {
    const slide = tab.parentElement.previousElementSibling.children[tab.getAttribute('data-tab')]
    const oldSlide = tab.parentElement.previousElementSibling.querySelector('[data-active]')
    if (slide !==oldSlide) {
     
        const oldTab = tab.parentElement.querySelector('.selected')
        delete oldSlide.dataset.active
        oldTab.classList.remove('selected')
        oldSlide.dataset.deactivating = true
    setTimeout(() => {
        delete oldSlide.dataset.deactivating
    }, 600);
        oldSlide.dataset.deactivated = true
    setTimeout(() => {
        delete oldSlide.dataset.deactivated
    }, 900);
    
        tab.classList.add('selected');   
        slide.dataset.active = true;

    if (slide.dataset.deactivated) {
        slide.classList.add('seethrough');
    setTimeout(() => {
        slide.classList.remove('seethrough')},10);}

        oldSlide.classList.add('seethrough');
    setTimeout(() => {
        oldSlide.classList.remove('seethrough')},600);


    }
}

function switchToNextTab() {
    const currentTab = document.querySelector('.selected');
    const nextTab = currentTab.nextElementSibling || currentTab.parentElement.firstElementChild;
    switchToTab(nextTab);
}
var carouselInterval = setInterval(switchToNextTab, 7000);

const tabs = document.querySelectorAll("[data-tab]")

tabs.forEach(tab => {
    tab.addEventListener("click", () => {
        clearInterval(carouselInterval);
        switchToTab(tab);
        carouselInterval = setInterval(switchToNextTab, 7000);
    })
});
