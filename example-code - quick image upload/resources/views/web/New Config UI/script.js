let currentTab = 0;
function showTab(n) {
  var tabs = document.getElementsByClassName("tabContent");
  var tablinks = document.getElementsByClassName("tablinks");

  if (n >= tabs.length) n = tabs.length - 1;
  if (n < 0) n = 0;
  for (let i = 0; i < tabs.length; i++) {
    tabs[i].style.display = "none";
    if (tablinks[i]) tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  tabs[n].style.display = "block";

  if (n == 1) {
    console.log("true")
    tabs[0].style.display = "block";
    tabs[0].classList.add("Tab-Animate");
  } else {
    tabs[0].classList.remove("Tab-Animate");
  }

  if (tablinks[n]) tablinks[n].className += " active";
  if (n === tabs.length - 1) {
    document.querySelector(".nextBtn").classList.add("d-none");
    document.querySelector(".saveBtn").classList.remove("d-none");
  } else {
    document.querySelector(".nextBtn").classList.remove("d-none");
    document.querySelector(".saveBtn").classList.add("d-none");
  }
  currentTab = n;
}
document.querySelector(".nextBtn").addEventListener("click", function () {
  showTab(currentTab + 1);
});
document.querySelector(".backBtn").addEventListener("click", function () {
  showTab(currentTab - 1);
});
window.onload = function() {
  showTab(currentTab); // Display the first tab by default
};



// Set Active Class
const parents = document.querySelectorAll('.parent');
parents.forEach(parent => {
  const childrenElements = parent.querySelectorAll('.children');
  childrenElements.forEach(child => {
    child.addEventListener('click', function() {
      childrenElements.forEach(el => {
        el.classList.remove('active');
      });
      this.classList.add('active');
    });
  });
});




// File Upload JS

let uploadButton = document.getElementById("upload-button");
let chosenImage = document.getElementById("chosen-image");
let fileName = document.getElementById("file-name");
let container = document.querySelector(".upContainer");
let error = document.getElementById("error");
let imageDisplay = document.getElementById("image-display");

const fileHandler = (file, name, type) => {
  if (type.split("/")[0] !== "image") {
    //File Type Error
    error.innerText = "Please upload an image file";
    return false;
  }
  error.innerText = "";
  let reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onloadend = () => {
    let imageContainer = document.createElement("figure");
    let img = document.createElement("img");
    img.src = reader.result;
    imageContainer.appendChild(img);
    imageContainer.innerHTML += `<figcaption>${name}</figcaption>`;
    
    // Add remove button
    let removeButton = document.createElement("button");
    removeButton.className = "remove-button";
    removeButton.innerText = "✕";
    removeButton.addEventListener("click", () => {
      imageDisplay.removeChild(imageContainer);
    });
    imageContainer.appendChild(removeButton);
    
    imageDisplay.appendChild(imageContainer);
  };
};
uploadButton.addEventListener("change", () => {
  imageDisplay.innerHTML = "";
  Array.from(uploadButton.files).forEach((file) => {
    fileHandler(file, file.name, file.type);
  });
});
container.addEventListener("dragenter", (e) => {
    e.preventDefault();
    e.stopPropagation();
    container.classList.add("upActive");
  },
  false
);
container.addEventListener("dragleave", (e) => {
    e.preventDefault();
    e.stopPropagation();
    container.classList.remove("upActive");
  },
  false
);
container.addEventListener("dragover", (e) => {
    e.preventDefault();
    e.stopPropagation();
    container.classList.add("upActive");
  },
  false
);
container.addEventListener("drop", (e) => {
    e.preventDefault();
    e.stopPropagation();
    container.classList.remove("upActive");
    let draggedData = e.dataTransfer;
    let files = draggedData.files;
    imageDisplay.innerHTML = "";
    Array.from(files).forEach((file) => {
      fileHandler(file, file.name, file.type);
    });
  },
  false
);
window.onload = () => {
  error.innerText = "";
};
// File Upload JS