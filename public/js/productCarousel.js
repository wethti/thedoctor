

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

function switchToPrevTab() {
    const currentTab = document.querySelector('.selected');
    const prevTab = currentTab.previousElementSibling || currentTab.parentElement.lastElementChild;
    switchToTab(prevTab);
}
// var carouselInterval = setInterval(switchToPrevTab, 2000);

const tabs = document.querySelectorAll("[data-tab]")

tabs.forEach(tab => {
    tab.addEventListener("click", () => {
        // clearInterval(carouselInterval);
        switchToTab(tab);
        // carouselInterval = setInterval(switchToNextTab, 7000);
    })
});

const buttons = document.querySelectorAll("[data-carousel-button]")

buttons.forEach(button => {
    button.addEventListener("click", () => {
        button.dataset.carouselButton === "next" ? switchToNextTab() : switchToPrevTab();
    })
})