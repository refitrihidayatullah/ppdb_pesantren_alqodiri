// accordion first
let accordions = document.querySelectorAll(".accordion__wrapper .accordion");

accordions.forEach((e) => {
  e.onclick = () => {
    accordions.forEach((subContent) => {
      subContent.classList.remove("active");
    });
    e.classList.add("active");
  };
});
// accordion end
