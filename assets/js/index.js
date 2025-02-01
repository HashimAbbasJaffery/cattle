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