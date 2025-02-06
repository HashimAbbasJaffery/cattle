// Grid -> list and list -> grid view


const grid = document.getElementById("grid");
const list = document.getElementById("list");
const animals = document.querySelectorAll(".animal");
const animalContainer = document.getElementById("animals");

grid.addEventListener("click", function(e) {
    e.target.classList.add("active");
    console.log(animalContainer);

    
    animalContainer.classList.add("flex");
    animalContainer.classList.add("gap-2");
    animalContainer.classList.add("flex-wrap")
    
    list.classList.remove("active");
    animals.forEach(animal => {
        animal.classList.add("grid");
    })
})

list.addEventListener("click", function(e) {
    e.target.classList.add("active")
    
    animalContainer.classList.remove("flex");
    animalContainer.classList.remove("gap-2");
    animalContainer.classList.remove("flex-wrap")
    
    grid.classList.remove("active");
    animals.forEach(animal => {
        animal.classList.remove("grid");
    })
})

const filter_button = document.querySelector(".mobile-filter");
const filter_list = document.querySelector(".mobile-filter-list");
const filter_items = document.querySelectorAll(".filter-item");
const lists = document.querySelectorAll(".list");

filter_button.addEventListener("click", function() {
    filter_list.classList.toggle("mobile-show");
})


const modal = document.querySelector(".modal");
window.addEventListener("click", function(event) {
    const excludedElements = document.querySelectorAll(".mobile-filter-list, .mobile-filter, .animal-gallery");
    
    for (let element of excludedElements) {
        if (element.contains(event.target)) {
            return; // Exit the function without executing further code
        }
    }

    filter_list.classList.remove("mobile-show")
    modal.classList.add("none")
})

filter_items.forEach(item => {
    item.addEventListener("click", function() {
        lists.forEach(list => {
            if (list.id !== item.dataset.list) {
                list.classList.add("none"); // Hide all other lists
            }
        });
        
        const to_open = document.getElementById(item.dataset.list);
        to_open.classList.toggle("none"); // Toggle only the target list        
    })
})

const items = document.querySelectorAll(".item");

items.forEach(item => {
    item.addEventListener("click", function(e) {
        const content = e.target.textContent;
        const main_content = document.querySelector(`#${item.dataset.list}-container p:first-child`);
        main_content.textContent = content;
    })
})



//  let holdTimer;

//     document.querySelectorAll(".mobile-animal").forEach((element) => {
//         element.addEventListener("touchstart", startHold);
//         element.addEventListener("touchend", cancelHold);
//         element.addEventListener("touchmove", cancelHold); // Cancels hold if user moves finger
//     });

//     function startHold(event) {
//         holdTimer = setTimeout(() => {
//             modal.classList.remove("none")
//         }, 1000); // 2 seconds hold time
//     }

//     function cancelHold() {
//         clearTimeout(holdTimer);
//     }


    document.querySelectorAll('.mobile-animal').forEach((el, index) => {
        setTimeout(() => {
            el.style.opacity = 1;
            el.style.transform = 'translateX(0)';
            el.style.transition = 'opacity 0.5s ease-in-out, transform 0.5s ease-in-out';
        }, index * 300); // Delay increases for each element
    });